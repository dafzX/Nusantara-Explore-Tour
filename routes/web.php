<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/service', function () {
    return view('service');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contactus', function () {
    return view('contactus');
});

Route::get('/tour', function () {
    return view('tour');
});

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/register', function () {
    return view('auth/register');
});

Route::get('/dashboard', function () {
    return view('layouts/dashboard');
});

