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
        Schema::create('swakelolas', function (Blueprint $table) {
            $table->id();
            $table->string('kd_rup');
            $table->string('kd_klpd');
            $table->integer('kd_satker');
            $table->text('nama_kegiatan');
            $table->text('nama_paket');
            $table->double('pagu');
            $table->string('sumber_dana');
            $table->string('waktu_pemilihan');
            $table->datetimes();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('swakelolas');
    }
};
