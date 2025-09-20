<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('paket_tour', function (Blueprint $table) {
            $table->id('id_paket');
            $table->string('nama_paket');
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 12, 2);
            $table->integer('durasi_hari');
            $table->integer('durasi_malam');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_tour');
    }
};
