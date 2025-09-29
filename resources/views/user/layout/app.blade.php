@include('user.layout.header')

<body class="login-page">

    <header id="header" class="header position-relative">

        <!-- Main Header -->
        <div class="main-header">
           @include('user.layout.partials.head-content')
        </div>

        <!-- Navigation -->
        <div class="header-nav">
            @include('user.layout.partials.nav')
        </div>

        <!-- Mobile Search Form -->
        <div class="collapse" id="mobileSearch">
            @include('user.layout.partials.mobile-search')
        </div>

    </header>

    <main class="main">

        @yield('main')

    </main>

    <footer id="footer" class="footer light-background">
         @if (!in_array(Route::currentRouteName(), ['login', 'register']))
        @include('user.layout.footer')
    @endif
    </footer>



    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    binclux

</body>

@include('user.layout.script')

</html>
