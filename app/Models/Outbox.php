<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Outbox extends Model
{
    use HasFactory;
    // Eager Lazy Loading
    protected $with = ['user'];
    protected $guarded = ['id'];
    // protected $fillable = ['user_id', 'pesan', 'channel', 'kd_tender'];
    /**
     * Relasi ke Tabel User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
