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
        Schema::create('satkers', function (Blueprint $table) {
            $table->id();
            $table->string('kd_satker')->unique();
            // $table->string('kd_klpd');
            $table->string('kd_klpd');
            $table->string('nama_satker');
            $table->integer('penyedia_paket');
            $table->integer('penyedia_pagu');
            $table->integer('swakelola_paket');
            $table->integer('swakelola_pagu');
            $table->integer('penyedia_dalam_swakelola_paket');
            $table->integer('penyedia_dalam_swakelola_pagu');
            $table->integer('total_paket');
            $table->integer('total_pagu');
            $table->datetimes();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('satkers');
    }
};
