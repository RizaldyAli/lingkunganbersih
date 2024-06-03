@extends('layouts.landing.app')
@push('styles')

@endpush
@section('content')

    @foreach ($data as $d)
    @endforeach

    <section class="container">
        <div class="row">
    
            <div class="col-12">
                <div class="card" style="margin: 3% 0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <a role="button" href="{{ route('laporan-lengkap') }}"
                                class="btn btn-light-primary btn-circle btn-xl d-inline-flex align-items-center justify-content-center">
                                <i class="fs-7 ti ti-arrow-left text-primary"></i>
                            </a>
                            <div class="d-flex align-items-end flex-column">
                                <div class="mb-2">
                                    <h5 class="mb-0">{{ $d->judul }}</h5>
                                </div>
                                <p class="card-subtitle text-end">
                                    Detail laporan {{ $d->judul }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card" style="margin: 3% 0">
                            <div class="card-body">
                                <div class="mb-2">
                                    <h5 class="mb-0">Foto</h5>
                                </div>
                                @if (Storage::disk('public')->exists($d->foto))
                                    <img src="{{ Storage::url($d->foto) }}"
                                        style="width: 100%; height: 500px; object-fit: cover; object-position: center;"
                                        class="img-fluid rounded" alt="{{ $d->judul }}">
                                @else
                                    <img src="{{ Storage::url('placeholder/placeholder.jpg') }}"
                                        style="width: 100%; height: 500px; object-fit: cover; object-position: center;"
                                        class="img-fluid rounded" alt="{{ $d->judul }}">
                                @endif
                            </div>
                        </div>
                        <div class="card" style="margin: 3% 0">
                            <div class="card-body">
                                <div class="mb-2">
                                    <h5 class="mb-0">Lokasi</h5>
                                </div>
                                <iframe class="rounded" width="100%" height="500" frameborder="0" scrolling="no"
                                    marginheight="0" marginwidth="0"
                                    src="https://maps.google.com/maps?q={{ $d->lokasi->latitude }},{{ $d->lokasi->longitude }}&hl=id&z=14&amp;output=embed">
                                </iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" style="margin: 3% 0">
                            <div class="card-body">
                                <div class="mb-2">
                                    <h5 class="mb-0">Informasi</h5>
                                </div>
                                <dl class="row mb-0">
                                    <dt class="col-sm-4 text-muted">Judul</dt>
                                    <dd class="col-sm-8">
                                        {{ $d->judul }}
                                    </dd>
                                    <dt class="col-sm-4 text-muted">Deskripsi</dt>
                                    <dd class="col-sm-8">
                                        {{ $d->deskripsi }}
                                    </dd>
                                    <dt class="col-sm-4 text-muted">Pelapor</dt>
                                    <dd class="col-sm-8">
                                        {{ $d->user->name }}
                                    </dd>
                                    @can('masyarakat-read')
                                        <dt class="col-sm-4 text-muted">Status</dt>
                                        <dd class="col-sm-8">
                                            {{ $d->status }}
                                        </dd>
                                        <dt class="col-sm-4 text-muted">Keterangan</dt>
                                        <dd class="col-sm-8">
                                            {{ $d->keterangan }}
                                        </dd>
                                    @endcan
                                </dl>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="bg-primary pt-5 pb-5">
        <div class="container">
            <div class="row justify-content-between" style="display: flex; flex-direction: column; align-items: center;">
                <div class="col-lg-7 col-xl-5 pt-lg-5 mb-5 mb-lg-0">
                    <h2 class="fs-12 text-white text-center fw-bolder mb-8">Mari, sama-sama menjaga kebersihan dengan melapor masalah kebersihan disekitarmu.</h2>
                </div>
                <div class="col-lg-5 col-xl-5">
                    <div class="text-center">
                        <img src="{{ asset('assets/landing/dist/images/backgrounds/business-woman-checking-her-mail.png') }}"alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
@push('scripts')

@endpush
