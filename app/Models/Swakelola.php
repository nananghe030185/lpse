<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Swakelola extends Model
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

        !is_null(request('waktu_pemilihan')) ? $query->where('waktu_pemilihan', '=', request('waktu_pemilihan')) : '';
    }
}
