<?php

namespace App\Http\Controllers;

use App\AppLpse;
use App\Models\Klpd;
use App\Models\Satker;
use Database\Seeders\KLPDSeeder;
use Illuminate\Http\Request;

class SatkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $satker = Satker::orderBy('id', 'ASC')->filter()->paginate();
        request('search') ? $satker->appends(['search' => request('search')]) : '';
        $params = [
            'title' => 'Master Satker',
            'datas' => $satker,
            'klpds' => Klpd::orderBy('nama_klpd')->get(['kd_klpd', 'nama_klpd']),
            'setting' => AppLpse::setting('logo_image'),
            // 'tes' => Klpd::all(['kd_klpd', 'nama_klpd'])->toArray(),
        ];
        return view('backend/satker', $params);
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
        Satker::create([
            'kd_satker' => $request->kd_satker,
            'kd_klpd' => $request->kd_klpd,
            'nama_satker' => $request->nama_satker,
        ]);

        return redirect(route('satker.index'))->with('success', __('global.message.store', ['view' => 'Satker']));
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
        $rules = [
            'nama_satker' => 'required',
            'kd_satker' => 'required',
            'kd_klpd' => 'required'
        ];

        $validatedata = $request->validate($rules);

        Satker::where('id', $id)->update($validatedata);

        return redirect(route('satker.index'))->with('success', __('global.message.update', ['view' => 'Satker']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Satker::destroy($id);

        return redirect(route('satker.index'))->with('success', __('global.message.destroy', ['view' => 'Satker']));
    }
}
