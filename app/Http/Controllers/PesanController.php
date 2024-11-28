<?php

namespace App\Http\Controllers;

use App\Models\Outbox;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PesanController extends Controller
{
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
        $validateData = $request->validate([
            'pesan' => 'required'
        ]);

        $users = User::where('group_id', $request->group_id)->get();
        foreach ($users as $user) {
            $pesan = Str::replace('{{name}}', $user->name, $request->pesan);

            if ($request->has('telegram')) {
                Outbox::create([
                    'pesan' => $pesan,
                    'user_id' => $user->id,
                    'channel' => 'telegram'
                ]);
            }

            if ($request->has('email')) {
                Outbox::create([
                    'pesan' => $pesan,
                    'user_id' => $user->id,
                    'channel' => 'email'
                ]);
            }

            if ($request->has('whatsapp')) {
                Outbox::create([
                    'pesan' => $pesan,
                    'user_id' => $user->id,
                    'channel' => 'whatsapp'
                ]);
            }
        }
        return redirect()->back()->with('success', __('global.message.send'));
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
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
