@extends('admin.layout.app')
@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Product</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Product Table</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <a class="btn btn-primary" href="{{ route('product.create') }}">Tambah Data</a>
        </div>
    </div>
</div>
<!--end breadcrumb-->

<div class="row">
    <div class="col-xl-12 col-12 mb-5">
        <!-- card -->
        <div class="card h-100 card-lg">
            <div class="px-6 py-6">
                <div class="row justify-content-between">
                    <!-- form search -->
                    <div class="col-lg-4 col-md-6 col-12 mb-2 mb-lg-0">
                        {{-- <form class="d-flex" role="search">
                            <input class="form-control" type="search" placeholder="Search Products"
                                aria-label="Search" />
                        </form> --}}
                    </div>
                    <!-- select option -->
                    <div class="col-xl-2 col-md-4 col-12">
                        <select class="form-select">
                            <option selected>Status</option>
                            <option value="1">Active</option>
                            <option value="0">Deactive</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- card body -->
            <div class="card-body p-0">
                <!-- table -->
                <div class="table-responsive">
                    <table class="table table-centered table-hover text-nowrap table-borderless mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Slug</th>
                                <th>Sub Category</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($item->product_img)
                                            <img src="{{ asset('images/'.$item->product_img) }}" class="img-fluid" alt="{{ $item->name }}" style="max-width: 80px; max-height: 80px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('images/default-product.png') }}" class="img-fluid" alt="No Image" style="max-width: 80px; max-height: 80px; object-fit: cover;">
                                        @endif
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td>{{ $item->sub_category->name }}</td>
                                    <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('product.show', $item->id) }}" class="btn btn-sm btn-outline-success px-3">Detail</a>
                                        <a href="{{ route('product.edit', $item->id) }}" class="btn btn-sm btn-outline-primary px-3">Edit</a>
                                        <form action="{{ route('product.destroy', $item->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-outline-danger px-3">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="border-top d-md-flex justify-content-between align-items-center px-6 py-6">
                <nav>
                    {{ $data->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection


