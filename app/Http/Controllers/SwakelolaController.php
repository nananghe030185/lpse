<?php

namespace App\Http\Controllers;

use App\AppLpse;
use App\Models\PinPaket;
use App\Models\Swakelola;
use Illuminate\Http\Request;

class SwakelolaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $swakelola = Swakelola::filter()->paginate();
        request('search') ? $swakelola->appends(['search' => request('search')]) : '';

        !is_null(request('waktu_pemilihan')) ? $swakelola->appends(['waktu_pemilihan' => request('waktu_pemilihan')]) : '';

        $params = [
            'title' => 'Swakelola SIRUP',
            'setting' => AppLpse::setting('logo_image'),
            'datas' => $swakelola
        ];
        return view('backend/swakelola', $params);
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
        if (!PinPaket::where([
            'user_id' => $request->user()->id,
            'proyek_id' => $request->kd_rup
        ])->count()) {
            PinPaket::create([
                'user_id' => $request->user()->id,
                'proyek_id' => $request->kd_rup,
                'tipe' => 'Swakelola',
                'lpse_id' => $request->kd_satker,
                'nama_paket' => $request->nama_paket
            ]);
        }
        return redirect(route('swakelola.index'))->with('success', __('global.message.pin'));
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
}
