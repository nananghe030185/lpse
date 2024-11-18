<?php

namespace App\Http\Controllers;

use App\AppLpse;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $group = UserGroup::orderBy('id', 'ASC')->filter()->paginate();
        request('search') ? $group->appends(['search' => request('search')]) : '';

        $params = [
            'title' => 'Users',
            'setting' => AppLpse::setting('logo_image'),
            'datas' => $group
        ];
        return view('backend/usergroup', $params);
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
        $validate = $request->validate([
            'name' => ['required', 'unique:' . UserGroup::class],
        ]);

        UserGroup::create([
            'name' => $request->name
        ]);

        return redirect(route('usergroup.index'))->with('success', __('global.message.store', ['view' => 'User Group']));
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
        UserGroup::where('id', $id)->update([
            'name' => $request->name
        ]);

        return redirect(route('usergroup.index'))->with('success', __('global.message.update', ['view' => 'User Group']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (in_array($id, [1, 2, 3, 4, 5])) {
            return redirect(route('usergroup.index'))->with('error', 'User Group ini tidak boleh di hapus');
        }

        if (count(User::where('group_id', $id)->get())) {
            return redirect(route('usergroup.index'))->with('error', 'Untuk menghapus Group ini silahkan hapus terlebih dahulu user yang tergabung dalam group ini');
        }

        UserGroup::destroy($id);

        return redirect(route('usergroup.index'))->with('success', __('global.message.destroy', ['view' => 'User Group']));

        // foreach (UserGroup::where('id', $id)->first()->user() as $data) {
        //     echo $data->email;
        // }
    }
}
