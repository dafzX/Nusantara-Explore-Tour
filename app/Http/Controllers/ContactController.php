<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        Contact::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'message'    => $request->message,
        ]);

        return redirect()->back()->with('success', 'Pesan berhasil dikirim.');
    }

public function indexDashboard()
{
    $contacts = Contact::latest()->get();
    return view('contactus_dashboard', compact('contacts'));
}

public function hapus($id)
{
    $contact = Contact::find($id);

    if ($contact) {
        $contact->delete();
        return redirect()->route('contact.dashboard')->with('success', 'Pesan berhasil dihapus!');
    }

    return redirect()->route('contact.dashboard')->with('error', 'Pesan tidak ditemukan!');
}


}
