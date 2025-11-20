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
    <h6 class="mb-0 text-uppercase">Product</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            {{-- <th>Image</th> --}}
                            <th>Product Name</th>
                            <th>Slug</th>
                            <th>Sub Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                {{-- <td><img src="{{ asset('images/'.$item->product_img)}}" class="img-fluid"></td> --}}
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>{{ $item->sub_category->name }}</td>
                                <td>
                                    <form action="{{ route('productAdmin.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <div class="form-button-action">
                                            {{-- Show --}}
                                            <a href="{{ route('productAdmin.show', $item->id) }}"
                                                class="btn btn-outline-success px-5 radius-30">Detail</a>
                                            {{-- edit --}}
                                            <a href="{{ route('productAdmin.edit', $item->id) }}"
                                                class="btn btn-outline-primary px-5 radius-30">Edit</a>
                                            {{-- delete --}}
                                            <button type="submit"
                                                class="btn btn-outline-danger px-5 radius-30">Hapus</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            {{-- <th>Image</th> --}}
                            <th>Product Name</th>
                            <th>Slug</th>
                            <th>Sub Category</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
