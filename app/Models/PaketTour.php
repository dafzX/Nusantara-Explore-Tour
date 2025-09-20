<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketTour extends Model
{
    protected $table = 'paket_tour';
    protected $primaryKey = 'id_paket';
    protected $fillable = [
        'nama_paket',
        'deskripsi',
        'harga',
        'durasi_hari',
        'durasi_malam',
        'gambar',
        'tour_id',
        'kategori_id',
        'tipe_harga',
        'jumlah_fix',
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id', 'id_tour');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'kategori_id');
    }

    public function itineraries()
    {
        return $this->hasMany(Itinerary::class, 'paket_id')->orderBy('day', 'asc');
    }

    // Tambahkan relasi booking
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'paket_id', 'id_paket');
    }
}
