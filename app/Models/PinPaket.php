<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PinPaket extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // Eager Lazy Loading
    protected $with = ['user', 'tender', 'lpse', 'lelang', 'swakelola'];

    // public function __construct()
    // {
    //     $this->setPerPage((int) Setting::where('key', 'item_per_page')->first()->value);
    // }

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
    public function tender(): BelongsTo
    {
        return $this->belongsTo(Tender::class, 'proyek_id', 'tender_id');
    }

    /**
     * Relasi Ke Tabel LPSE
     */
    public function lpse(): BelongsTo
    {
        return $this->belongsTo(Lpse::class, 'lpse_id');
    }

    /**
     * Relasi Ke Tabel Lelang
     */
    public function lelang(): BelongsTo
    {
        return $this->belongsTo(Lelang::class, 'proyek_id', 'kd_rup');
    }

    /**
     * Relasi Ke Tabel Swakelola
     */
    public function swakelola(): BelongsTo
    {
        return $this->belongsTo(Swakelola::class, 'proyek_id', 'kd_rup');
    }

    /**
     * Dapatkan semua data
     */
    public static function getAllData()
    {
        // $user_id = auth()->user()->id;

        // $pinpaket = DB::table('pin_pakets')
        //     ->leftJoin('tenders', 'tenders.id', '=', 'pin_pakets.proyek_id')
        //     ->leftJoin('master_lpses', 'tenders.tender_id', '=', 'master_lpses.lpse_id')
        //     ->where('pin_pakets.user_id', '=', $user_id)
        //     ->select('pin_pakets.*', 'tenders.status_tender', 'tenders.nama_paket', 'tenders.hps', 'tenders.kategori', 'tenders.tanggal_akhir_pengumuman', 'tenders.lpse', 'tenders.tender_id', 'master_lpses.link');

        // return $pinpaket;
    }

    public function scopeFilter(Builder $query): void
    {
        request('search') ? $query->where('nama_paket', 'ilike', '%' . request('search') . '%') : '';
    }

    public function scopeMember(Builder $query): void
    {
        $query->where('user_id', Auth::user()->id);
    }
}
