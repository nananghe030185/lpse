<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inbox extends Model
{
    use HasFactory;

    // Earger Lazy Loading
    protected $with = ['user'];
    protected $guarded = ['id'];
    /**
     * Relasi ke Tabel User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Query Search
     */
    public function scopeFilter(Builder $query): void
    {
        $query->where('pesan', 'ilike', '%' . request('search') . '%');
    }
}
