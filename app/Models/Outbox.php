<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Outbox extends Model
{
    use HasFactory;
    // Eager Lazy Loading
    protected $with = ['user'];
    protected $guarded = ['id'];
    // protected $fillable = ['user_id', 'pesan', 'channel', 'tender_id'];

    // public function __construct()
    // {
    //     $this->setPerPage((int) Setting::where('key', 'item_per_page')->first()->value);
    // }
    /**
     * Relasi ke Tabel User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Query Search
     */
    public function scopeFilter(Builder $query): void
    {
        $query->where('pesan', 'ilike', '%' . request('search') . '%');
    }
}
