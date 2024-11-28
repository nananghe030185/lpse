<?php

namespace App\Models;

use App\Models\Scopes\NanangScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Lpse extends Model
{
    use HasFactory;
    // protected $primaryKey = 'lpse_id';
    protected $guarded = ['id'];
    // protected $with = ['tenders'];

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
        if (request('search')) {
            $query->where('nama_lpse', 'ilike', '%' . request('search') . '%');
        }
    }

    public function tenders(): HasMany
    {
        return $this->hasMany(Tender::class);
    }
}
