<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function profile()
    {
        $userId = session('id');

        // Ambil data user
        $user = DB::table('users')->where('id', $userId)->first();

        // Ambil booking user + relasi paket + relasi tour + relasi category + invoice
        $bookings = Booking::with(['paket.tour', 'paket.category', 'invoice'])
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('profile_user', compact('user', 'bookings'));
    }
}
