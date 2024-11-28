<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use function PHPSTORM_META\type;

class Klpd extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // public function __construct()
    // {
    //     $this->setPerPage((int) Setting::where('key', 'item_per_page')->first()->value);
    // }

    /**
     * Query Search
     */
    public function scopeFilter(Builder $query): void
    {

        if (request('search')) {
            $query->whereAny(['nama_klpd', 'kd_klpd'], 'ilike', '%' . request('search') . '%');
        }
        if (request()->has('kementerian')) {
            $query->orWhere('jenis_klpd', '=', 'KEMENTERIAN');
        }
        if (request()->has('lembaga')) {
            $query->orWhere('jenis_klpd', '=', 'LEMBAGA');
        }
        if (request()->has('provinsi')) {
            $query->orWhere('jenis_klpd', '=', 'PROVINSI');
        }
        if (request()->has('kabupaten')) {
            $query->orWhere('jenis_klpd', '=', 'KABUPATEN');
        }
        if (request()->has('kota')) {
            $query->orWhere('jenis_klpd', '=', 'KOTA');
        }
    }
}
