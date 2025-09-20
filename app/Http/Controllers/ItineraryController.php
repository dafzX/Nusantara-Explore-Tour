<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketTour;
use App\Models\Itinerary;

class ItineraryController extends Controller
{
    // Tampilkan daftar itinerary per paket
    public function index($paketId)
    {
        $paket = PaketTour::with('itineraries')->findOrFail($paketId);
        return view('itinerary.index', compact('paket'));
    }

    // Form tambah itinerary
    public function create($paketId)
    {
        $paket = PaketTour::findOrFail($paketId);
        return view('itinerary.create', compact('paket'));
    }

    // Simpan itinerary baru
    public function store(Request $request, $paketId)
    {
        $request->validate([
            'day' => 'required|integer',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        Itinerary::create([
            'paket_id' => $paketId,
            'day' => $request->day,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('itinerary.index', $paketId)->with('success', 'Itinerary berhasil ditambahkan');
    }

    // Form edit itinerary
    public function edit($id)
    {
        $itinerary = Itinerary::findOrFail($id);
        return view('itinerary.edit', compact('itinerary'));
    }

    // Update itinerary
    public function update(Request $request, $id)
    {
        $request->validate([
            'day' => 'required|integer',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $itinerary = Itinerary::findOrFail($id);
        $itinerary->update($request->only(['day','judul','deskripsi']));

        return redirect()->route('itinerary.index', $itinerary->paket_id)->with('success', 'Itinerary berhasil diperbarui');
    }

    // Hapus itinerary
    public function destroy($id)
    {
        $itinerary = Itinerary::findOrFail($id);
        $paketId = $itinerary->paket_id;
        $itinerary->delete();

        return redirect()->route('itinerary.index', $paketId)->with('success', 'Itinerary berhasil dihapus');
    }
}
