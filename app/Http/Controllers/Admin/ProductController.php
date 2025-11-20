<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::paginate(10);
        // $data = Product::all();
        return view('admin.components.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = SubCategory::all();
        return view('admin.components.product.add', compact('data'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'weight' => 'required|integer',
            'sub_categories_id' => 'required|exists:sub_categories,id'
        ]);

        if ($validate->fails()) {
            return redirect()->route('product.create')->withErrors($validate)->withInput();
        }

        Product::create([
            "name" => $request->name,
            "slug" => Str::of($request->name)->slug('-'),
            "description" => $request->description,
            "price" => $request->price,
            "stock" => $request->stock,
            "weight" => $request->weight,
            "sub_categories_id" => $request->sub_categories_id,
        ]);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Product::where('id', $id)->get();
        return view('admin.components.product.detail', compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = SubCategory::all();
        $product = Product::findOrFail($id);
        return view('admin.components.product.edit', compact('data', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $target = Product::find($id);
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'sub_categories_id' => 'required|exists:sub_categories,id'
        ]);

        if ($validate->fails()) {
            return redirect()->route('product.edit', $target)->withErrors($validate)->withInput();
        }

        $target->update([
            "name" => $request->name,
            "slug" => Str::of($request->name)->slug('-'),
            "description" => $request->description,
            "price" => $request->price,
            "stock" => $request->stock,
            "sub_categories_id" => $request->sub_categories_id,
        ]);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index');
    }
}
