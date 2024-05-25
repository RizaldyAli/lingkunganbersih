<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/landing/dist/images/logos/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/dist/libs/aos/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/dist/css/style.min.css') }}">
    @stack('styles')
</head>

<body>
    <div class="page-wrapper p-0 overflow-hidden">
        <header class="header">
            @include('layouts.landing.partials.header')
        </header>
        <div class="body-wrapper overflow-hidden">
            @yield('content')
        </div>
        <footer class="footer-part pt-8 pb-5">
            @include('layouts.landing.partials.footer')
        </footer>
    </div>
    <script src="{{ asset('assets/landing/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/landing/dist/libs/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('assets/landing/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/landing/dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/landing/dist/js/custom.js') }}"></script>
    @stack('scripts')
</body>

</html>
