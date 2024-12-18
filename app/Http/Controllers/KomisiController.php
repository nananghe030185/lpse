<?php

namespace App\Http\Controllers;

use App\AppLpse;
use App\Models\Komisi;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class KomisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $params = [
            'title' => 'Komisi Member',
            'setting' => AppLpse::setting('logo_image'),
            'datas' => Komisi::paginate(),
            'dibayar' => Komisi::dibayar(),
            'belumdibayar' => Komisi::belumdibayar(),
            'uplines' => AppLpse::getUpline(),
        ];

        return view('backend.komisi', $params);
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
    public function show(Komisi $komisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Komisi $komisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Komisi $komisi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Komisi $komisi)
    {
        //
    }
}
