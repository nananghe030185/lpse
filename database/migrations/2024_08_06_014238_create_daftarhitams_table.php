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
        Schema::create('daftar_hitams', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_anggaran')->nullable();
            $table->string('kd_klpd')->nullable();
            $table->string('nama_klpd')->nullable();
            $table->string('kd_satker')->nullable();
            $table->string('nama_satker')->nullable();
            $table->string('lpse_id')->nullable();
            $table->string('kd_penyedia')->nullable();
            $table->string('nama_penyedia')->nullable();
            $table->string('npwp_penyedia')->nullable();
            $table->string('alamat_penyedia')->nullable();
            $table->string('alamat_tambahan_penyedia')->nullable();
            $table->string('kabupaten_penyedia')->nullable();
            $table->string('provinsi_penyedia')->nullable();
            $table->string('jenis_paket')->nullable();
            $table->string('kd_paket')->nullable();
            $table->string('no_sk_blacklist')->nullable();
            $table->dateTime('tgl_tayang_blacklist')->nullable();
            $table->dateTime('tgl_berlaku_dari')->nullable();
            $table->dateTime('tgl_berlaku_sampai')->nullable();
            $table->string('jenis_pelanggaran')->nullable();
            $table->string('deskripsi_pelanggaran')->nullable();
            $table->string('no_sk_pencabutan')->nullable();
            $table->string('tgl_sk_pencabutan')->nullable();
            $table->string('nama_koresponden')->nullable();
            $table->string('email_koresponden')->nullable();
            $table->string('status')->nullable();
            $table->datetimes();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_hitams');
    }
};
