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
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tender_id');
            $table->bigInteger('lpse_id');
            $table->string('lpse')->nullable();
            $table->string('status_tender')->nullable();
            $table->string('nama_paket')->nullable();
            $table->string('slug')->nullable();
            $table->double('pagu')->nullable();
            $table->double('hps')->nullable();
            $table->dateTime('tgl_dibuat')->nullable();
            $table->dateTime('tgl_tayang')->nullable();
            $table->string('kategori')->nullable();
            $table->string('metode_pemilihan')->nullable();
            $table->string('metode_pengadaan')->nullable();
            $table->string('metode_evaluasi')->nullable();
            $table->string('cara_pembayaran')->nullable();
            $table->string('jenis_penetapan_pemenang')->nullable();
            $table->jsonb('instansi_dan_satker')->nullable();
            $table->string('apakah_paket_konsolidasi')->nullable();
            $table->text('daftar_paket_konsolidasi')->nullable();
            $table->jsonb('anggaran')->nullable();
            $table->jsonb('lokasi_paket')->nullable();
            $table->integer('jumlah_pendaftar')->nullable();
            $table->integer('jumlah_penawar')->nullable();
            $table->integer('jumlah_kirim_kualifikasi')->nullable();
            $table->integer('durasi_tender')->nullable();
            $table->string('versi_spse_paket')->nullable();
            $table->text('jadwal_pengumuman')->nullable();
            $table->dateTime('tanggal_awal_pengumuman')->nullable();
            $table->dateTime('tanggal_akhir_pengumuman')->nullable();
            $table->text('jadwal_penawaran')->nullable();
            $table->dateTime('tanggal_awal_penawaran')->nullable();
            $table->dateTime('tanggal_akhir_penawaran')->nullable();
            $table->string('tahapan')->nullable();
            $table->string('ijin')->nullable();
            $table->datetimes();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenders');
    }
};
