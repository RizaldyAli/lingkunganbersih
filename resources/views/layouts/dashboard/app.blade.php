<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/dashboard/dist/images/logos/favicon.ico') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/dashboard/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <link id="themeColors" rel="stylesheet" href="{{ asset('assets/dashboard/dist/css/style.css') }}" />
    @stack('styles')
</head>

<body>
    <div class="preloader">
        <h2 class="lds-ripple img-fluid" style="font-family: var(--bs-font-sans-serif) ;color: #50bb27; -webkit-text-stroke:1px #bef0a6;">Lingkungan Bersih</h2>
    </div>
    <div class="page-wrapper" id="main-wrapper" data-layout="horizontal" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <header class="app-header">
            @include('layouts.dashboard.partials.header')
        </header>
        <aside class="left-sidebar">
            @include('layouts.dashboard.partials.sidebar')
        </aside>
        <div class="body-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <div class="dark-transparent sidebartoggler"></div>
    </div>

    <script src="{{ asset('assets/dashboard/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/dist/js/app.horizontal.init.js') }}"></script>
    <script src="{{ asset('assets/dashboard/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('assets/dashboard/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/dashboard/dist/js/custom.js') }}"></script>
    @stack('scripts')
</body>

</html>
