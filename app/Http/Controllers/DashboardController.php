<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Categories;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\PaketTour;
use App\Models\Booking;

class DashboardController extends Controller
{
function tampil_dashboard() {
    // Statistik
    $jumlah_tour = Tour::count();
    $jumlah_pesan = Booking::count(); // anggap semua booking = pesan
    $jumlah_paket = PaketTour::count();
    $jumlah_booking_confirmed = Booking::where('status','confirmed')->count();

    // Total penghasilan dari booking confirmed
    $total_penghasilan = Booking::with('paket')
        ->where('status','confirmed')
        ->get()
        ->sum(function($b){
            if($b->paket->tipe_harga == 'per_orang') {
                return $b->jumlah_orang * ($b->paket->harga ?? 0);
            } else {
                return $b->paket->harga ?? 0;
            }
        });

    // 5 Booking terbaru
    $booking_terbaru = Booking::with(['paket','user'])
        ->orderBy('tanggal_waktu','desc')
        ->take(5)
        ->get();

    // Data chart: jumlah booking per paket
    $chartData = PaketTour::withCount('bookings')->get()->map(function($item){
        return [
            'nama_paket' => $item->nama_paket,
            'jumlah_booking' => $item->bookings_count
        ];
    });

    $nama = Admin::first()->name ?? 'Admin';

    return view('showdashboard', compact(
        'jumlah_tour',
        'jumlah_pesan',
        'jumlah_paket',
        'jumlah_booking_confirmed',
        'total_penghasilan',
        'booking_terbaru',
        'chartData',
        'nama'
    ));
}


    function tampil_tour() {
        // Hapus relasi 'daerah', cukup ambil category aja
        $data = Tour::all(); 
        return view('tour_dashboard', compact('data'));
    }

    function tour_tambah() {
        return view('tour_tambah');
    }

    function tambah_tour(Request $request) {
        $request->validate([
            'nama_daerah' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1000',
            'gambar_tempat' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar_tempat')) {
            $file = $request->file('gambar_tempat');
            $nama_file = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('assets/images'), $nama_file);
        } else {
            $nama_file = null;
        }

        $tour = new Tour();
        $tour->nama_daerah = $request->nama_daerah;
        $tour->deskripsi = $request->deskripsi;
        $tour->gambar = $nama_file;
        $tour->save();

        return redirect('/tour_dashboard')->with('success', 'Berhasil menambahkan tempat!');
    }

    function hapus_tour($id) {
        $daerah = Tour::find($id);
        if ($daerah) {
        $daerah->delete();
            return redirect('/tour_dashboard')->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect('/tour_dashboard')->with('error', 'Data tidak ditemukan!');
        }
    }

    function tour_ubah($id) {
        $tour = Tour::find($id);

        if (!$tour) {
            return redirect('/tour_dashboard')->with('error', 'Data tour tidak ditemukan!');
        }

        // Perbaiki compact, kirim 'tour' bukan 'daerah'
        return view('tour_ubah', compact('tour'));
    }

    function tour_update(Request $request, $id) {
    $request->validate([
        'nama_daerah' => 'required|string|max:255',
        'deskripsi'   => 'required|string',
        'gambar_tempat' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $tour = Tour::findOrFail($id);

    // Upload gambar baru kalau ada
    if ($request->hasFile('gambar_tempat')) {
        $file = $request->file('gambar_tempat');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('assets/images'), $filename);
        $tour->gambar = $filename;
    }

    // Update data sesuai field yang ada di tabel 'tour'
    $tour->nama_daerah   = $request->nama_daerah;
    $tour->deskripsi     = $request->deskripsi;

    $tour->save();

    return redirect('/tour_dashboard')->with('success', 'Data tour berhasil diperbarui!');
}
public function laporan_booking(Request $request)
{
    $query = Booking::with(['paket.tour','paket.category','user','invoice']);

    // Filter tanggal kalau ada
    if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
        $query->whereBetween('tanggal_waktu', [$request->tanggal_awal, $request->tanggal_akhir]);
    }

    // Hanya ambil booking yang sudah dikonfirmasi admin
    $query->where('status', 'confirmed')
          ->whereHas('invoice', function($q){
              $q->where('payment_status', 'paid'); // hanya yang sudah bayar
          });

    $bookings = $query->get();

    // Hitung total penghasilan
    $total_penghasilan = $bookings->sum(function ($booking) {
        if($booking->paket->tipe_harga == 'per_orang') {
            return $booking->jumlah_orang * ($booking->paket->harga ?? 0);
        } else { // fix price
            return $booking->paket->harga ?? 0;
        }
    });

    return view('laporan_booking', compact('bookings', 'total_penghasilan'));
}

public function laporan_booking_cetak(Request $request)
{
    $query = Booking::with(['paket.tour','paket.category','user','invoice']);

    if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
        $query->whereBetween('tanggal_waktu', [$request->tanggal_awal, $request->tanggal_akhir]);
    }

    // Sama, hanya yang dikonfirmasi & sudah bayar
    $query->where('status', 'confirmed')
          ->whereHas('invoice', function($q){
              $q->where('payment_status', 'paid');
          });

    $bookings = $query->get();

    $total_penghasilan = $bookings->sum(function ($booking) {
        if($booking->paket->tipe_harga == 'per_orang') {
            return $booking->jumlah_orang * ($booking->paket->harga ?? 0);
        } else {
            return $booking->paket->harga ?? 0;
        }
    });

    return view('laporan_booking_cetak', compact('bookings', 'total_penghasilan'));
}
}