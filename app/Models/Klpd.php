<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Klpd extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Query Search
     */
    public function scopeFilter(Builder $query): void
    {
        $query->where('nama_klpd', 'ilike', '%' . request('search') . '%');
    }
}
