@extends('admin.admin')
@section('content')
@if ($errors->any())
<div class="alert border-0 border-start border-5 border-danger alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="font-35 text-danger"><i class="bx bxs-message-square-x"></i>
        </div>
        <div class="ms-3">
            <h6 class="mb-0 text-danger">Invalid</h6>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card">
    <div class="card-body p-4">
        <h5 class="card-title">Add New Product</h5>
        <hr />
        <div class="form-body mt-4">
            <form action="{{ route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-8">
                        <div class="border border-3 p-4 rounded">
                            <div class="mb-3">
                                <label for="inputProductTitle" class="form-label">Product Title</label>
                                <input type="text" name="name" value="{{ old('name', $product->name)}}"
                                    class="form-control" id="inputProductTitle" placeholder="Enter product title">
                            </div>
                            <div class="mb-3">
                                <label for="inputProductDescription" class="form-label">Description</label>
                                <textarea class="form-control" name="description"
                                    value="" id="inputProductDescription"
                                    rows="3">{{old('description', $product->description)}}</textarea>
                            </div>
                            {{-- Show the old image --}}
                            <div class="mb-3">
                                <label for="inputProductDescription" class="form-label">Product Images</label>
                                <input id="image-uploadify" type="file" name="product_img"
                                    value="{{ old('product_img', $product->product_img)}}"
                                    accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="border border-3 p-4 rounded">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="inputPrice" class="form-label">Price</label>
                                    <input type="number" class="form-control" id="inputPrice" name="price"
                                        value="{{ old('price', $product->price)}}" placeholder="00.00">
                                </div>
                                <div class="col-md-6">
                                    <label for="stock" class="form-label">Stock</label>
                                    <input type="number" id="stock" class="form-control" name="stock" placeholder="00"
                                        value="{{ old('stock', $product->stock)}}">
                                </div>
                                <div class="col-12">
                                    <label for="inputProductType" class="form-label">Product Type</label>
                                    <select class="form-select" id="inputProductType" name="sub_categories_id">
                                        @foreach ($data as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Save Product</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--end row-->
        </div>
    </div>
    @endsection
