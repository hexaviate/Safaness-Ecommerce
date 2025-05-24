<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SubCategoryController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SubCategory::all();
        return view('admin.components.subCategory.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Category::all();
        return view('admin.components.subCategory.add', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|unique:sub_categories',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $data = SubCategory::create([
            "category_id" => $request->category_id,
            "name" => $request->name,
            'slug' => Str::of($request->name)->slug('-')
        ]);

        return redirect()->route('subCategory.index');
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
        $data = SubCategory::findOrFail($id);
        $category = Category::all();

        return view('admin.components.subCategory.edit', compact('data', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|unique:sub_categories,id',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        SubCategory::where('id', $id)->update([
            "category_id" => $request->category_id,
            'name' => $request->name,
            'slug' => Str::of($request->name)->slug('-')
        ]);

        return redirect()->route('subCategory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = SubCategory::findOrFail($id);
        $category->delete();
        return redirect()->route('subCategory.index');
    }
}
