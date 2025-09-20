<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\hash;

class AuthController extends Controller
{
    function tampil_login () {
        if(session()->has('id')) {
            return redirect('/home');
        }
        return view('auth/login');
    }

    function tampil_register () {
        return view ('auth/register');
    }

    function submit_login(Request $request) {
    $user = User::where('email', $request->email)->first();
    if (!$user) {
        return 'Email tidak ditemukan';
    }

    if (!Hash::check($request->password, $user->password)) {
        return 'Password salah.';
    }

    session(['id' => $user->id]);
    session(['name' => $user->name]);  // <== simpan 'name' agar bisa diakses di Blade
    return redirect('/home')->with('success', 'Login berhasil');
    }

    function submit_register(Request $request) {
        $cek_user = User::where('email',$request->email)->first();
        if ($cek_user) {
            return "Email sudah digunakan,anda tidak boleh mendaftarkannya lagi";
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); 
        $user->save();

        return redirect('/login')->with('success', 'Berhasil membuat akun');
        }
    }


