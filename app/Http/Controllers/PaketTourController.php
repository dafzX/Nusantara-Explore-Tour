<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\PaketTour;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaketTourController extends Controller
{
    public function index()
    {
        $paket= PaketTour::with(['tour', 'category'])->get();
        return view('paket_dashboard.paket_tour_dashboard', compact('paket'));
    }

    public function create()
    {
$tours = Tour::all();
$categories = Categories::all();
return view('paket_dashboard.paket_tour_tambah', compact('tours', 'categories'));

    }

    public function store(Request $request)
    {
    $request->validate([
        'nama_paket'   => 'required|string|max:255',
        'deskripsi'    => 'required',
        'harga'        => 'required|numeric',
        'durasi_hari'  => 'required|integer',
        'durasi_malam' => 'required|integer',
        'gambar'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'tour_id'      => 'required|exists:tour,id_tour',
        'kategori_id'  => 'required|exists:tour_categories,id_categories',
        'tipe_harga'   => 'required|in:per_orang,per_paket', // ✅ tambahan
        'jumlah_fix'   => 'nullable|integer', // ✅ tambahan
    ]);


    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $nama_file = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('assets/images'), $nama_file);
    } else {
        $nama_file = null;
    }

    PaketTour::create([
        'nama_paket'   => $request->nama_paket,
        'deskripsi'    => $request->deskripsi,
        'harga'        => $request->harga,
        'durasi_hari'  => $request->durasi_hari,
        'durasi_malam' => $request->durasi_malam,
        'gambar'       => $nama_file,
        'tour_id'      => $request->tour_id,
        'kategori_id'  => $request->kategori_id,
        'tipe_harga'   => $request->tipe_harga,  // ✅
        'jumlah_fix'   => $request->tipe_harga === 'per_paket' ? $request->jumlah_fix : null, // ✅
    ]);

    return redirect()->route('paket.dashboard')->with('success', 'Paket berhasil ditambahkan');
}
public function edit($id)
{
    $paket = PaketTour::findOrFail($id);
    $tours = Tour::all(); 
    $categories = Categories::all(); // ambil semua kategori

    return view('paket_dashboard.paket_tour_ubah', compact('paket', 'tours', 'categories'));
}

public function update(Request $request, $id)
{
    $paket = PaketTour::findOrFail($id);

    $request->validate([
        'nama_paket'   => 'required|string|max:255',
        'deskripsi'    => 'required',
        'harga'        => 'required|numeric',
        'durasi_hari'  => 'required|integer',
        'durasi_malam' => 'required|integer',
        'gambar'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'tour_id'      => 'required|exists:tour,id_tour',
        'kategori_id'  => 'required|exists:tour_categories,id_categories',
        'tipe_harga'   => 'required|in:per_orang,per_paket', // ✅ tambahan
        'jumlah_fix'   => 'nullable|integer', // ✅ tambahan
    ]);


    if ($request->hasFile('gambar')) {
        if ($paket->gambar) {
            Storage::disk('public')->delete($paket->gambar);
        }
        $file = $request->file('gambar');
        $nama_file = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('assets/images'), $nama_file);
        $paket->gambar = $nama_file;
    }

    $paket->update([
        'nama_paket'   => $request->nama_paket,
        'deskripsi'    => $request->deskripsi,
        'harga'        => $request->harga,
        'durasi_hari'  => $request->durasi_hari,
        'durasi_malam' => $request->durasi_malam,
        'gambar'       => $paket->gambar,
        'tour_id'      => $request->tour_id,
        'kategori_id'  => $request->kategori_id,
        'tipe_harga'   => $request->tipe_harga,  // ✅
        'jumlah_fix'   => $request->tipe_harga === 'per_paket' ? $request->jumlah_fix : null, // ✅
    ]);

    return redirect()->route('paket.dashboard')->with('success', 'Paket berhasil diperbarui');
}

    public function destroy($id)
{
    $paket = PaketTour::findOrFail($id);

    if ($paket->gambar) {
        Storage::disk('public')->delete($paket->gambar);
    }

    $paket->delete();

    return redirect()->route('paket.dashboard')->with('success', 'Paket berhasil dihapus');
}



}
