@extends('layouts.dashboard.app')
@push('styles')
    <link rel="stylesheet"
        href="{{ asset('assets/dashboard/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
@endpush
@section('content')
    @can('admin-view')
        <section class="datatables">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2">
                                <h5 class="mb-0">Laporan Sampah</h5>
                            </div>
                            <p class="card-subtitle mb-3">
                                Menampilkan semua laporan sampah yang terlaporkan di <code>lingkunganbersih.id</code>
                            </p>
                            <div class="table-responsive">
                                {{ $dataTable->table() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endcan
    @can('masyarakat-view')
        <div class="row">
            <div class="col-12">
                @if (session('status'))
                    <div class="alert customize-alert alert-dismissible border-primary text-primary fade show remove-close-icon mb-4"
                        role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <div class="d-flex align-items-center font-medium me-3 me-md-0">
                            <i class="ti ti-info-circle fs-5 me-2 text-primary"></i>
                            {{ session('status') }}
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column">
                                <div class="mb-2">
                                    <h5 class="mb-0">Laporan Sampah</h5>
                                </div>
                                <p class="card-subtitle">
                                    Menampilkan semua laporan sampah yang kamu laporkan di <code>lingkunganbersih.id</code>
                                </p>
                            </div>
                            <a role="button" href="{{ route('sampah.create') }}"
                                class="btn btn-light-primary btn-circle btn-xl d-inline-flex align-items-center justify-content-center">
                                <i class="fs-7 ti ti-plus text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($datas as $data)
                <div class="col-md-6">
                    <div class="card" data-show data-id="{{ $data->id }}">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                @if (Storage::disk('public')->exists($data->foto))
                                    <img src="{{ Storage::url($data->foto) }}" class="rounded" width="100" height="100"
                                        style="object-fit: cover; object-position: center;" alt="Foto">
                                @else
                                    <img src="{{ Storage::url('placeholder/placeholder.png') }}" class="rounded" width="100"
                                        height="100" style="object-fit: cover; object-position: center;" alt="Foto">
                                @endif
                                <div class="d-flex flex-column justify-content-end text-end">
                                    <div class="mb-2">
                                        <h2 class="card-subtitle mb-0">{{ $data->judul }}</h2>
                                    </div>
                                    <div class="mb-2">
                                        <small class="mb-0">{{ $data->created_at->locale('id')->diffForHumans() }}</small>
                                    </div>
                                    <div class="mb-2">
                                        <p class="mb-0">{{ $data->status }}</p>
                                    </div>
                                    <div class="mb-0">
                                        @if ($data->is_read == '0')
                                            <span class="text-muted"><i class="ti ti-checks"></i></span>
                                        @else
                                            <span class="text-primary"><i class="ti ti-checks"></i></span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endcan
@endsection
@push('scripts')
    @can('admin-view')
        <script src="{{ asset('assets/dashboard/dist/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/dist/js/datatable/datatable-basic.init.js') }}"></script>
        {{ $dataTable->scripts() }}
    @endcan
    @can('masyarakat-view')
        <script>
            $(document).on('click', 'div[data-show]', function() {
                window.location.href = '{{ route('sampah.show', 'id') }}'.replace('id', $(this).data('id'));
            });
            $(document).on('mouseenter', 'div[data-show]', function() {
                $(this).css('cursor', 'pointer');
                $(this).animate({
                    top: "-=10px"
                }, 'fast');
            });

            $(document).on('mouseleave', 'div[data-show]', function() {
                $(this).animate({
                    top: "0px"
                }, 'fast');
            });
        </script>
    @endcan
@endpush
