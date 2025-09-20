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
        Schema::table('paket_tour', function (Blueprint $table) {
            $table->enum('tipe_harga', ['per_orang', 'per_paket'])->default('per_orang')->after('harga');
            $table->integer('jumlah_fix')->nullable()->after('tipe_harga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paket_tour', function (Blueprint $table) {
            $table->dropColumn(['tipe_harga', 'jumlah_fix']);
        });
    }
};
