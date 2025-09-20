<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function tampil_login_admin()
    {
        if (session()->has('admin_id')) {
            return redirect('/dashboard');
        }
        return view('auth/login_admin');
    }

    function submit_login_admin(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();

        if (!$admin) {
            return 'Email admin tidak ditemukan';
        }

        if (!Hash::check($request->password, $admin->password)) {
            return 'Password salah.';
        }

        session([
            'admin_id' => $admin->id,
            'admin_name' => $admin->name
        ]);

        return redirect()->route('dashboard')->with('success', 'Login admin berhasil');
    }

    function logout_admin()
    {
        session()->forget(['admin_id', 'admin_name']); // hapus session admin
        return redirect('/login_admin')->with('success', 'Logout berhasil');
    }

    public function invoicePending()
    {
        $invoices = Invoice::with('booking.paket')
                        ->where('payment_status', 'waiting_confirmation')
                        ->get();
        return view('admin/invoice_pending', compact('invoices'));
    }

    public function confirmInvoice($id)
    {
        $invoice = Invoice::with('booking')->findOrFail($id);

        $invoice->payment_status = 'paid';
        $invoice->booking->status = 'confirmed';

        $invoice->save();
        $invoice->booking->save();

        return redirect()->back()->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }

}
