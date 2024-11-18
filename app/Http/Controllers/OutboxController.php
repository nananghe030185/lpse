<?php

namespace App\Http\Controllers;

use App\AppLpse;
use App\Models\Outbox;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OutboxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outbox = Outbox::orderBy('id', 'DESC')->filter()->paginate();
        request('search') ? $outbox->appends(['search' => request('search')]) : '';

        $params = [
            'title' => 'Outbox',
            'setting' => AppLpse::setting('logo_image'),
            'datas' => $outbox
        ];
        return view('backend/outbox', $params);
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
        Outbox::where('id', $id)->update([
            'state' => 0
        ]);

        return redirect(route('outbox.index'))->with('success', __('global.resend'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Outbox::destroy($id);

        return redirect(route('outbox.index'))->with('success', __('global.message.destroy', ['view' => 'Outbox']));
    }

    public function deletes()
    {
        Outbox::where('created_at', '<', Carbon::parse(request('created_at')))->delete();

        return redirect(route('outbox.index'))->with('success', __('global.message.destroy', ['view' => 'Outbox']));
    }
}
