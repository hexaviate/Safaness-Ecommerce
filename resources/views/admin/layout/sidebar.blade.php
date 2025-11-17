<!-- resources/views/partials/sidebar.blade.php -->

<!-- navbar vertical (Desktop) -->
<nav class="navbar-vertical-nav d-none d-xl-block">
    <div class="navbar-vertical">
        <div class="px-4 py-5">
            <a href="{{ url('/') }}" class="navbar-brand">
                <img src="{{ asset('images/safanes-logo.png') }}" alt=""  width="220"/>
            </a>
        </div>
        <div class="navbar-vertical-content flex-grow-1" data-simplebar="">
            <ul class="navbar-nav flex-column" id="sideNavbar">
                <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><i class="bi bi-house"></i></span>
                            <span class="nav-link-text">Dashboard</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('category.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('category.index') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><i class="bi bi-folder"></i></span>
                            <span class="nav-link-text">Category</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('subCategory.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('subCategory.index') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><i class="bi bi-list-task"></i></span>
                            <span class="nav-link-text">Sub Category</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('product.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('product.index') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><i class="bi bi-cart"></i></span>
                            <span class="nav-link-text">Product</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('productImage.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('productImage.index') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><i class="bi bi-image"></i></span>
                            <span class="nav-link-text">Product Images</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('transaction.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('transaction.index') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><i class="bi bi-receipt"></i></span>
                            <span class="nav-link-text">Transaction</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- navbar vertical (Mobile/Offcanvas) -->
<nav class="navbar-vertical-nav offcanvas offcanvas-start navbar-offcanvac" tabindex="-1" id="offcanvasExample">
    <div class="navbar-vertical">
        <div class="px-4 py-5 d-flex justify-content-between align-items-center">
            <a href="{{ url('/') }}" class="navbar-brand">
                <img src="{{ asset('images/safanes-logo.png') }}" alt="" width="180"/>
            </a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="navbar-vertical-content flex-grow-1" data-simplebar="">
            <ul class="navbar-nav flex-column">
                <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><i class="bi bi-house"></i></span>
                            <span>Dashboard</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('category.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('category.index') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><i class="bi bi-folder"></i></span>
                            <span>Category</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('subCategory.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('subCategory.index') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><i class="bi bi-list-task"></i></span>
                            <span>Sub Category</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('product.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('product.index') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><i class="bi bi-cart"></i></span>
                            <span>Product</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('productImage.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('productImage.index') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><i class="bi bi-image"></i></span>
                            <span>Product Images</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('transaction.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('transaction.index') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon"><i class="bi bi-receipt"></i></span>
                            <span>Transaction</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
