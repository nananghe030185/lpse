<?php

namespace App\Http\Controllers;

use App\AppLpse;
use Illuminate\Http\Request;
use App\Models\Klpd;
use App\Table;
use Illuminate\Support\Facades\App;

class KlpdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $klpd = Klpd::orderBy('id', 'ASC')->filter()->paginate();
        if (request('search')) {
            $klpd->appends(['search' => request('search')]);
        }
        if (request('kementerian') || request()->has('kementerian')) {
            $klpd->appends(['kementerian' => true]);
        }
        if (request()->has('lembaga')) {
            $klpd->appends(['lembaga' => true]);
        }
        if (request()->has('provinsi')) {
            $klpd->appends(['provinsi' => true]);
        }
        if (request()->has('kabupaten')) {
            $klpd->appends(['kabupaten' => true]);
        }
        if (request()->has('kota')) {
            $klpd->appends(['kota' => request('Kota')]);
        }
        $table = new Table($klpd, ['id' => 'ID', 'jenis_klpd' => 'Jenis KLPD', 'kd_klpd' => 'Kode KLPD',  'nama_klpd' => 'Nama KLPD']);

        $params = [
            'title' => 'Master KLPD',
            'datas' => $klpd,
            'table' => $table->show('klpd'),
            'setting' => AppLpse::setting('logo_image'),
        ];

        return view('backend/klpd', $params);
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
        Klpd::create([
            'jenis_klpd' => $request->jenis_klpd,
            'kd_kabupaten' => $request->kd_kabupaten,
            'kd_klpd' => $request->kd_klpd,
            'kd_provinsi' => $request->kd_provinsi,
            'nama_klpd' => $request->nama_klpd
        ]);
        return redirect(route('klpd.index'))->with('success', __('global.message.update', ['view' => 'KLPD']));
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
            'nama_klpd' => 'required'
        ];

        $validatedata = $request->validate($rules);
        Klpd::where('id', $request->id)->update($validatedata);

        return redirect(route('klpd.index'))->with('success', __('global.message.update', ['view' => 'KLPD']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Klpd::destroy($id);

        return redirect(route('klpd.index'))->with('success', __('global.message.destroy', ['view' => 'KLPD']));
    }
}
