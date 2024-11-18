<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $guarded = ['id'];
    // protected $with = ['post'];


    /**
     * Query Search
     */
    public function scopeFilter(Builder $query): void
    {
        if (request('search')) {
            $query->where('name', 'ilike', '%' . request('search') . '%');
        }
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'cat_id');
    }
}
