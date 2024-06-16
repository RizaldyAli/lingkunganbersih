@extends('layouts.dashboard.app')
@push('styles')
    <link rel="stylesheet"
        href="{{ asset('assets/dashboard/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
@endpush
@section('content')
    @include('pages.akun.admin.partials.modals')
    <section class="datatables">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-2">
                            <h2 class="fw-bolder mb-0">Akun {{ ucwords(request()->segment(1)) }}</h2>
                        </div>
                        <p class="card-subtitle mb-3">
                            Menampilkan semua akun <span class="fw-bolder">{{ ucwords(request()->segment(1)) }}</span> yang ada di <code>lingkunganbersih.id</code>
                        </p>
                        <div class="table-responsive">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{ asset('assets/dashboard/dist/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/dist/js/datatable/datatable-basic.init.js') }}"></script>
    {{ $dataTable->scripts() }}
@endpush
