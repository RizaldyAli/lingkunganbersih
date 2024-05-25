@extends('layouts.dashboard.app')
@push('styles')
@endpush
@section('content')
    @can('admin-view')
        <div class="row">
            <div class="col-lg-8 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column text-start">
                            <h1 class="mb-0">{{ $data->total_user }} Akun</h1>
                            <p class="text-muted">yang terdaftar di <code>lingkunganbersih.id</code></p>
                        </div>
                        <div id="akun_chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-content-center justify-content-between">
                                    <span
                                        class="bg-light-primary rounded-circle p-2 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-crown fs-8 text-primary"></i>
                                    </span>
                                    <div class="d-flex flex-column justify-content-center text-end">
                                        <h1 class="fw-semibold fs-3 mb-1">{{ $data->total_admin }}</h1>
                                        <p class="text-muted mb-0">Akun Admin</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-content-center justify-content-between">
                                    <span
                                        class="bg-light-secondary rounded-circle p-2 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-chess-knight fs-8 text-secondary"></i>
                                    </span>
                                    <div class="d-flex flex-column justify-content-center text-end">
                                        <h1 class="fw-semibold fs-3 mb-1">{{ $data->total_masyarakat }}</h1>
                                        <p class="text-muted mb-0">Akun Masyarakat</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-content-center justify-content-between">
                                    <div class="d-flex flex-column justify-content-center text-start">
                                        <h1 class="fw-semibold fs-3 mb-1">{{ $data->total_disetujui }}</h1>
                                        <p class="text-muted mb-0">Laporan Disetujui</p>
                                    </div>
                                    <span
                                        class="bg-light-success rounded-circle p-2 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-circle-check fs-8 text-success"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-content-center justify-content-between">
                                    <div class="d-flex flex-column justify-content-center text-start">
                                        <h1 class="fw-semibold fs-3 mb-1">{{ $data->total_dikirim }}</h1>
                                        <p class="text-muted mb-0">Laporan Dikirim</p>
                                    </div>
                                    <span
                                        class="bg-light-warning rounded-circle p-2 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-send fs-8 text-warning"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-content-center justify-content-between">
                                    <div class="d-flex flex-column justify-content-center text-start">
                                        <h1 class="fw-semibold fs-3 mb-1">{{ $data->total_ditolak }}</h1>
                                        <p class="text-muted mb-0">Laporan Ditolak</p>
                                    </div>
                                    <span
                                        class="bg-light-danger rounded-circle p-2 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-ban fs-8 text-danger"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div id="laporan_chart"></div>
                        <div class="d-flex flex-column text-end">
                            <h1 class="mb-0">{{ $data->total_laporan }} Laporan</h1>
                            <p class="text-muted">yang terlapor di <code>lingkunganbersih.id</code></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan
    @can('masyarakat-view')
        @if (auth()->user()->email_verified_at == null)
            <div class="row">
                <div class="col-lg-12 d-flex align-items-strech">
                    @if (session('status'))
                        <div class="alert w-100 customize-alert alert-dismissible border-primary text-primary fade show remove-close-icon mb-4"
                            role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <div class="d-flex align-items-center font-medium me-3 me-md-0">
                                <i class="ti ti-info-circle fs-5 me-2 text-primary"></i>
                                {{ session('status') }}
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-12 d-flex align-items-strech">
                    <div class="card w-100">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex flex-column text-start">
                                <h1 class="mb-0">Belum Verifikasi Email</h1>
                                <p class="text-muted">Silahkan verifikasi email anda terlebih dahulu untuk mengakses fitur
                                    <code>lingkunganbersih.id</code>
                                </p>
                            </div>
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <button type="submit" class="btn btn-primary">Verifikasi Email</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-lg-8 d-flex align-items-strech">
                    <div class="card w-100">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div class="d-flex flex-column text-start">
                                <h1 class="mb-0">{{ $data->total_laporan }} Laporan</h1>
                                <p class="text-muted">yang terlapor di <code>lingkunganbersih.id</code></p>
                            </div>
                            <div id="laporan_chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-content-center justify-content-between">
                                        <span
                                            class="bg-light-success rounded-circle p-2 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle-check fs-8 text-success"></i>
                                        </span>
                                        <div class="d-flex flex-column justify-content-center text-end">
                                            <h1 class="fw-semibold fs-3 mb-1">{{ $data->total_disetujui }}</h1>
                                            <p class="text-muted mb-0">Laporan Disetujui</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-content-center justify-content-between">
                                        <span
                                            class="bg-light-warning rounded-circle p-2 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-send fs-8 text-warning"></i>
                                        </span>
                                        <div class="d-flex flex-column justify-content-center text-end">
                                            <h1 class="fw-semibold fs-3 mb-1">{{ $data->total_dikirim }}</h1>
                                            <p class="text-muted mb-0">Laporan Dikirim</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-content-center justify-content-between">
                                        <span
                                            class="bg-light-danger rounded-circle p-2 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-ban fs-8 text-danger"></i>
                                        </span>
                                        <div class="d-flex flex-column justify-content-center text-end">
                                            <h1 class="fw-semibold fs-3 mb-1">{{ $data->total_ditolak }}</h1>
                                            <p class="text-muted mb-0">Laporan Ditolak</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endcan
