<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Klpd;
use App\Models\Satker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SatkerController extends Controller
{
    protected $result;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        set_time_limit(0);
        $query = [
            'query' => [
                'tahun'     => Carbon::now()->format('Y'),
                'sEcho'     => 1,
                'iDisplayStart' => 0,
                'iDisplayLength' => 1000,
                'sSearch'    => ''
            ]
        ];

        foreach (Klpd::get(['kd_klpd']) as $i => $kldi) {
            $query['query']['idKldi'] = $kldi->kd_klpd; // Kode BIG

            $url = 'https://sirup.lkpp.go.id/sirup/datatablectr/datatableruprekapkldi';

            $this->result = Http::get($url, $query)->json();

            // return $this->save();

        }

        return redirect(route('satker.index'))->with('success', __('global.message.success'));
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
            Satker::updateOrCreate([
                // 'lpse_id' => $data['lpse_id'],
                // 'nama_lpse' => $data['nama_lpse']
            ]);
        };
    }
}
