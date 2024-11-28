<?php

namespace App\Http\Controllers;

use App\AppLpse;
use App\Models\LaporanKeuangan;
use Illuminate\Http\Request;

class PembukuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $params = [
            'title' => 'Laporan Pembukuan',
            'setting' => AppLpse::setting('logo_image'),
            'datas' => LaporanKeuangan::orderBy('id', 'DESC')->filter()->paginate(),
            'pemasukan' => LaporanKeuangan::pemasukan(),
            'pengeluaran' => LaporanKeuangan::pengeluaran(),
            'saldo' => LaporanKeuangan::saldo()
        ];
        return view('backend/pembukuan', $params);
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
}
