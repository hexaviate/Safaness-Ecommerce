<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;

class ProductImageController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ProductImage::all();
        return view('admin.components.productImage.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Product::all();
        return view('admin.components.productImage.add', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'image' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->route('productImage.create')->withErrors($validate)->withInput();
        }

        $imageName = time() . '.' . $request->image->extension();

        // $request->image->move(public_path('images'), $imageName);

        //img intervention
        $manager = ImageManager::withDriver(new Driver());

        //read image
        $image = $manager->read($request->file('image'));
        $image->encode(new AutoEncoder(quality: 50))->save(public_path('images/'.$imageName));

        //modify image

        ProductImage::create([
            "product_id" => $request->product_id,
            "image" => $imageName,
        ]);

        return redirect()->route('productImage.index');
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
        $data = Product::all();
        $productImage = ProductImage::findOrFail($id);
        return view('admin.components.productImage.edit', compact('data', 'productImage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $target = ProductImage::find($id);
        $validate = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'image' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->route('productImage.create')->withErrors($validate)->withInput();
        }

        $imageName = time() . '.' . $request->image->extension();

        // $request->image->move(public_path('images'), $imageName);

        //img intervention
        $manager = ImageManager::withDriver(new Driver());

        //read image
        $image = $manager->read($request->file('image'));
        $image->encode(new AutoEncoder(quality: 70))->save(public_path('images/'.$imageName));

        $target->update([
            "product_id" => $request->product_id,
            "image" => $imageName,
        ]);

        return redirect()->route('productImage.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = ProductImage::findOrFail($id);
        $image->delete();
        return redirect()->route('productImage.index');
    }
}
