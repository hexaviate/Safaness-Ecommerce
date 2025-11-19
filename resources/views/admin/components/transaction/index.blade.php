@extends('admin.layout.app')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Transaction</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Orders</li>
                </ol>
            </nav>
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
                            <form class="d-flex" role="search">
                                <input class="form-control" type="search" placeholder="Search Orders"
                                    aria-label="Search" />
                            </form>
                        </div>
                        <!-- select option -->
                        <div class="col-xl-2 col-md-4 col-12">
                            <select class="form-select">
                                <option selected>All Status</option>
                                <option value="success">Success</option>
                                <option value="pending">Pending</option>
                                <option value="failed">Failed</option>
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
                                    <th>Buyer Name</th>
                                    <th>Status</th>
                                    <th>Information</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->buyer->username }}</td>
                                        <td>
                                            @if ($item->status == 'success')
                                                <span class="badge bg-success">Success</span>
                                            @elseif ($item->status == 'waiting')
                                                <span class="badge bg-light text-dark">Waiting Payment</span>
                                            @elseif ($item->status == 'failed')
                                                <span class="badge bg-danger">Failed</span>
                                            @elseif ($item->status == 'processing')
                                                <span class="badge bg-warning">Processed</span>
                                            @elseif ($item->status == 'shipping')
                                                <span class="badge bg-info">On Delivery</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->information }}</td>
                                        <td>Rp {{ number_format($item->payment_total, 0, ',', '.') }}</td>
                                        <td>{{ $item->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('transaction.show', $item->id) }}"
                                                class="btn btn-sm btn-outline-info px-3">Detail</a>
                                            <a href="{{ route('transaction.edit', $item->id) }}"
                                                class="btn btn-sm btn-outline-primary px-3">Edit</a>
                                            <form action="{{ route('transaction.destroy', $item->id) }}" method="POST"
                                                style="display:inline-block;"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?');">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="btn btn-sm btn-outline-danger px-3">Hapus</button>
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
