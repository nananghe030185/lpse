<?php

namespace App\Http\Controllers;

use App\AppLpse;
use App\Models\Inbox;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inbox = Inbox::orderBy('id', 'DESC')->filter()->paginate();
        request('search') ? $inbox->appends(['search' => request('search')]) : '';

        $params = [
            'title' => 'Inbox',
            'setting' => AppLpse::setting('logo_image'),
            'datas' => $inbox,

        ];
        return view('backend/inbox', $params);
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
        Inbox::destroy($id);

        return redirect(route('inbox.index'))->with('success', __('global.message.destroy', ['view' => 'Inbox']));
    }

    /**
     * Remove Masal the specified created_at from storage.
     */
    public function deletes()
    {
        Inbox::where('created_at', '<', Carbon::parse(request('created_at')))->delete();

        return redirect(route('inbox.index'))->with('success', __('global.message.destroy', ['view' => 'Inbox']));
    }
}
