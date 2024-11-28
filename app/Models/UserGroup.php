<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserGroup extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['user'];

    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'id', 'group_id');
    }

    public function scopeFilter(Builder $query): void
    {
        request('search') ? $query->where('name', 'ilike', '%' . request('search') . '%') : '';
    }
}
