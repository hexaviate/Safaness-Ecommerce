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
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Settings</button>
                <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                    <a class="dropdown-item" href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div id="invoice">
                <div class="toolbar hidden-print">
                    <div class="text-end">
                        <button type="button" class="btn btn-dark"><i class="fa fa-print"></i> Print</button>
                        <button type="button" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Export as
                            PDF</button>
                    </div>
                    <hr />
                </div>

                <h2>Detail Transaksi:</h2>
                <div class="table-responsive">
                    <table class="table table-centered table-hover text-nowrap table-borderless mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Pembeli</th>
                                <th>Status</th>
                                <th>informasi</th>
                                <th>subtotal</th>
                                <th>ongkir</th>
                                <th>total Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->buyer->username }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->information }}</td>
                                    <td>{{ $item->subtotal }}</td>
                                    <td>{{ $item->shipping_cost }}</td>
                                    <td>{{ $item->payment_total }}</td>
                                </tr>
                                <h4>Bukti Pembayaran</h4>
                                <img src="{{ asset('images/proof/' . $item->payment_proof) }}" class="img-fluid"
                                    style="max-width: 100px; max-height: 100px; object-fit: cover;">
                            @endforeach
                        </tbody>
                        @foreach ($data as $item1)
                            <form action="{{ route('validatePayment', $item1->id) }}" method="POST"
                                style="display:inline-block;">
                                @method('POST')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-success px-3">Validasi
                                    Pembayaran</button>
                            </form>
                        @endforeach
                    </table>
                </div>


                <br>
                <br>
                <br>

                <h2>Detail Produk:</h2>
                <div class="table-responsive">
                    <table class="table table-centered table-hover text-nowrap table-borderless mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
                                <th>SubCategory</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($details as $detail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $detail->cart->product->name }}</td>
                                    <td>{{ $detail->cart->product->sub_category->name }}</td>
                                    <td>{{ $detail->cart->product->price }}</td>
                                    <td>{{ $detail->cart->qty }}</td>
                                    <td>{{ $detail->cart->price_total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- <div class="invoice overflow-auto">
                <div style="min-width: 600px;">
                    <header>
                        <div class="row">
                            <div class="col">
                                <a href="javascript:;">
                                    <img src="{{ asset('assets/images/logo-icon.png') }}" width="80" alt="" />
                                </a>
                            </div>
                            <div class="col company-details">
                                <h2 class="name">
                                    <a target="_blank" href="javascript:;">
                                        Tefa Smk Salafiyah
                                    </a>
                                </h2>
                                <div>455 Foggy Heights, AZ 85004, US</div>
                                <div>(123) 456-789</div>
                                <div>company@example.com</div>
                            </div>
                        </div>
                    </header>
                    @foreach ($data as $item)
                    <main>
                        <div class="row contacts">
                            <div class="col invoice-to">
                                <div class="text-gray-light">INVOICE TO:</div>
                                <h2 class="to">{{ $item->buyer->name }}</h2>
                                <div class="address">{{ $item->buyer->address }}</div>
                                <div class="email">{{ $item->buyer->phone }}</a>
                            </div>
                            <div class="col invoice-details">
                                <h1 class="invoice-id">INVOICE{{ $item->id }}</h1>
                                <div class="date">Date of Invoice: {{ $item->created_at }}</div>
                            </div>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-left">PRODUCT</th>
                                    <th class="text-right">PRODUCT PRICE</th>
                                    <th class="text-right">QUANTITY</th>
                                    <th class="text-right">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($item->details as $detail)
                                <tr>
                                    <td class="no">{{ $loop->parent->iteration }}</td>
                                    <td class="text-left">
                                        <h3>{{ $detail->cart->product->name }}{{ $detail->cart->product->sub_category->name }}</h3>
                                    </td>
                                    <td class="unit">Rp.{{ $detail->cart->product->price }}</td>
                                    <td class="qty">{{ $detail->cart->qty }}</td>
                                    <td class="total">Rp.{{ $detail->cart->price_total }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">GRAND TOTAL</td>
                                    <td>Rp.{{ $item->payment_total }}</td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="thanks">Thank you!</div>
                        <div class="notices">
                            <div class="notice">NOTICE:</div>
                            <div>{{ $item->information }}</div>
                        </div>
                    </main>
                    @endforeach
                    <footer>Invoice was created on a computer and is valid without the signature and seal.</footer>
                </div>
                <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                <div></div>
            </div> --}}
            </div>
        </div>
    </div>
@endsection
