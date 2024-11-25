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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->boolean('state')->default(false);
            $table->integer('user_id')->unique();
            $table->string('nama')->nullable();
            $table->string('perusahaan')->nullable();
            $table->string('kbli')->nullable();
            $table->string('kata_kunci')->nullable();
            $table->string('whatsapp')->nullable();
            $table->boolean('notif_whatsapp')->default(false);
            $table->string('telegram')->nullable();
            $table->boolean('notif_telegram')->default(false);
            $table->boolean('notif_email')->default(false);
            $table->string('image')->nullable();
            $table->dateTime('masa_berlaku')->default(now());
            $table->string('upline')->nullable();
            $table->datetimes();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userprofiles');
    }
};
