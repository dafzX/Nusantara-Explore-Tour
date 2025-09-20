<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'email',
        'no_telepon',
        'alamat',
        'tanggal_waktu',
        'paket_id',
        'jumlah_orang',
        'message',
        'status',
    ];

    public function paket()
    {
        return $this->belongsTo(PaketTour::class, 'paket_id', 'id_paket');
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'booking_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
