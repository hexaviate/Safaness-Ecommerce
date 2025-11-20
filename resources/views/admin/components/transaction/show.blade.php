@extends('admin.layout.app')
@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Applications</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Invoice</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <!-- Menggunakan container untuk padding dan penataan yang konsisten -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <!-- Card dengan bayangan halus untuk efek kedalaman -->
                <div class="card shadow-sm">
                    <!-- Card Header untuk judul yang lebih bersih -->
                    <div class="card-header bg-white">
                        <h3 class="mb-0">Detail Transaksi</h3>
                    </div>
                    <div class="card-body">
                        <!-- Loop untuk setiap item transaksi -->
                        @foreach ($data as $item)
                            <div class="table-responsive mb-4">
                                <table class="table table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pembeli</th>
                                            <th>Status</th>
                                            <th>Informasi</th>
                                            <th class="text-end">Subtotal</th>
                                            <th class="text-end">Ongkir</th>
                                            <th class="text-end">Total Pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->buyer->username }}</td>
                                            <td>
                                                <!-- Menggunakan badge untuk status dengan warna dinamis -->
                                                <span
                                                    class="badge bg-{{ $item->status == 'validated' ? 'success' : 'warning' }} text-dark">
                                                    {{ ucfirst($item->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $item->information }}</td>
                                            <td class="text-end">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                            <td class="text-end">Rp {{ number_format($item->shipping_cost, 0, ',', '.') }}
                                            </td>
                                            <td class="text-end fw-bold">Rp
                                                {{ number_format($item->payment_total, 0, ',', '.') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Baris untuk Bukti Pembayaran dan Tombol Aksi -->
                            <div class="row">
                                <!-- Kolom untuk Bukti Pembayaran -->
                                <div class="col-md-6 mb-3">
                                    <h5 class="mb-3">Bukti Pembayaran</h5>
                                    <!-- Menggunakan img-thumbnail untuk bingkai gambar -->
                                    <img src="{{ asset('images/proof/' . $item->payment_proof) }}" class="img-thumbnail"
                                        alt="Bukti Pembayaran" style="max-width: 250px;">
                                </div>
                                <!-- Kolom untuk Tombol Aksi -->
                                <div class="col-md-6 mb-3 d-flex flex-column justify-content-center align-items-md-end">
                                    <form action="{{ route('validatePayment', $item->id) }}" method="POST"
                                        class="d-inline-block">
                                        @csrf
                                        <!-- Tombol dengan ikon (memerlukan Font Awesome atau Bootstrap Icons) -->
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-check-circle me-2"></i>Validasi Pembayaran
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- Pemisah antar transaksi jika ada lebih dari satu -->
                            @if (!$loop->last)
                                <hr class="my-4">
                            @endif
                        @endforeach

                        <hr class="my-4">

                        <h4 class="mb-3">Detail Produk</h4>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Product Name</th>
                                        <th>SubCategory</th>
                                        <th class="text-end">Harga</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-end">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $detail)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $detail->cart->product->name }}</td>
                                            <td>{{ $detail->cart->product->sub_category->name }}</td>
                                            <td class="text-end">Rp
                                                {{ number_format($detail->cart->product->price, 0, ',', '.') }}</td>
                                            <td class="text-center">{{ $detail->cart->qty }}</td>
                                            <td class="text-end fw-bold">Rp
                                                {{ number_format($detail->cart->price_total, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