@endsection
@push('scripts')
    <script src="{{ asset('assets/dashboard/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    @can('admin-view')
        <script>
            $(document).ready(function() {
                const total_admin = {{ $data->total_admin }};
                const total_masyarakat = {{ $data->total_masyarakat }};

                const optionsAkun = {
                    chart: {
                        type: 'donut',
                        width: 200,
                        fontFamily: "Plus Jakarta Sans', sans-serif",
                        foreColor: "#adb0bb",
                    },
                    series: [total_admin, total_masyarakat],
                    labels: ['Akun Admin', 'Akun Masyarakat'],
                    plotOptions: {
                        pie: {
                            startAngle: 0,
                            endAngle: 360,
                            donut: {
                                size: '75%',
                            },
                        },
                    },
                    stroke: {
                        show: false,
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {
                        show: false,
                    },
                    colors: ["var(--bs-primary)", "var(--bs-secondary)"],
                    tooltip: {
                        theme: "dark",
                        fillSeriesColor: false,
                    },
                    responsive: [{
                        breakpoint: 991,
                        options: {
                            chart: {
                                width: 120,
                            },
                        },
                    }, ],
                };

                const chartAkun = new ApexCharts($('#akun_chart')[0], optionsAkun);
                chartAkun.render();

                const total_dikirim = {{ $data->total_dikirim }};
                const total_disetujui = {{ $data->total_disetujui }};
                const total_ditolak = {{ $data->total_ditolak }};

                const optionsLaporan = {
                    chart: {
                        type: 'donut',
                        width: 200,
                        fontFamily: "Plus Jakarta Sans', sans-serif",
                        foreColor: "#adb0bb",
                    },
                    series: [total_disetujui, total_dikirim, total_ditolak],
                    labels: ['Laporan Disetujui', 'Laporan Dikirim', 'Laporan Ditolak'],
                    plotOptions: {
                        pie: {
                            startAngle: 0,
                            endAngle: 360,
                            donut: {
                                size: '75%',
                            },
                        },
                    },
                    stroke: {
                        show: false,
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {
                        show: false,
                    },
                    colors: ["var(--bs-success)", "var(--bs-warning)", "var(--bs-danger)"],
                    tooltip: {
                        theme: "dark",
                        fillSeriesColor: false,
                    },
                    responsive: [{
                        breakpoint: 991,
                        options: {
                            chart: {
                                width: 120,
                            },
                        },
                    }, ],
                };

                const chartLaporan = new ApexCharts($('#laporan_chart')[0], optionsLaporan);
                chartLaporan.render();
            });
        </script>
    @endcan
    @can('masyarakat-view')
        <script>
            $(document).ready(function() {
                const total_dikirim = {{ $data->total_dikirim }};
                const total_disetujui = {{ $data->total_disetujui }};
                const total_ditolak = {{ $data->total_ditolak }};

                const optionsLaporan = {
                    chart: {
                        type: 'donut',
                        width: 200,
                        fontFamily: "Plus Jakarta Sans', sans-serif",
                        foreColor: "#adb0bb",
                    },
                    series: [total_disetujui, total_dikirim, total_ditolak],
                    labels: ['Laporan Disetujui', 'Laporan Dikirim', 'Laporan Ditolak'],
                    plotOptions: {
                        pie: {
                            startAngle: 0,
                            endAngle: 360,
                            donut: {
                                size: '75%',
                            },
                        },
                    },
                    stroke: {
                        show: false,
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {
                        show: false,
                    },
                    colors: ["var(--bs-success)", "var(--bs-warning)", "var(--bs-danger)"],
                    tooltip: {
                        theme: "dark",
                        fillSeriesColor: false,
                    },
                    responsive: [{
                        breakpoint: 991,
                        options: {
                            chart: {
                                width: 120,
                            },
                        },
                    }, ],
                };

                const chartLaporan = new ApexCharts($('#laporan_chart')[0], optionsLaporan);
                chartLaporan.render();
            });
        </script>
    @endcan
@endpush
