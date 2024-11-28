<?php

namespace App\Http\Controllers;

use App\AppLpse;
use App\Models\Inbox;
use App\Models\Outbox;
use App\Models\User;
use App\Models\UserGroup;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderBy('id', 'ASC')->filter()->paginate();
        request('search') ? $user->appends(['search' => request('search')]) : '';

        $params = [
            'title' => 'Users',
            'setting' => AppLpse::setting('logo_image'),
            'datas' => $user,
            'groups' => UserGroup::get(['id', 'name'])
        ];
        return view('backend/users', $params);
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
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        //     'username' => ['required', 'unique:' . User::class],
        //     'group_id' => ['required']
        // ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'group_id' => $request->group_id
        ]);

        // Create Profile
        UserProfile::create([
            'user_id' => $user->id
        ]);

        return redirect(route('user.index'))->with('success', __('global.message.store', ['view' => $user->name]));
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
        $is_admin = $request->group_id == 1 ? true : false;

        User::where('id', $id)
            ->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'state' => $state,
                'group_id' => $request->group_id,
                'is_admin' => $is_admin
            ]);

        return redirect(route('user.index'))->with('success', __('global.message.update', ['view' => 'User']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', $id)->first();
        if ($user->groups->id == 1) {
            return redirect(route('user.index'))->with('error', __('global.message.notdelete', ['group' => $user->groups->name]));
        }

        // Hapus Tabel User
        User::destroy($id);

        // Hapus User Profile
        UserProfile::where('user_id', $id)->delete();

        // Hapus Outbox
        Outbox::where('user_id', $id)->delete();

        // Hapus Inbox
        Inbox::where('user_id', $id)->delete();

        return
            redirect(route('user.index'))->with('success', __('global.message.destroy', ['view' => $user->name]));
    }
}
