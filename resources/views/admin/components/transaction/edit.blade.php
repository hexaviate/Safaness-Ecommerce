@extends('admin.layout.app')
@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Transaction</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('transaction.index') }}">Transaction Table</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Transaction</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card border-top border-0 border-4 border-primary">
        <div class="card-body">
            <div class="card-title d-flex align-items-center">
                <div><i class="bx bxs-edit me-1 font-22 text-primary"></i></div>
                <h5 class="mb-0 text-primary">Edit Data Transaction</h5>
            </div>
            <hr>

            {{-- form --}}
            <form action="{{ route('transaction.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Buyer Name:</label>
                    <input class="form-control" type="text" value="{{ $data->buyer->name }}" readonly disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status: <span class="text-danger">*</span></label>
                    <select class="form-control @error('status') is-invalid @enderror" name="status" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="waiting" {{ old('status', $data->status) == 'waiting' ? 'selected' : '' }}>Waiting
                            Payment</option>
                        <option value="processing" {{ old('status', $data->status) == 'processing' ? 'selected' : '' }}>
                            Processing</option>
                        <option value="success" {{ old('status', $data->status) == 'success' ? 'selected' : '' }}>
                            Success
                        </option>
                        <option value="failed" {{ old('status', $data->status) == 'failed' ? 'selected' : '' }}>
                            Failed
                        </option>
                        <option value="shipped" {{ old('status', $data->status) == 'shipped' ? 'selected' : '' }}>
                            Shipped
                        </option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Information:</label>
                    <textarea class="form-control @error('information') is-invalid @enderror" name="information" rows="3"
                        placeholder="Masukkan informasi tambahan...">{{ old('information', $data->information) }}</textarea>
                    @error('information')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Payment Total:</label>
                    <input class="form-control" type="text"
                        value="Rp {{ number_format($data->payment_total, 0, ',', '.') }}" readonly disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Transaction Date:</label>
                    <input class="form-control" type="text" value="{{ $data->created_at->format('d M Y H:i') }}"
                        readonly disabled>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary px-5">Update</button>
                    <a href="{{ route('transaction.index') }}" class="btn btn-secondary px-5">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
