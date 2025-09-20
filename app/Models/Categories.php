<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'tour_categories';
    protected $primaryKey = 'id_categories'; // tambahkan ini!
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_kategori',
        'deskripsi_kategori'
    ];

    public function tours()
    {
        return $this->hasMany(Tour::class, 'kategori_id', 'id_categories');
    }
}

