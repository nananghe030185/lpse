<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Komisi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['userUpline', 'userDownline'];

    public function userUpline(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_upline', 'id');
    }

    public function userDownline(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_downline', 'id');
    }

    public static function dibayar()
    {
        $jumlah = 0;
        $nominals = static::where('state', true)->get('nominal');
        foreach ($nominals as $key => $nominal) {
            $jumlah += $nominal->nominal;
        }

        return $jumlah;
    }

    public static function belumdibayar()
    {
        $jumlah = 0;
        $nominals = static::where('state', false)->get('nominal');
        foreach ($nominals as $key => $nominal) {
            $jumlah += $nominal->nominal;
        }

        return $jumlah;
    }
}
