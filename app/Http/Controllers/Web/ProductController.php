<?php

namespace App\Http\Controllers\Web;


use App\Http\Resources\ProductImageResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductImage;
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
        $product = Product::with('sub_category')->get();
        $productList = Product::all();
        return view('', compact('product', 'productList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $user = auth()->user();
    //     if (!$user) {
    //         return redirect()->route('prosesLogin')->with('error', "anda belum login");
    //     }
    //     return view('');
    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $user = auth()->user();
    //     if (!$user) {
    //         return back()->with('error', 'anda tidak punya permission');
    //     }

    //     if ($user->getTable() == 'users') {

    //         $validate = Validator::make($request->all(), [
    //             'name' => 'required',
    //             'description' => 'required',
    //             'price' => 'required|decimal:2',
    //             'stock' => 'required|numeric',
    //             'sub_categories_id' => 'required|exists:categories,id'
    //         ]);

    //         if ($validate->fails()) {
    //             return redirect()->route('product.create')->withErrors($validate)->withInput();
    //         }

    //         $data = Product::create($validate->validated());

    //         return redirect()->route('product.create')->with('success', 'anda berhasil membuat product');


    //     } else {
    //         return redirect()->back()->with('error', 'Anda tidak punya permission');
    //     }
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('product_image', 'sub_category')->where('id', $id)->first();
        $image = $product->product_image()->get();
        return view('', compact('product', 'image'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $user = auth()->user();
    //     if (!$user) {
    //         return redirect()->route('prosesLogin')->with('error', "anda belum login");
    //     }
    //     $product = Product::find($id);
    //     return view('', compact('product'));
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     $user = auth()->user();
    //     if (!$user) {
    //         return back()->with('error', 'anda tidak punya permission');
    //     }

    //     if ($user->getTable() == 'users') {

    //         $target = Product::find($id);
    //         if (!$target) {
    //             return back()->with('error', 'Produk tidak valid');
    //         }

    //         $validate = Validator::make($request->all(), [
    //             'name' => 'required',
    //             'description' => 'required',
    //             'price' => 'required|decimal:2',
    //             'stock' => 'required|numeric',
    //             'sub_categories_id' => 'required|exists:categories,id'
    //         ]);

    //         if ($validate->fails()) {
    //             return redirect()->route('product.edit')->withErrors($validate)->withInput();
    //         }

    //         $data = collect($request->only('name', 'description', 'price', 'stock', 'sub_categories_id'))
    //             ->filter(fn($value) => !is_null($value))
    //             ->toArray();

    //         // ✅ If name is included, also generate slug automatically
    //         if (isset($data['name'])) {
    //             $data['slug'] = Str::of($data['name'])->slug('-');
    //         }

    //         $target->update($data);

    //         return redirect()->route('product.index')->with('success', 'anda berhasil membuat product');

    //     } else {
    //         return redirect()->back()->with('error', 'Anda tidak punya permission');
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     $user = auth()->user();
    //     if (!$user) {
    //         return back()->with('error', 'anda tidak punya permission');
    //     }

    //     if ($user->getTable() == 'users') {

    //         $data = Product::find($id);
    //         if (!$data) {
    //             return back()->with('error', 'Produk tidak valid');
    //         } else {
    //             $data->delete();

    //             return back()->with('success', 'Produk berhasil dihapus');

    //         }

    //     } else {
    //         return redirect()->back()->with('error', 'Anda tidak punya permission');
    //     }
    // }
}
