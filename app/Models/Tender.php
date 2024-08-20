<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tender extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // Earger Lazy Loading
    protected $with = ['datalpse'];

    /**
     * Ralasi ke Tabel Master_lpses
     */
    public function datalpse(): BelongsTo
    {
        return $this->belongsTo(Lpse::class, 'repo_id', 'kd_lpse');
    }

    /**
     * search query
     */
    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('nama_paket', 'ilike', '%' . $search . '%');
        });
    }

    /**
     * Search by LPSE
     */
    public function scopeLpse(Builder $query): void
    {
        $query->where('lpse', 'ilike', '%' . request('lpse') . '%');
    }
}
