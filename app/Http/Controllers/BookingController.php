<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\PaketTour;
use App\Models\Invoice;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Form booking paket
    public function create(Request $request, $id)
    {
        if (!$request->session()->has('id')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu!');
        }

        $paket = PaketTour::with('tour')->findOrFail($id);

        return view('booking', compact('paket'));
    }

public function store(Request $request)
{
    $request->validate([
        'nama_lengkap' => 'required|string|max:100',
        'email' => 'required|email|max:150',
        'no_telepon' => 'required|string|max:20',
        'alamat' => 'required|string|max:255',
        'tanggal_waktu' => 'required|date',
        'paket_id' => 'required|exists:paket_tour,id_paket',
        'jumlah_orang' => 'required|integer|min:1',
        'message' => 'nullable|string'
    ]);

    $paket = PaketTour::findOrFail($request->paket_id);

    // Validasi minimal orang untuk paket Corporate
    if (stripos($paket->nama_paket, 'corporate') !== false && $request->jumlah_orang < 10) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'Minimal 10 orang untuk paket Corporate.');
    }

    // Hitung harga paket dengan diskon jika ada
    $harga_paket = $paket->harga;
    if (stripos($paket->nama_paket, 'corporate') !== false) {
        $diskon = 0.1; // diskon 10%
        $harga_paket = $harga_paket * (1 - $diskon);
    }

    $booking = Booking::create([
        'user_id' => $request->session()->get('id'),
        'nama_lengkap' => $request->nama_lengkap,
        'email' => $request->email,
        'no_telepon' => $request->no_telepon,
        'alamat' => $request->alamat,
        'tanggal_waktu' => $request->tanggal_waktu,
        'paket_id' => $paket->id_paket,
        'jumlah_orang' => $request->jumlah_orang,
        'message' => $request->message,
        'status' => 'pending',
    ]);

    // Hitung total dengan harga diskon jika ada
    $total = $harga_paket * $request->jumlah_orang;

    $invoice = Invoice::create([
        'invoice_number' => 'INV-' . date('Ymd') . '-' . str_pad($booking->id, 4, '0', STR_PAD_LEFT),
        'booking_id' => $booking->id,
        'total_amount' => $total,
        'payment_status' => 'unpaid'
    ]);

    return redirect()->route('invoice', $invoice->id);
}

    public function index()
    {
        $bookings = Booking::with(['paket', 'invoice'])->get(); 
        return view('dashboard.bookings', compact('bookings'));
    }

public function confirmBooking($id)
{
    $booking = Booking::findOrFail($id);
    $booking->status = 'confirmed';
    $booking->save();

    // Update invoice admin_confirm & payment_status
    if ($booking->invoice) {
        $invoice = $booking->invoice;
        $invoice->admin_confirm = 1;

        // Jika user sudah bayar, langsung set paid
        if ($invoice->payment_status == 'pending') {
            $invoice->payment_status = 'paid';
        }

        $invoice->save();
    }

    return redirect()->route('dashboard.bookings')->with('success', 'Booking dan pembayaran berhasil dikonfirmasi!');
}

public function cancelledBooking($id)
{
    $booking = Booking::findOrFail($id);
    $booking->status = 'cancelled';
    $booking->save();

    // Kalau ada invoice, bisa juga sekalian ubah status jadi expired/batal
    if ($booking->invoice) {
        $invoice = $booking->invoice;
        $invoice->payment_status = 'expired'; // atau bisa 'cancelled' kalau mau bikin status baru
        $invoice->save();
    }

    return redirect()->route('dashboard.bookings')->with('success', 'Booking berhasil ditolak!');
}
}
