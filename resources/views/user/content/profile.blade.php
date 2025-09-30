@extends('user.layout.app')

@section('main')
    <div class="page-title light-background">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Account</li>
                </ol>
            </nav>
            <h1>Account</h1>
        </div>
    </div><!-- End Page Title -->

    <!-- Account Section -->
    <section id="account" class="account section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <!-- Mobile Sidebar Toggle Button -->
            <div class="sidebar-toggle d-lg-none mb-3">
                <button class="btn btn-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#profileSidebar"
                    aria-expanded="false" aria-controls="profileSidebar">
                    <i class="bi bi-list me-2"></i> Profile Menu
                </button>
            </div>

            <div class="row">
                <!-- Profile Sidebar -->
                <div class="col-lg-3 profile-sidebar collapse d-lg-block" id="profileSidebar" data-aos="fade-right"
                    data-aos-delay="200">
                    <div class="profile-header">
                        <div class="profile-avatar">
                            <span>S</span>
                        </div>
                        <div class="profile-info">
                            <h4>Sarah Anderson</h4>
                            {{-- <div class="profile-bonus">
                                <i class="bi bi-gift"></i>
                                <span>100 bonuses available</span>
                            </div> --}}
                        </div>
                    </div>

                    <div class="profile-nav">
                        <ul class="nav flex-column" id="profileTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="orders-tab" data-bs-toggle="tab"
                                    data-bs-target="#orders" type="button" role="tab" aria-controls="orders"
                                    aria-selected="true">
                                    <i class="bi bi-box-seam"></i>
                                    <span>Orders</span>
                                    <span class="badge">1</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="wishlist-tab" data-bs-toggle="tab" data-bs-target="#wishlist"
                                    type="button" role="tab" aria-controls="wishlist" aria-selected="false">
                                    <i class="bi bi-heart"></i>
                                    <span>Wishlist</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment"
                                    type="button" role="tab" aria-controls="payment" aria-selected="false">
                                    <i class="bi bi-credit-card"></i>
                                    <span>Payment methods</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                                    type="button" role="tab" aria-controls="reviews" aria-selected="false">
                                    <i class="bi bi-star"></i>
                                    <span>My reviews</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal"
                                    type="button" role="tab" aria-controls="personal" aria-selected="false">
                                    <i class="bi bi-person"></i>
                                    <span>Personal info</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="addresses-tab" data-bs-toggle="tab" data-bs-target="#addresses"
                                    type="button" role="tab" aria-controls="addresses" aria-selected="false">
                                    <i class="bi bi-geo-alt"></i>
                                    <span>Addresses</span>
                                </button>
                            </li>
                        </ul>

                        <h6 class="nav-section-title">Customer service</h6>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="bi bi-question-circle"></i>
                                    <span>Help center</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="bi bi-file-text"></i>
                                    <span>Terms and conditions</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link logout">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Profile Content -->
                <div class="col-lg-9 profile-content" data-aos="fade-left" data-aos-delay="300">
                    <div class="tab-content" id="profileTabsContent">
                        <!-- Orders Tab -->
                        <div class="tab-pane fade show active" id="orders" role="tabpanel"
                            aria-labelledby="orders-tab">
                            <div class="tab-header">
                                <h2>Orders</h2>
                                <div class="tab-filters">
                                    <div class="row">
                                        <div class="col-md-6 mb-3 mb-md-0">
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle" type="button" id="statusFilter"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span>Select status</span>
                                                    <i class="bi bi-chevron-down"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="statusFilter">
                                                    <li><a class="dropdown-item" href="#">All statuses</a></li>
                                                    <li><a class="dropdown-item" href="#">In progress</a></li>
                                                    <li><a class="dropdown-item" href="#">Delivered</a></li>
                                                    <li><a class="dropdown-item" href="#">Canceled</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle" type="button" id="timeFilter"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span>For all time</span>
                                                    <i class="bi bi-chevron-down"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="timeFilter">
                                                    <li><a class="dropdown-item" href="#">For all time</a></li>
                                                    <li><a class="dropdown-item" href="#">Last 30 days</a></li>
                                                    <li><a class="dropdown-item" href="#">Last 6 months</a></li>
                                                    <li><a class="dropdown-item" href="#">Last year</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="orders-table">
                                <div class="table-header">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="sort-header">
                                                Order #
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="sort-header">
                                                Order date
                                                <i class="bi bi-arrow-down-up"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="sort-header">
                                                Status
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="sort-header">
                                                Total
                                                <i class="bi bi-arrow-down-up"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="order-items">
                                    <div class="order-item">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <div class="order-id">78A6431D409</div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="order-date">02/15/2025</div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="order-status in-progress">
                                                    <span class="status-dot"></span>
                                                    <span>In progress</span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="order-total">$2,105.90</div>
                                            </div>
                                        </div>
                                        <div class="order-products">
                                            <div class="product-thumbnails">
                                                <img src="{{ asset('assets/dist/assets/img/product/product-1.webp') }}"
                                                    alt="Product" class="product-thumb" loading="lazy">
                                                <img src="{{ asset('assets/dist/assets/img/product/product-2.webp') }}"
                                                    alt="Product" class="product-thumb" loading="lazy">
                                                <img src="{{ asset('assets/dist/assets/img/product/product-3.webp') }}"
                                                    alt="Product" class="product-thumb" loading="lazy">
                                            </div>
                                            <button type="button" class="order-details-link" data-bs-toggle="collapse"
                                                data-bs-target="#orderDetails1" aria-expanded="false"
                                                aria-controls="orderDetails1">
                                                <i class="bi bi-chevron-down"></i>
                                            </button>
                                        </div>
                                        <div class="collapse order-details" id="orderDetails1">
                                            <div class="order-details-content">
                                                <div class="order-details-header">
                                                    <h5>Order Details</h5>
                                                    <div class="order-info">
                                                        <div class="info-item">
                                                            <span class="info-label">Order Date:</span>
                                                            <span class="info-value">02/15/2025</span>
                                                        </div>
                                                        <div class="info-item">
                                                            <span class="info-label">Payment Method:</span>
                                                            <span class="info-value">Credit Card (**** 4589)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="order-items-list">
                                                    <div class="order-item-detail">
                                                        <div class="item-image">
                                                            <img src="{{ asset('assets/dist/assets/img/product/product-1.webp') }}"
                                                                alt="Product" loading="lazy">
                                                        </div>
                                                        <div class="item-info">
                                                            <h6>Lorem ipsum dolor sit amet</h6>
                                                            <div class="item-meta">
                                                                <span class="item-sku">SKU: PRD-001</span>
                                                                <span class="item-qty">Qty: 1</span>
                                                            </div>
                                                        </div>
                                                        <div class="item-price">$899.99</div>
                                                    </div>
                                                    <div class="order-item-detail">
                                                        <div class="item-image">
                                                            <img src="{{ asset('assets/dist/assets/img/product/product-2.webp') }}"
                                                                alt="Product" loading="lazy">
                                                        </div>
                                                        <div class="item-info">
                                                            <h6>Consectetur adipiscing elit</h6>
                                                            <div class="item-meta">
                                                                <span class="item-sku">SKU: PRD-002</span>
                                                                <span class="item-qty">Qty: 2</span>
                                                            </div>
                                                        </div>
                                                        <div class="item-price">$599.95</div>
                                                    </div>
                                                    <div class="order-item-detail">
                                                        <div class="item-image">
                                                            <img src="{{ asset('assets/dist/assets/img/product/product-3.webp') }}"
                                                                alt="Product" loading="lazy">
                                                        </div>
                                                        <div class="item-info">
                                                            <h6>Sed do eiusmod tempor</h6>
                                                            <div class="item-meta">
                                                                <span class="item-sku">SKU: PRD-003</span>
                                                                <span class="item-qty">Qty: 1</span>
                                                            </div>
                                                        </div>
                                                        <div class="item-price">$129.99</div>
                                                    </div>
                                                </div>
                                                <div class="order-summary">
                                                    <div class="summary-row">
                                                        <span>Subtotal:</span>
                                                        <span>$1,929.93</span>
                                                    </div>
                                                    <div class="summary-row">
                                                        <span>Shipping:</span>
                                                        <span>$15.99</span>
                                                    </div>
                                                    <div class="summary-row">
                                                        <span>Tax:</span>
                                                        <span>$159.98</span>
                                                    </div>
                                                    <div class="summary-row total">
                                                        <span>Total:</span>
                                                        <span>$2,105.90</span>
                                                    </div>
                                                </div>
                                                <div class="shipping-info">
                                                    <div class="shipping-address">
                                                        <h6>Shipping Address</h6>
                                                        <p>123 Main Street<br>Apt 4B<br>New York, NY 10001<br>United States
                                                        </p>
                                                    </div>
                                                    <div class="shipping-method">
                                                        <h6>Shipping Method</h6>
                                                        <p>Express Delivery (2-3 business days)</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pagination-container">
                                    <nav aria-label="Orders pagination">
                                        <ul class="pagination">
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <!-- Wishlist Tab -->
                        <div class="tab-pane fade" id="wishlist" role="tabpanel" aria-labelledby="wishlist-tab">
                            @yield('wishlist')
                        </div>

                        <!-- Payment Methods Tab -->
                        <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                            @yield('payment')
                        </div>

                        <!-- Reviews Tab -->
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            @yield('review')
                        </div>

                        <!-- Personal Info Tab -->
                        <div class="tab-pane fade" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                            @yield('info')
                        </div>

                        <!-- Addresses Tab -->
                        <div class="tab-pane fade" id="addresses" role="tabpanel" aria-labelledby="addresses-tab">
                            @yield('address')
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Account Section -->

< @endsection
