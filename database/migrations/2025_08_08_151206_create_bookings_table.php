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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap', 100);
            $table->string('email', 150);
            $table->date('tanggal_waktu');
            $table->foreignId('destinasi_id')
                ->constrained('tour', 'id_tour')
                ->onDelete('cascade');
            $table->integer('jumlah_orang');
            $table->foreignId('kategori_id')->nullable()->constrained('tour_categories')->onDelete('set null');
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
