<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

class Satker extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // public function __construct()
    // {
    //     $this->setPerPage((int) Setting::where('key', 'item_per_page')->first()->value);
    // }

    public static function getAllData()
    {
        $satkers = DB::table('master_satkers')
            ->join('master_klpds', 'master_klpds.kd_klpd', '=', 'master_satkers.kd_klpd')
            ->select('master_satkers.*', 'master_klpds.nama_klpd');

        return $satkers;
    }

    public function scopeFilter(Builder $query): void
    {
        $query->where('nama_satker', 'ilike', '%' . request('search') . '%');
    }
}
