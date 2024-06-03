@extends('layouts.landing.app')
@push('styles')

@endpush
@section('content')


    {{-- LAPORAN MASALAH --}}
    <section id="laporan" class="news-section pt-5 pt-lg-10 pt-xl-12 pb-8 pb-lg-9">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="fs-9 text-center mb-4 mb-lg-5 fw-bolder" data-aos="fade-up" data-aos-delay="200"
                        data-aos-duration="1000"><span class="text-primary">Berbagai</span> Masalah yang Dilaporkan</h2>
                </div>
            </div>
            <div class="news-slider" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                <div class="owl-carousel owl-theme">
                    @foreach ($data as $d)
                    <div class="item">
                        <a href="{{ route('laporan-detail')}}">
                            <div class="card" data-id="{{ $d->id }}">
                                <img class="card-img-top" src="{{ Storage::url($d->foto) }}" alt="Card image" style="width:100%">
                                <div class="btn btn-primary" style="position: absolute; top: 8px; right: 8px;">Disetujui</div>
                                <div class="card-body">
                                  <h4 class="card-title">{{ $d->judul }}</h4>
                                  <p class="card-text">{{ $d->created_at }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <a href="{{ route('laporan-lengkap')}}">
                        <h2 class="fs-3 text-center mb-4 mb-lg-5 fw-bolder" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                            <span style="color: black">Lihat Laporan Selengkapnya</span>
                        </h2>
                    </a>
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
