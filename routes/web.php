<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaketTourController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItineraryController;
use App\Models\Booking;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::get('/tour',[HomeController::class,'tampil_tour'])->name('paket.index');
Route::get('/home',[HomeController::class,'tampil_home']);
Route::get('/',[HomeController::class,'tampil_home']);
Route::get('/service',[HomeController::class,'tampil_service']);
Route::get('/about',[HomeController::class,'tampil_about']);
Route::get('/contactus',[HomeController::class,'tampil_contactus']);
Route::get('/tour_detail/{id}',[HomeController::class,'tampil_tour_detail'])->name("tour.detail");
Route::get('/paket_detail/{id}', [HomeController::class, 'tampil_paket_detail'])->name("paket.detail");

Route::get('/booking/paket/{id}', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking/paket', [BookingController::class, 'store'])->name('booking.store');

Route::get('/login_admin', [AdminController::class, 'tampil_login_admin'])->name('login.admin');
Route::post('/login_admin/submit', [AdminController::class, 'submit_login_admin']);
Route::get('/logout_admin', [AdminController::class, 'logout_admin'])->name('logout.admin');


Route::get('/login', [AuthController::class, 'tampil_login'])->name('login');
Route::post('/login/submit',[AuthController::class,'submit_login']);
Route::get('/register',[AuthController::class,'tampil_register']);
Route::post('/register/submit',[AuthController::class,'submit_register']);
Route::get('/logout', function () {
    session()->flush();   
    return redirect('/login');
});


Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'tampil_dashboard'])->name('dashboard');
    Route::get('/dashboard/laporan_booking', [DashboardController::class, 'laporan_booking'])->name('laporan.booking');
    Route::get('/dashboard/laporan_booking/cetak', [DashboardController::class, 'laporan_booking_cetak'])->name('laporan.booking.cetak');
    Route::get('/dashboard/contactus', [ContactController::class, 'indexDashboard'])->name('contact.dashboard');
    Route::get('/dashboard/contactus/hapus/{id}', [ContactController::class, 'hapus'])->name('contact.hapus');

    Route::get('/tour_dashboard',[DashboardController::class,'tampil_tour'])->name('tour.dashboard');
    Route::get('/tour_dashboard/tour_tambah',[DashboardController::class,'tour_tambah']);
    Route::post('/tour_dashboard/tambah_tour',[DashboardController::class,'tambah_tour']);
    Route::get('/tour_dashboard/hapus_tour/{id}',[DashboardController::class,'hapus_tour'])->name('tour.hapus');
    Route::get('/tour_dashboard/tour_ubah/{id}',[DashboardController::class,'tour_ubah'])->name('tour.ubah');
    Route::post('/tour_dashboard/update/{id}',[DashboardController::class,'tour_update'])->name('tour.update');

    Route::get('/paket_dashboard', [PaketTourController::class, 'index'])->name('paket.dashboard');
    Route::get('/paket_dashboard/paket_tambah', [PaketTourController::class, 'create'])->name('paket.tambah');
    Route::post('/paket_dashboard/tambah_paket', [PaketTourController::class, 'store'])->name('paket.store');
    Route::get('/paket_dashboard/hapus_paket/{id}', [PaketTourController::class, 'destroy'])->name('paket.hapus');
    Route::get('/paket_dashboard/paket_ubah/{id}', [PaketTourController::class, 'edit'])->name('paket.ubah');
    Route::post('/paket_dashboard/update/{id}', [PaketTourController::class, 'update'])->name('paket.update');

    Route::get('/paket/{paketId}/itinerary', [ItineraryController::class, 'index'])->name('itinerary.index');
    Route::get('/paket/{paketId}/itinerary/create', [ItineraryController::class, 'create'])->name('itinerary.create');
    Route::post('/paket/{paketId}/itinerary', [ItineraryController::class, 'store'])->name('itinerary.store');
    Route::get('/itinerary/{id}/edit', [ItineraryController::class, 'edit'])->name('itinerary.edit');
    Route::put('/itinerary/{id}', [ItineraryController::class, 'update'])->name('itinerary.update');
    Route::delete('/itinerary/{id}', [ItineraryController::class, 'destroy'])->name('itinerary.destroy');

    Route::get('/bookings', [BookingController::class, 'index'])->name('dashboard.bookings');
    Route::post('/dashboard/bookings/{id}/confirm', [BookingController::class, 'confirmBooking'])
        ->name('dashboard.bookings.confirm');
    Route::post('/dashboard/bookings/{id}/reject', [BookingController::class, 'cancelledBooking'])
    ->name('dashboard.bookings.reject');

    Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

});

Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

Route::get('/invoice/{id}', [InvoiceController::class, 'show'])->name('invoice');
Route::post('/invoice/{id}/pay', [InvoiceController::class, 'pay'])->name('invoice.pay');
Route::get('/invoice/{id}/status', [InvoiceController::class, 'status'])->name('invoice.show_status');
Route::post('/dashboard/invoices/{id}/confirm', [InvoiceController::class, 'adminConfirm'])
    ->name('dashboard.invoices.confirm');


Route::middleware(['auth.custom'])->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
});

