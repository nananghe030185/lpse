<?php

namespace App\Http\Controllers\Api;

use App\ApiSwakelola;
use App\Http\Controllers\Controller;
use App\Models\Satker;
use App\Models\Swakelola;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SwakelolaController extends Controller
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
        ApiSwakelola::execute();

        return redirect(route('swakelola.index'));
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
        ApiSwakelola::execute();

        return redirect(route('swakelola.index'))->with('success', __('global.message.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
