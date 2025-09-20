<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tour_categories')->insert([
            [
                'nama_kategori' => 'Honeymoon',
                'deskripsi_kategori' => 'Paket romantis untuk pasangan yang ingin berbulan madu.',
            ],
            [
                'nama_kategori' => 'Family',
                'deskripsi_kategori' => 'Paket liburan yang cocok untuk keluarga.',
            ],
            [
                'nama_kategori' => 'Private',
                'deskripsi_kategori' => 'Paket eksklusif untuk perjalanan pribadi.',
            ],
            [
                'nama_kategori' => 'Group',
                'deskripsi_kategori' => 'Paket wisata untuk rombongan atau grup.',
            ],
            [
                'nama_kategori' => 'Adventure',
                'deskripsi_kategori' => 'Paket petualangan bagi pecinta tantangan.',
            ],
        ]);
    }
}
