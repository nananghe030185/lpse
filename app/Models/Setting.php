<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Setting extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // public function __construct()
    // {
    //     $this->setPerPage((int) Setting::where('key', 'item_per_page')->first()->value);
    // }

    /**
     * Logic memproses filter search
     */
    public function scopeFilter(Builder $query): void
    {
        if (request('search')) {
            $query->where('key', 'ilike', '%' . request('search') . '%');
        }
    }
}
