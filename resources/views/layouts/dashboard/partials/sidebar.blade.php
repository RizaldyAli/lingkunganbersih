<div>
    <nav class="sidebar-nav scroll-sidebar container-fluid">
        <ul id="sidebarnav">
            <li class="sidebar-item">
                <a class="sidebar-link sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                    <span class="rounded-3">
                        <i class="ti ti-layout-dashboard"></i>
                    </span>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>
            @can('admin-view')
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <span>
                            <i class="ti ti-user"></i>
                        </span>
                        <span class="hide-menu">Akun</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('admin.index') }}" class="sidebar-link">
                                <i class="ti ti-crown"></i>
                                <span class="hide-menu">Admin</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('masyarakat.index') }}" class="sidebar-link">
                                <i class="ti ti-chess-knight"></i>
                                <span class="hide-menu">Masyarakat</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <span>
                            <i class="ti ti-radar"></i>
                        </span>
                        <span class="hide-menu">Laporan</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('sampah.index') }}" class="sidebar-link">
                                <i class="ti ti-trash"></i>
                                <span class="hide-menu">Sampah</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan
            @can('masyarakat-view')
                @if (auth()->user()->email_verified_at != null)
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <span>
                                <i class="ti ti-radar"></i>
                            </span>
                            <span class="hide-menu">Laporan</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('sampah.index') }}" class="sidebar-link">
                                    <i class="ti ti-trash"></i>
                                    <span class="hide-menu">Sampah</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            @endcan
        </ul>
    </nav>
</div>
