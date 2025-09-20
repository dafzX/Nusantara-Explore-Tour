<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
public function show($id)
{
    $invoice = Invoice::with('booking.paket')->findOrFail($id);

    $booking = $invoice->booking;
    $paket = $booking->paket;

    if ($paket) {
        $invoice->total_amount = $paket->tipe_harga === 'per_orang'
            ? $paket->harga * $booking->jumlah_orang
            : $paket->harga;
    } else {
        $invoice->total_amount = 0;
    }

    // Update display status: kalau user sudah bayar & admin sudah confirm → paid
    if($invoice->payment_status == 'pending' && $invoice->admin_confirm) {
        $invoice->payment_status_display = 'Paid';
        $invoice->payment_status = 'paid'; // optional, supaya JS print-button muncul
    } else {
        $invoice->payment_status_display = ucwords(str_replace('_', ' ', $invoice->payment_status));
    }

    return view('invoice', compact('invoice'));
}


    // user klik bayar
    public function pay($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->payment_status = 'pending'; // menunggu admin
        $invoice->save();

        return redirect()->route('invoice', $invoice->id)
                        ->with('success', 'Pembayaran berhasil, menunggu konfirmasi admin.');
    }

    public function status($id)
    {
        $invoice = Invoice::findOrFail($id);

        return response()->json([
            'status' => $invoice->payment_status,
            'status_display' => ucwords(str_replace('_', ' ', $invoice->payment_status)),
            'admin_confirm' => $invoice->admin_confirm,
        ]);
    }
    public function adminConfirm($id)
    {
        $invoice = Invoice::findOrFail($id);

        // Kalau user sudah bayar (pending), admin konfirmasi → langsung lunas
        if($invoice->payment_status == 'pending') {
            $invoice->payment_status = 'paid';
        }

        // Tandai admin sudah konfirmasi
        $invoice->admin_confirm = true;

        $invoice->save();

        return redirect()->route('dashboard.bookings')
                        ->with('success', 'Pembayaran berhasil dikonfirmasi admin!');
    }



}
