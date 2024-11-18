<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class LaporanKeuangan extends Model
{
    use HasFactory;

    protected $guarded = [];
    // Eager lazy Loading
    protected $with = ['user'];

    // public function __construct()
    // {
    //     $this->setPerPage((int) Setting::where('key', 'item_per_page')->first()->value);
    // }

    /**
     * Relasi ke tabel User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function pemasukan()
    {
        $jumlah = 0;
        $pemasukans = static::get('pemasukan');
        foreach ($pemasukans as $key => $pemasukan) {
            $jumlah += $pemasukan->pemasukan;
        }

        return $jumlah;
    }

    public static function pengeluaran()
    {
        $jumlah = 0;
        $pengeluarans = static::get('pengeluaran');
        foreach ($pengeluarans as $key => $pengeluaran) {
            $jumlah += $pengeluaran->pengeluaran;
        }

        return $jumlah;
    }

    public static function saldo()
    {
        $saldo = 0;
        $pemasukan = static::get('pemasukan');
        $pengeluaran = static::get('pengeluaran');
        foreach ($pemasukan as $key => $value) {
            $saldo += intval($value->pemasukan) - intval($pengeluaran[$key]->pengeluaran);
        }

        return $saldo;
    }

    /**
     * Query Search
     */
    public function scopeFilter(Builder $query): void
    {
        if (request('search')) {
            $query->where('keterangan', 'ilike', '%' . request('search') . '%');
        }
    }
}
