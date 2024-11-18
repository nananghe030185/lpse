<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;

class DaftarHitam extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // public function __construct()
    // {
    //     $this->setPerPage((int) Setting::where('key', 'item_per_page')->first()->value);
    // }

    public function scopeFilter(Builder $query): void
    {
        $query->where('nama_penyedia', 'ilike', '%' . request('search') . '%');
    }

    public function scopePenyedia(Builder $query, $value): void
    {
        $query->where('kd_penyedia', '=', $value);
    }
}
