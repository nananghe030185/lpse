<?php

namespace App\Http\Controllers;

use App\AppLpse;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::orderBy('id', 'ASC')->filter()->paginate();
        request('search') ? $setting->appends(['search' => request('search')]) : '';

        $now = new Carbon;

        $params = [
            'title' => 'Setting',
            'datas' => $setting,
            'diff' => $now->diffInDays('2024-09-10'),
            'setting' => AppLpse::setting('logo_image'),
        ];
        return view('backend/setting', $params);
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
        if ($request->file('value')) {
            $file = $request->file('value')->store('logo');
            Setting::where('id', $id)->update([
                'value' => $file
            ]);
        } else {
            Setting::where('id', $id)->update([
                'value' => $request->value
            ]);
        }

        return redirect(route('setting.index'))->with('success', __('global.message.update', ['view' => 'Setting']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
