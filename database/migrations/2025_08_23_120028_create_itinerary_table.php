<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('itinerary', function (Blueprint $table) {
            $table->id('id_itinerary');
            $table->unsignedBigInteger('paket_id'); // foreign key ke paket_tour
            $table->integer('day');               // Day 1, Day 2, dst
            $table->string('judul');              // judul itinerary
            $table->text('deskripsi');            // deskripsi kegiatan
            $table->timestamps();

            $table->foreign('paket_id')->references('id_paket')->on('paket_tour')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itinerary');
    }
};
