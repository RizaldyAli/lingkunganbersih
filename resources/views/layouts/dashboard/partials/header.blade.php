<nav class="navbar navbar-expand-xl navbar-light container-fluid px-0">
    <ul class="navbar-nav">
        <li class="nav-item d-block d-xl-none">
            <a class="nav-link sidebartoggler ms-n3" id="sidebarCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
            </a>
        </li>
        <li class="nav-item d-none d-xl-block">
            <a class="navbar-brand me-0 py-0" href="{{ route('landing') }}">
                <h2 style="font-family: var(--bs-font-sans-serif) ;color: #50bb27; -webkit-text-stroke:1px #bef0a6;">Lingkungan Bersih</h2>
            </a>
        </li>
    </ul>
    <div class="d-block d-xl-none">
        <a class="navbar-brand me-0 py-0" href="{{ route('landing') }}">
            <h2 style="font-family: var(--bs-font-sans-serif) ;color: #50bb27; -webkit-text-stroke:1px #bef0a6;">Lingkungan Bersih</h2>
        </a>
    </div>
    <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="p-2">
            <i class="ti ti-dots fs-7"></i>
        </span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                <li class="nav-item dropdown">
                    <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <div class="user-profile-img">
                                <img src="{{ asset('assets/dashboard/dist/images/profile/user-1.jpg') }}"
                                    class="rounded-circle" width="35" height="35" alt="" />
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                        aria-labelledby="drop1">
                        <div class="profile-dropdown position-relative" data-simplebar>
                            <div class="py-3 px-7 pb-0">
                                <h5 class="mb-0 fs-5 fw-semibold">Akun</h5>
                            </div>
                            <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                <img src="{{ asset('assets/dashboard/dist/images/profile/user-1.jpg') }}"
                                    class="rounded-circle" width="80" height="80" alt="" />
                                <div class="ms-3">
                                    <h5 class="mb-1 fs-3">{{ auth()->user()->name }}</h5>
                                    <span class="mb-1 d-block text-dark">{{ auth()->user()->roles->first()->name }}</span>
                                    <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                        <i class="ti ti-mail fs-4"></i> {{ auth()->user()->email }}
                                    </p>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('logout') }}" class="d-grid py-4 px-7 pt-8">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary">Keluar</button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
