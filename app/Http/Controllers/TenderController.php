<?php

namespace App\Http\Controllers;

use App\AppLpse;
use App\Models\Lpse;
use App\Models\PinPaket;
use App\Models\Tender;
use App\Models\User;
use App\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class TenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tender = Tender::orderBy('tanggal_akhir_penawaran', 'DESC')->filter()->paginate();

        request('search') ? $tender->appends(['search' => request('search')]) : '';
        request('lpse') ? $tender->appends(['lpse' => request('lpse')]) : '';
        request()->has('pengadaanbarang') ? $tender->appends(['pengadaanbarang' => true]) : '';
        request()->has('jkbunk') ? $tender->appends(['jkbunk' => true]) : '';
        request()->has('pk') ? $tender->appends(['pk' => true]) : '';
        request()->has('jl') ? $tender->appends(['jl' => true]) : '';
        request()->has('jkpnk') ? $tender->appends(['jkpnk' => true]) : '';
        request()->has('jkbuk') ? $tender->appends(['jkbuk' => true]) : '';
        request()->has('jkpk') ? $tender->appends(['jkpk' => true]) : '';
        request()->has('pkt') ? $tender->appends(['pkt' => true]) : '';
        request()->has('pkt') ? $tender->appends(['pkt' => true]) : '';


        // $personals = User::where(['group_id' => '3', 'state' => true])->get();

        $params = [
            'title' => 'Tender Proyek LPSE',
            'datas' => $tender,
            // 'personals' => $personals,
            'setting' => AppLpse::setting('logo_image'),
            'lpses' => Lpse::where('state', true)->orderBy('nama_lpse', 'ASC')->get(['nama_lpse', 'id']),
        ];
        return view('backend/tender', $params);
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
            'proyek_id' => $request->tender_id
        ])->count()) {
            PinPaket::create([
                'user_id' => $request->user()->id,
                'proyek_id' => $request->tender_id,
                'tipe' => 'LPSE',
                'lpse_id' => $request->lpse_id,
                'nama_paket' => $request->nama_paket
            ]);
        }
        return redirect(route('tender.index'))->with('success', __('global.message.pin'));
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
    public function edit(string $tender_id, int $lpse_id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tender::destroy($id);

        return redirect(route('tender.index'))->with('success', __('global.message.destroy', ['view' => 'Tender']));
    }
}
