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
    <link id="themeColors" rel="stylesheet" href="{{ asset('assets/dashboard/dist/css/style.min.css') }}" />
</head>

<body>
    <div class="preloader">
        <img src="{{ asset('assets/dashboard/dist/images/logos/favicon.ico') }}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <div class="preloader">
        <img src="{{ asset('assets/dashboard/dist/images/logos/favicon.ico') }}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100">
            <div class="position-relative z-index-5">
                <div class="row">
                    <div class="col-xl-7 col-xxl-8">
                        <a href="{{ route('landing') }}" class="text-nowrap logo-img d-block px-4 py-9 w-100">
                            <img src="{{ asset('assets/dashboard/dist/images/logos/dark-logo.svg') }}" width="180"
                                alt="">
                        </a>
                        <div class="d-none d-xl-flex align-items-center justify-content-center"
                            style="height: calc(100vh - 80px);">
                            <img src="{{ asset('assets/dashboard/dist/images/backgrounds/login-security.svg') }}"
                                alt="" class="img-fluid" width="500">
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-4">
                        <div
                            class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                            <div class="col-sm-8 col-md-6 col-xl-9">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('assets/dashboard/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/dist/js/app.init.js') }}"></script>
    <script src="{{ asset('assets/dashboard/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('assets/dashboard/dist/js/sidebarmenu.js') }}"></script>

    <script src="{{ asset('assets/dashboard/dist/js/custom.js') }}"></script>
</body>

</html>
