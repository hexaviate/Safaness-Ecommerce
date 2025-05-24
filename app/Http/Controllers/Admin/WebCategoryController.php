<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class WebCategoryController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::select('id', 'name', 'slug')->get();
        return view('admin.components.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.components.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:categories'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $slug = Str::of($request->name)->slug('-');

        $data = Category::create([
            'name' => $request->name,
            'slug' => Str::of($request->name)->slug('-')
        ]);

        return redirect()->route('category.index');

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
        $data = Category::findOrFail($id);
        return view('admin.components.category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:categories'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        Category::where('id', $id)->update([
            'name' => $request->name,
            'slug' => Str::of($request->name)->slug('-')
        ]);

        return redirect()->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index');
    }
}
