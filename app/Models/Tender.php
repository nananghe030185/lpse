<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tender extends Model
{
    use HasFactory;
    // protected $primaryKey = 'id';
    protected $guarded = ['id'];

    // Earger Lazy Loading
    protected $with = ['lpses'];

    /**
     * Ralasi ke Tabel Master_lpses
     */
    public function lpses(): BelongsTo
    {
        return $this->belongsTo(Lpse::class, 'lpse_id');
    }


    /**
     * search query
     */
    public function scopeFilter(Builder $query): void
    {

        request('search') ?  $query->whereAny(['nama_paket', 'tahapan', 'ijin', 'tender_id'], 'ilike', '%' . request('search') . '%') : '';

        request()->has('pengadaanbarang') ? $query->where('kategori', '=', 'Pengadaan Barang') : '';
        request()->has('jkbunk') ? $query->where('kategori', '=', 'Jasa Konsultansi Badan Usaha Non Konstruksi') : '';
        request()->has('pk') ? $query->where('kategori', '=', 'Pekerjaan Konstruksi') : '';
        request()->has('jl') ? $query->where('kategori', '=', 'Jasa Lainnya') : '';
        request()->has('jkpnk') ? $query->where('kategori', '=', 'Jasa Konsultansi Perorangan Non Konstruksi') : '';
        request()->has('jkbuk') ? $query->where('kategori', '=', 'Jasa Konsultansi Badan Usaha Konstruksi') : '';
        request()->has('jkpk') ? $query->where('kategori', '=', 'Jasa Konsultansi Perorangan Konstruksi') : '';
        request()->has('pkt') ? $query->where('kategori', '=', 'Pekerjaan Konstruksi Terintegrasi') : '';
        request()->has('pkt') ? $query->where('kategori', '=', 'Pekerjaan Konstruksi Terintegrasi') : '';

        request('lpse') > 0 ? $query->where('tender_id', '=', request('lpse')) : '';
    }

    /**
     * Search by LPSE
     */
    public function scopeLpse(Builder $query): void
    {
        request('search') ?  $query->where('lpse', 'ilike', '%' . request('lpse') . '%') : '';
    }
}
