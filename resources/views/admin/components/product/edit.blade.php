@extends('admin.layout.app')
@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Product</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('productAdmin.index') }}">Product Table</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ route('productAdmin.index') }}" class="btn btn-light">
                <i class="bx bx-arrow-back"></i> Back to Products
            </a>
        </div>
    </div>
    <!--end breadcrumb-->


    <div class="card border-top border-0 border-4 border-primary">
        <div class="card-body">
            <div class="card-title d-flex align-items-center mb-4">
                <div><i class="bx bxs-edit me-1 font-22 text-primary"></i></div>
                <h5 class="mb-0 text-primary">Edit Product</h5>
            </div>
            <hr>

            <form action="{{ route('productAdmin.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Product Name -->
                    <div class="mb-3 col-lg-6">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Product Name" value="{{ old('name', $product->name) }}" required />
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Slug -->
                    <div class="mb-3 col-lg-6">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                            name="slug" placeholder="Slug" value="{{ old('slug', $product->slug) }}" readonly />
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Slug akan dibuat otomatis dari nama.</small>
                    </div>

                    <!-- Sub Category -->
                    <div class="mb-3 col-lg-6">
                        <label for="sub_categories_id" class="form-label">Sub Category</label>
                        <select class="form-select @error('sub_categories_id') is-invalid @enderror" id="sub_categories_id"
                            name="sub_categories_id" required>
                            @if (isset($data))
                                @foreach ($data as $subCategory)
                                    <option value="{{ $subCategory->id }}"
                                        {{ old('sub_categories_id', $product->sub_categories_id) == $subCategory->id ? 'selected' : '' }}>
                                        {{ $subCategory->name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @error('sub_categories_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Weight -->
                    <div class="mb-3 col-lg-3">
                        <label for="weight" class="form-label">Weight (gram)</label>
                        <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight"
                            name="weight" placeholder="e.g., 100" value="{{ old('weight', $product->weight) }}"
                            required />
                        @error('weight')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Stock -->
                    <div class="mb-3 col-lg-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock"
                            name="stock" placeholder="e.g., 50" value="{{ old('stock', $product->stock) }}" required />
                        @error('stock')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div class="mb-3 col-lg-6">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                            id="price" name="price" placeholder="e.g., 150000.00"
                            value="{{ old('price', $product->price) }}" required />
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-3 col-lg-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            rows="5" placeholder="Product Description">{{ old('description', $product->description) }}</textarea>

                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>



                <!-- Buttons -->
                <div class="col-lg-12 mt-4">
                    <button type="submit" class="btn btn-primary px-5">
                        <i class="bx bx-save me-1"></i> Update Product
                    </button>
                    <a href="{{ route('productAdmin.index') }}" class="btn btn-secondary ms-2">
                        <i class="bx bx-x-circle me-1"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript for auto-generating slug from name -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nameInput = document.getElementById('name');
            const slugInput = document.getElementById('slug');

            if (nameInput && slugInput) {
                nameInput.addEventListener('input', function() {
                    let slug = this.value.toLowerCase()
                        .replace(/[^\w\s-]/g, '')
                        .replace(/\s+/g, '-')
                        .replace(/-+/g, '-');

                    slugInput.value = slug;
                });
            }
        });
    </script>
@endsection

@push('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => console.error(error));
    </script>
@endpush

@push('style')
    <style>
        .ck-editor__editable_inline {
            min-height: 300px;
            /* ubah sesuai kebutuhan */
        }
    </style>
@endpush
