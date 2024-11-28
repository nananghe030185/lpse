<?php

namespace App\Http\Controllers;

use App\AppLpse;
use App\Models\PinPaket;
use Illuminate\Console\Application;
use Illuminate\Http\Request;

class PinPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pinpaket = PinPaket::member()->filter()->paginate();
        request('search') ? $pinpaket->appends(['search' => request('search')]) : '';

        $params = [
            'title' => 'Fokus Proyek',
            'datas' => $pinpaket,
            'setting' => AppLpse::setting('logo_image'),
        ];
        return view('backend/pinproyek', $params);
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
        PinPaket::destroy($id);

        return redirect(route('pinproyek.index'))->with('success', __('global.message.destroy', ['view' => 'Fokus Proyek']));
    }
}
