<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KonfirmasiPembayaran extends Model
{
    use HasFactory;
    protected $guarded = [];
    // Eager lazy Loading
    protected $with = ['user', 'profile'];

    /**
     * Relasi ke tabel User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Tabel Profile
     */
    public function profile(): BelongsTo
    {
        return $this->belongsTo(UserProfile::class, 'user_id', 'user_id');
    }
}
