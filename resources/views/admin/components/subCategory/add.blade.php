@extends('admin.admin')
@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Sub Category</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item" aria-current="page">Sub Category Table</li>
                <li class="breadcrumb-item active" aria-current="page">Sub Data Category</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<div class="card border-top border-0 border-4 border-primary">
    <div class="card-body">
        <div class="card-title d-flex align-items-center">
            <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
            </div>
            <h5 class="mb-0 text-primary">Tambah Data Sub Catgeory</h5>
        </div>
        <hr>

        {{-- form --}}
        <form action="{{ route('subCategory.store')}}" method="POST">
            @csrf
            <div class=" mb-3">
                <label class="form-label">Name:</label>
                <input class="form-control mb-3" type="text" placeholder="name"
                    aria-label="default input example" name="name">
            </div>
            <div class=" mb-3">
                <label class="form-label">Category:</label>
                <select class="form-control mb-3" aria-label="Default select example" name="category_id">
                    @foreach ($data as $item)

                    <option value="{{$item->id}}">{{$item->name}}</option>

                    @endforeach
                </select>
            </div>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary px-5">Create</button>

    </div>
    </form>


</div>
</div>
@endsection
