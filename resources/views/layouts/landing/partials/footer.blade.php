<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="text-center">
                <a class="navbar-brand me-0 py-0" href="{{ route('landing') }}">
                    <h2 style="font-family: var(--bs-font-sans-serif) ;color: #50bb27; -webkit-text-stroke:1px #bef0a6;">Lingkungan Bersih</h2>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-start modernize-lp-offcanvas" tabindex="-1" id="offcanvasNavbar"aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header p-4">
        <a class="navbar-brand me-0 py-0" href="{{ route('landing') }}">
            <h2 style="font-family: var(--bs-font-sans-serif) ;color: #50bb27; -webkit-text-stroke:1px #bef0a6;">Lingkungan Bersih</h2>
        </a>
    </div>
    
    <div class="offcanvas-body p-4">
        <ul class="navbar-nav justify-content-end flex-grow-1">
            <li class="nav-item mt-3">
                <a class="nav-link fs-3" href="#laporan" style="color: #50bb27;">Laporan</a>
            </li>
            <li class="nav-item mt-3">
                <a class="nav-link fs-3" href="#feedback" style="color: #50bb27;">Feedback</a>
            </li>
            <li class="nav-item mt-3">
                <a class="nav-link fs-3" href="#fitur" style="color: #50bb27;">Fitur</a>
            </li>
            @if (Auth::check())
                <form class="d-flex mt-3" role="search">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary w-100 py-2">Dashboard</a>
                </form>
            @else
                <form class="d-flex mt-3" role="search">
                    <a href="{{ route('login') }}" class="btn btn-primary w-100 py-2">Masuk</a>
                </form>
                <form class="d-flex mt-3" role="search">
                    <a href="{{ route('register') }}" class="btn btn-primary w-100 py-2">Daftar</a>
                </form>
            @endif
        </ul>

    </div>
</div>
