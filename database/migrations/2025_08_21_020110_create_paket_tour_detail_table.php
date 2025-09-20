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
        Schema::create('paket_tour_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paket_id');
            $table->unsignedBigInteger('tour_id');
            $table->integer('urutan')->nullable(); // urutan kunjungan (opsional)
            $table->timestamps();

            $table->foreign('paket_id')->references('id_paket')->on('paket_tour')->onDelete('cascade');
            $table->foreign('tour_id')->references('id_tour')->on('tour')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_tour_detail');
    }
};
