<?php

namespace App\Http\Controllers;

use App\AppLpse;
use App\Models\Lpse;
use App\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LpseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lpse = Lpse::orderBy('nama_lpse', 'ASC')->filter()->paginate();
        if (request('search')) {
            $lpse->appends(['search' => request('search')]);
        }
        $table = new Table($lpse, ['id' => 'ID', 'lpse_id' => 'Kode LPSE', 'nama_lpse' => 'Nama LPSE',  'jumlah_paket' => 'Jumlah Paket', 'jumlah_pagu' => 'Jumlah Pagu', 'slug' => 'Slug']);

        $params = [
            'title' => 'Master LPSE',
            'datas' => $lpse,
            'table' => $table->show('lpse'),
            'setting' => AppLpse::setting('logo_image'),

        ];
        return view('backend/lpse', $params);
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
        $validatedData = $request->validate([
            'nama_lpse' => 'required',
            'slug' => 'required|unique:lpses',
            'link' => 'required',
            // 'lpse_id' => 'required|unique:lpses',
            'logo' => 'image|file|max:1024'
        ]);

        if ($request->file('logo')) {
            $validateData['logo'] = $request->file('logo')->store('logo');
        }


        Lpse::create($validatedData);

        return redirect(route('lpse.index'))->with('success', __('global.message.store', ['view' => 'LPSE']));
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
        $state = $request->has('state');

        $updatedData = [
            // 'lpse_id' => $request->lpse_id,
            'nama_lpse' => $request->nama_lpse,
            'link' => $request->link,
            'slug' => $request->slug,
            'description' => $request->description,
            'state' => $state,
        ];

        if ($request->file('logo')) {
            $updatedData['logo'] = $request->file('logo')->store('logo');
        }

        Lpse::where('id', $id)
            ->update($updatedData);

        return redirect(route('lpse.index'))->with('success', __('global.message.update', ['view' => 'LPSE']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Lpse::destroy($id);

        return redirect(route('lpse.index'))->with('success', __('global.message.destroy', ['view' => 'LPSE']));
    }

    public function status()
    {
        set_time_limit(0);
        $lpses  = Lpse::get(['id', 'link']);
        foreach ($lpses as $lpse) {
            if (!$lpse->link == null) {
                try {
                    if (Http::get($lpse->link)->status() == 200) {
                        // Update State jadi True
                        Lpse::where('id', $lpse->id)->update(['state' => true]);
                    } else {
                        // Update State jadi false
                        Lpse::where('id', $lpse->id)->update(['state' => false]);
                    }
                } catch (\Throwable $th) {
                    //throw $th;
                    $th->getCode();
                }
            }
        }

        return redirect(route('lpse.index'))->with('success', __('global.message.update', ['view' => 'LPSE']));
    }
}
