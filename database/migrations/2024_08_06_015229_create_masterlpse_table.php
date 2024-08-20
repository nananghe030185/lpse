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
        Schema::create('lpses', function (Blueprint $table) {
            $table->id();
            $table->integer('kd_lpse')->unique();
            $table->string('nama_lpse');
            $table->string('link');
            $table->integer('jumlah_paket')->nullable(false)->default(0);
            $table->double('jumlah_pagu')->nullable(false)->default(0);
            $table->string('slug')->unique()->nullable();
            $table->string('meta_desc')->nullable();
            $table->datetimes();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lpses');
    }
};
