<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LaporanKeuangan extends Model
{
    use HasFactory;

    protected $guarded = [];
    // Eager lazy Loading
    protected $with = ['user'];

    /**
     * Relasi ke tabel User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
