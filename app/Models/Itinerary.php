<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    protected $table = 'itinerary';
    protected $primaryKey = 'id_itinerary';
    protected $fillable = ['paket_id','day','judul','deskripsi'];

    public function paket()
    {
        return $this->belongsTo(PaketTour::class, 'paket_id');
    }
}
