<nav class="navbar navbar-expand-lg py-0">
    <div class="container">
        <a class="navbar-brand me-0 py-0" href="{{ route('landing') }}">
            <h2 style="font-family: var(--bs-font-sans-serif) ;color: #50bb27; -webkit-text-stroke:1px #bef0a6;">Lingkungan Bersih</h2>
        </a>

        <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <i class="ti ti-menu-2 fs-9"></i>
        </button>

        <button class="navbar-toggler border-0 p-0 shadow-none" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <i class="ti ti-menu-2 fs-9"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav align-items-center mb-2 mb-lg-0 ms-auto">
                <li>
                    <a class="nav-link nav-item" href="#laporan" style="color: #50bb27;">Laporan</a>
                </li>
                <li>
                    <a class="nav-link nav-item" href="#feedback" style="color: #50bb27;">Feedback</a>
                </li>
                <li>
                    <a class="nav-link nav-item" href="#fitur" style="color: #50bb27;">Fitur</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item ms-2">
                        <a class="btn btn-primary fs-3 rounded btn-hover-shadow px-3 py-2"
                            href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                @else
                    <li class="nav-item ms-2">
                        <a class="btn btn-primary fs-3 rounded btn-hover-shadow px-3 py-2"
                            href="{{ route('login') }}">Masuk</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn fs-3 rounded btn-hover-shadow px-3 py-2" style="border: #50bb27 1px solid; color:#50bb27;"
                            href="{{ route('register') }}">Daftar</a>
                    </li>
                @endif
            </ul>
        </div>

    </div>
</nav>
