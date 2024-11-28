<?php

namespace App\Http\Controllers;

use App\AppLpse;
use App\Models\DaftarHitam;
use Illuminate\Http\Request;

class DaftarHitamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daftarhitam = DaftarHitam::filter()->paginate();
        request('search') ? $daftarhitam->appends(['search' => request('search')]) : '';

        $params = [
            'title' => 'Daftar Hitam',
            'setting' => AppLpse::setting('logo_image'),
            'datas' => $daftarhitam
        ];
        return view('backend/daftarhitam', $params);
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
        DaftarHitam::destroy($id);

        return redirect(route('daftarhitam.index'))->with('success', __('global.message.destroy', ['view' => 'Daftar Hitam']));
    }
}
