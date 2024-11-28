<?php

namespace App\Http\Controllers;

use App\AppLpse;
use App\Models\Lelang;
use App\Models\PinPaket;
use Illuminate\Http\Request;

class LelangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lelang = Lelang::filter()->paginate();

        request('search') ? $lelang->appends(['search' => request('search')]) : '';

        request()->has('pengadaanlangsung') ? $lelang->appends(['pengadaanlangsung' => true]) : '';
        request()->has('seleksi') ? $lelang->appends(['seleksi' => true]) : '';
        request()->has('penujukanlangsung') ? $lelang->appends(['penujukanlangsung' => true]) : '';
        request()->has('kontes') ? $lelang->appends(['kontes' => true]) : '';
        request()->has('tender') ? $lelang->appends(['tender' => true]) : '';
        request()->has('tendercepat') ? $lelang->appends(['tendercepat' => true]) : '';
        request()->has('dikecualikan') ? $lelang->appends(['dikecualikan' => true]) : '';
        request()->has('epurchasing') ? $lelang->appends(['epurchasing' => true]) : '';

        !is_null(request('waktu_pemilihan')) ? $lelang->appends(['waktu_pemilihan' => request('waktu_pemilihan')]) : '';

        $params = [
            'title' => 'Lelang SIRUP',
            'datas' => $lelang,
            'setting' => AppLpse::setting('logo_image'),
        ];
        return view('backend/lelang', $params);
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
                'tipe' => 'Lelang',
                'lpse_id' => $request->kd_satker,
                'nama_paket' => $request->nama_paket
            ]);
        }
        return redirect(route('lelang.index'))->with('success', __('global.message.pin'));
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
        Lelang::destroy($id);

        return redirect(route('lelang.index'))->with('success', __('global.message.destroy', ['view' => 'Lelang']));
    }
}
