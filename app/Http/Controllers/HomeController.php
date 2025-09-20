<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Invoice;
use App\Models\PaketTour;

class HomeController extends Controller
{
public function tampil_tour(Request $request) {
    $paketTour = PaketTour::with(['tour','category'])
        // filter berdasarkan kategori jika ada
        ->when($request->filled('kategori'), function($query) use ($request) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('nama_kategori', $request->kategori);
            });
        })
        // filter berdasarkan search jika ada
        ->when($request->filled('search'), function($query) use ($request) {
            $query->whereHas('tour', function($q) use ($request) {
                $q->where('nama_daerah', 'like', '%' . $request->search . '%');
            });
        })
        ->orderByRaw("CASE WHEN durasi_hari = 1 AND durasi_malam = 0 THEN 0 ELSE 1 END")
        ->orderBy('durasi_hari', 'asc')
        ->get();

    $paketGrouped = $paketTour->groupBy(function($item) {
        return $item->durasi_hari . " Hari " . $item->durasi_malam . " Malam";
    });

    // Ambil semua kategori untuk dropdown
    $categories = Categories::all();

    return view('tour', compact('paketGrouped', 'categories'));
}


    public function tampil_home() {
        // Ambil semua data tour dan paket tour
        $tour = Tour::all();
        $paketTour = PaketTour::with(['tour','category'])->get(); // relasi ke tour kalau perlu

        // Hitung jumlah
        $jumlah_tour = Tour::count();
        $jumlah_booking = Booking::count();
        $jumlah_categories = Categories::count();
        $jumlah_paket = PaketTour::count(); // jumlah paket tour

        // Untuk slider, bisa pakai data tour atau paket tour
        $sliders = $tour;

        return view('home', compact('tour','paketTour','jumlah_tour','jumlah_booking','jumlah_categories','jumlah_paket','sliders'));
    }
    
    function tampil_contactus() {
        return view('contactus');
    }

    function tampil_service() {
        return view('service');
    }

    function tampil_about() {
        return view('about');
    }
public function tampil_paket_detail($id)
{
    $paket = PaketTour::with('tour')->findOrFail($id);
    return view('paket_detail', compact('paket'));
}

}
