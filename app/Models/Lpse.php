<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lpse extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function top5()
    {
        $result = DB::table($this->getTable())
            ->orderByDesc('jumlah_paket')
            ->limit(5)->get();

        return $result;
    }

    /**
     * Logic memproses filter search
     */
    public function scopeFilter(Builder $query): void
    {
        $query->where('nama_lpse', 'ilike', '%' . request('search') . '%');
    }
}
