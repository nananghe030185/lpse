<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lelang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['satker', 'klpd'];

    // public function __construct()
    // {
    //     $this->setPerPage((int) Setting::where('key', 'item_per_page')->first()->value);
    // }

    public function satker(): BelongsTo
    {
        return $this->belongsTo(Satker::class, 'kd_satker', 'kd_satker');
    }

    public function klpd(): BelongsTo
    {
        return $this->belongsTo(Klpd::class, 'kd_klpd', 'kd_klpd');
    }

    public function scopeFilter(Builder $query): void
    {

        request('search') ? $query->whereAny(['nama_paket', 'kd_rup'], 'ilike', '%' . request('search') . '%') : '';

        request()->has('pengadaanlangsung') ? $query->where('metode_pemilihan', '=', 'Pengadaan Langsung') : '';
        request()->has('seleksi') ? $query->where('metode_pemilihan', '=', 'Seleksi') : '';
        request()->has('penunjukanlangsung') ? $query->where('metode_pemilihan', '=', 'Penunjukan Langsung') : '';
        request()->has('kontes') ? $query->where('metode_pemilihan', '=', 'Kontes') : '';
        request()->has('tender') ? $query->where('metode_pemilihan', '=', 'Tender') : '';
        request()->has('tendercepat') ? $query->where('metode_pemilihan', '=', 'Tender Cepat') : '';
        request()->has('dikecualikan') ? $query->where('metode_pemilihan', '=', 'Dikecualikan') : '';
        request()->has('epurchasing') ? $query->where('metode_pemilihan', '=', 'E-Purchasing') : '';

        !is_null(request('waktu_pemilihan')) ? $query->where('waktu_pemilihan', '=', request('waktu_pemilihan')) : '';
    }
}
