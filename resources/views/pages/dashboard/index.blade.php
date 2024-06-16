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
                                <h1 class="fw-bolder mb-0">Belum Verifikasi Email</h1>
                                <p class="text-muted">Silahkan <span class="fw-bolder">Verifikasi Email</span> anda terlebih
                                    dahulu untuk mengakses fitur
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
        @endif
    @endcan
    @if (auth()->user()->email_verified_at != null)
        <div class="row">
            <div class="col-lg-12 mb-4">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" data-kategori="SAMPAH" role="tab"
                            aria-selected="true" style="cursor: pointer;">
                            <i class="ti ti-trash fs-4 me-2"></i> Sampah
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" data-kategori="GOT_TERSUMBAT" role="tab"
                            aria-selected="false" tabindex="-1" style="cursor: pointer;">
                            <i class="ti ti-ripple-off fs-4 me-2"></i> Got Tersumbat
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" data-kategori="JALAN_RUSAK" role="tab"
                            aria-selected="false" tabindex="-1" style="cursor: pointer;">
                            <i class="ti ti-road"></i> Jalan Rusak
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-content-center justify-content-between">
                                    <div class="d-flex flex-column justify-content-center text-start">
                                        <h1 class="fw-semibold fs-3 mb-1" id="total_disetujui">0</h1>
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
                                        <h1 class="fw-semibold fs-3 mb-1" id="total_dikirim">0</h1>
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
                                        <h1 class="fw-semibold fs-3 mb-1" id="total_ditolak">0</h1>
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
            <div class="col-lg-8 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div id="laporan_chart"></div>
                        <div class="d-flex flex-column text-end">
                            <h1 class="mb-0" id="total_laporan_text">0 Laporan</h1>
                            <p class="text-muted">yang terlapor di <code>lingkunganbersih.id</code></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
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
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-4">
                                        <input type="text" name="name" class="form-control" placeholder="Nama"
                                            value="{{ auth()->user()->name }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-4">
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            value="{{ auth()->user()->email }}">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-4">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Password">
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-4">
                                        <input type="password" name="password_confirmation" class="form-control"
                                            placeholder="Konfirmasi Password">
                                        @error('password_confirmation')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 disabled">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
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
            });
        </script>
    @endcan
    <script>
        let name = '';
        let email = '';
        let password = '';
        let password_confirmation = '';
        let chartLaporan;

        function getLaporan(kategori) {
            $.ajax({
                url: "/dashboard/" + kategori,
                type: 'GET',
                success: function(response) {
                    const total_laporan = response.total_laporan;
                    const total_dikirim = parseInt(response.total_dikirim, 10);
                    const total_disetujui = parseInt(response.total_disetujui, 10);
                    const total_ditolak = parseInt(response.total_ditolak, 10);

                    $('#total_laporan_text').text(total_laporan + " Laporan");

                    $('#total_disetujui').text(total_disetujui);
                    $('#total_dikirim').text(total_dikirim);
                    $('#total_ditolak').text(total_ditolak);

                    const seriesData = [total_disetujui, total_dikirim, total_ditolak];

                    const hasData = seriesData.some(value => value > 0);

                    const optionsLaporan = {
                        chart: {
                            type: 'donut',
                            width: 200,
                            fontFamily: "Plus Jakarta Sans', sans-serif",
                            foreColor: "#adb0bb",
                        },
                        series: hasData ? seriesData : [1],
                        labels: hasData ? ['Laporan Disetujui', 'Laporan Dikirim', 'Laporan Ditolak'] : [
                            'No Data'
                        ],
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
                        colors: hasData ? ["var(--bs-success)", "var(--bs-warning)", "var(--bs-danger)"] : [
                            "#adb0bb"
                        ],
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
                        }],
                    };

                    if (chartLaporan) {
                        chartLaporan.destroy();
                    }

                    chartLaporan = new ApexCharts($('#laporan_chart')[0], optionsLaporan);
                    chartLaporan.render();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        $(document).ready(function() {
            name = $('input[name="name"]').val();
            email = $('input[name="email"]').val();
            password = $('input[name="password"]').val();
            password_confirmation = $('input[name="password_confirmation"]').val();

            getLaporan('SAMPAH');
        });

        $(document).on('click', 'a.nav-link', function() {
            const kategori = $(this).data('kategori');
            getLaporan(kategori);
        });

        $(document).on('input', 'input', function() {
            if (name != $('input[name="name"]').val() || email != $('input[name="email"]').val() || password != $(
                    'input[name="password"]').val() || password_confirmation != $(
                    'input[name="password_confirmation"]').val()) {
                $('button[type="submit"]').removeClass('disabled');
            } else {
                $('button[type="submit"]').addClass('disabled');
            }
        });
    </script>
@endpush
