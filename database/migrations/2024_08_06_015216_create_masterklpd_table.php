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
        Schema::create('klpds', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_klpd');
            $table->integer('kd_kabupaten');
            $table->string('kd_klpd')->unique();
            $table->integer('kd_provinsi');
            $table->string('nama_klpd');
            $table->datetimes();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klpds');
    }
};
