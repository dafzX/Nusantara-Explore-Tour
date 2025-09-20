<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = 'tour';
    protected $primaryKey = 'id_tour';
    public $incrementing = true; 
    protected $keyType = 'int';
    protected $fillable = [
        'gambar',
        'nama_daerah',
        'deskripsi',
    ];

    // Relasi ke PaketTour
    public function paketTours()
    {
        return $this->hasMany(PaketTour::class, 'tour_id', 'id_tour');
    }
}
