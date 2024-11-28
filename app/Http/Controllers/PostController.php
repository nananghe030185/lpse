<?php

namespace App\Http\Controllers;

use App\AppLpse;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::orderBy('id', 'ASC')->filter()->paginate();
        request('search') ? $post->appends(['search' => request('search')]) : '';
        $params = [
            'title' => 'Post Artikel',
            'setting' => AppLpse::setting('logo_image'),
            'datas' => $post,
            'categories' => Category::get(['id', 'name'])
        ];

        return view('backend/posts', $params);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $params = [
            'title' => 'Tambah Artikel',
            'setting' => AppLpse::setting('logo_image'),
            'categories' => Category::get(['id', 'name'])
        ];

        return view('backend.post', $params);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'cat_id' => 'required',
            'description' => 'required'
        ]);

        Post::create($validate);

        return redirect(route('post.index'))->with('success', __('global.message.store', ['view' => 'Artikel']));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return redirect(route('post.create'));
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
        $validate = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'cat_id' => 'required',
            'body' => 'required'
        ]);

        Post::where('id', $id)->update($validate);

        return redirect(route('post.index'))->with('success', __('global.message.update', ['view' => 'Artikel']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
