<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PinPaket extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // Eager Lazy Loading
    protected $with = ['user', 'proyek'];

    /**
     * Relasi ke Tabel User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi Ke Tabel Tender
     */
    public function proyek(): BelongsTo
    {
        return $this->belongsTo(Tender::class);
    }

    /**
     * Dapatkan semua data
     */
    public static function getAllData()
    {
        $user_id = auth()->user()->id;

        $pinpaket = DB::table('pin_pakets')
            ->leftJoin('tenders', 'tenders.id', '=', 'pin_pakets.proyek_id')
            ->leftJoin('master_lpses', 'tenders.repo_id', '=', 'master_lpses.kd_lpse')
            ->where('pin_pakets.user_id', '=', $user_id)
            ->select('pin_pakets.*', 'tenders.status_tender', 'tenders.nama_paket', 'tenders.hps', 'tenders.kategori', 'tenders.tanggal_akhir_pengumuman', 'tenders.lpse', 'tenders.kd_tender', 'master_lpses.link');

        return $pinpaket;
    }
}
