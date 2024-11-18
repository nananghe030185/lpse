<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Klpd;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KlpdController extends Controller
{
    protected $result;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        set_time_limit(0);

        $this->result = Http::get('https://isb.lkpp.go.id/isb-2/api/satudata/MasterKLPD')->json();
        $this->save();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function save()
    {
        foreach ($this->result as $key => $data) {
            Klpd::updateOrCreate(
                [
                    'kd_klpd' => $data['kd_klpd']
                ],
                [
                    'jenis_klpd' => $data['jenis_klpd'],
                    'kd_kabupaten' => $data['kd_kabupaten'],
                    'kd_provinsi' => $data['kd_provinsi'],
                    'nama_klpd' => $data['nama_klpd']
                ]
            );
            // Klpd::where('kd_klpd', $data['kd_klpd'])->update(
            //     [
            //         'jenis_klpd' => $data['jenis_klpd'],
            //         'kd_kabupaten' => $data['kd_kabupaten'],
            //         'kd_provinsi' => $data['kd_provinsi'],
            //         'nama_klpd' => $data['nama_klpd']
            //     ]
            // );
        }
    }
}
