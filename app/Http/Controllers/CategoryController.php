<?php

namespace App\Http\Controllers;

use App\AppLpse;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::filter()->paginate();
        request('search') ? $category->appends(['search' => request('search')]) : '';
        $params = [
            'title' => 'Category',
            'setting' => AppLpse::setting('logo_image'),
            'datas' => $category
        ];

        return view('backend/category', $params);
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
        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description
        ]);

        return redirect(route('category.index'))->with('success',  __('category.save.success'));
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
        Category::destroy($id);

        return redirect(route('category.index'))->with('success', __('category.message.delete'));
    }
}
