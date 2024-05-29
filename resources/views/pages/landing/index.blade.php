@extends('layouts.landing.app')
@push('styles')

@endpush
@section('content')

    {{-- HERO --}}
    <section class="hero-section position-relative overflow-hidden mb-0 mb-lg-11">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <div class="hero-content my-11 my-xl-0">
                        <h1 class="fw-bolder mb-8 fs-13" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                            <span class="text-primary">Bersih</span> Bersama<span class="text-primary"> Nyaman</span> Selamanya
                            </h1>
                        <p class="fs-5 mb-5 text-dark fw-normal" data-aos="fade-up" data-aos-delay="600"data-aos-duration="1000">
                            Laporkan masalah kebersihan disekitarmu!
                        </p>
                        <div class="d-sm-flex align-items-center gap-3" data-aos="fade-up" data-aos-delay="800"
                            data-aos-duration="1000">
                  
                                {{-- <a href="https://adminmart.com/support" target="_blank"
                                    class="btn btn-outline-secondary d-block" type="button">Lapor</a> --}}
                                    @if (Auth::check())
                                        <a class="btn btn-primary fs-3 rounded btn-hover-shadow px-3 py-2"
                                            href="{{ route('dashboard') }}">Lapor</a>
                                    @else
                                        <a class="btn btn-primary fs-3 rounded btn-hover-shadow px-3 py-2"
                                            href="{{ route('login') }}">Lapor</a>
                                    @endif

                        </div>
                    </div>
                </div>
                <div class="col-xl-6 d-none d-xl-block">
                    <div class="hero-img-slide position-relative bg-light-primary p-4 rounded">
                        <div class="d-flex flex-row">
                            <div class="" style="margin-right: 3%">
                                <div class="banner-img-1 slideup">
                                    <div class="img-fluid" style="max-width: 403px; height: 100%;">
                                        <img style="width: 100%; height: 95%; object-fit: cover;" src="{{ asset('assets/landing/dist/images/hero-img/bersih-1.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="banner-img-1 slideup">
                                    <div class="img-fluid" style="max-width: 403px; height: 100%;">
                                        <img style="width: 100%; height: 95%; object-fit: cover;" src="{{ asset('assets/landing/dist/images/hero-img/kerja-bakti-1.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="banner-img-2 slideDown">
                                    <div class="img-fluid" style="max-width: 403px; height: 100%;">
                                        <img style="width: 100%; height: 95%; object-fit: cover;" src="{{ asset('assets/landing/dist/images/hero-img/bersih-2.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="banner-img-2 slideDown">
                                    <div class="img-fluid" style="max-width: 403px; height: 100%;">
                                        <img style="width: 100%; height: 95%; object-fit: cover;" src="{{ asset('assets/landing/dist/images/hero-img/bersih-2.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    {{-- LAPORAN MASALAH --}}
    <section class="news-section pt-5 pt-lg-10 pt-xl-12 pb-8 pb-lg-9">
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
                        <div class="card">
                            <img class="card-img-top" src="{{ Storage::url($d->foto) }}" alt="Card image" style="width:100%">
                            <div class="card-body">
                              <h4 class="card-title">{{ $d->judul }}</h4>
                              <p class="card-text">{{ $d->created_at }}</p>
                              <a href="#" class="btn btn-primary">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>



    {{-- FEEDBACK PELAPOR KE ADMIN --}}
    <section class="review-section pt-5 pt-lg-10 pt-xl-12 pb-8 pb-lg-9">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="fs-9 text-center mb-4 mb-lg-5 fw-bolder" data-aos="fade-up" data-aos-delay="200"
                        data-aos-duration="1000"><span class="text-primary">Terima Kasih</span> Sudah Melapor</h2>
                </div>
            </div>
            <div class="review-slider" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between mb-4">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/landing/dist/images/profile/user-1.jpg') }}" alt=""
                                            class="w-auto me-3 rounded-circle" width="40" height="40">
                                        <div>
                                            <h6 class="fs-4 mb-1 fw-semibold">Jenny Wilson</h6>
                                            <p class="mb-0 text-dark">Features avaibility</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="fs-4 mb-0 text-dark">The dashboard template from adminmart has helped me provide
                                    a clean
                                    and sleek look to my dashboard and made it look exactly the way I wanted it to, mainly
                                    without
                                    having.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between mb-4">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/landing/dist/images/profile/user-2.jpg') }}" alt=""
                                            class="w-auto me-3 rounded-circle" width="40" height="40">
                                        <div>
                                            <h6 class="fs-4 mb-1 fw-semibold">Minshan Cui</h6>
                                            <p class="mb-0 text-dark">Features avaibility</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="fs-4 text-dark mb-0">The quality of design is excellent, customizability and
                                    flexibility
                                    much better than the other products available in the market. I strongly recommend the
                                    AdminMart to
                                    other buyers.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between mb-4">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/landing/dist/images/profile/user-3.jpg') }}" alt=""
                                            class="w-auto me-3 rounded-circle" width="40" height="40">
                                        <div>
                                            <h6 class="fs-4 mb-1 fw-semibold">Eminson Mendoza</h6>
                                            <p class="mb-0 fw-normal">Features avaibility</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="fs-4 text-dark mb-0">This template is great, UI-rich and up-to-date. Although it
                                    is pretty
                                    much complete, I suggest to improve a bit of documentation. Thanks & Highly recomended!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between mb-4">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/landing/dist/images/profile/user-1.jpg') }}" alt=""
                                            class="w-auto me-3 rounded-circle" width="40" height="40">
                                        <div>
                                            <h6 class="fs-4 mb-1 fw-semibold">Jenny Wilson</h6>
                                            <p class="mb-0 text-dark">Features avaibility</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="fs-4 mb-0 text-dark">The dashboard template from adminmart has helped me provide
                                    a clean
                                    and sleek look to my dashboard and made it look exactly the way I wanted it to, mainly
                                    without
                                    having.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between mb-4">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('assets/landing/dist/images/profile/user-2.jpg') }}" alt=""
                                            class="w-auto me-3 rounded-circle" width="40" height="40">
                                        <div>
                                            <h6 class="fs-4 mb-1 fw-semibold">Minshan Cui</h6>
                                            <p class="mb-0 text-dark">Features avaibility</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="fs-4 text-dark mb-0">The quality of design is excellent, customizability and
                                    flexibility
                                    much better than the other products available in the market. I strongly recommend the
                                    AdminMart to
                                    other buyers.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    
    {{-- FITUR --}}
    <section class="features-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                        {{-- <small class="text-primary fw-bold mb-2 d-block fs-3">ALMOST COVERED EVERYTHING</small> --}}
                        <h2 class="fs-9 text-center mb-4 mb-lg-9 fw-bolder">Fitur <span class="text-primary"> Unggulan</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800"
                    data-aos-duration="1000">
                    <div class="text-center mb-5">
                        <i class="d-block ti ti-wand text-primary fs-10"></i>
                        <h5 class="fs-5 fw-semibold mt-8">Upload Foto</h5>
                        <p class="mb-0 text-dark">Foto masalah kebersihan yang sedang terjadi di lokasimu.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800"
                    data-aos-duration="1000">
                    <div class="text-center mb-5">
                        <i class="d-block ti ti-layout-sidebar text-primary fs-10"></i>
                        <h5 class="fs-5 fw-semibold mt-8">Tandai Tempat</h5>
                        <p class="mb-0 text-dark">Tentukan lokasi melalui live maps.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800"
                    data-aos-duration="1000">
                    <div class="text-center mb-5">
                        <i class="d-block ti ti-archive text-primary fs-10"></i>
                        <h5 class="fs-5 fw-semibold mt-8">Rinci</h5>
                        <p class="mb-0 text-dark">Deskripsikan masalah kebersihan secara rinci.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800"
                    data-aos-duration="1000">
                    <div class="text-center mb-5">
                        <i class="d-block ti ti-adjustments text-primary fs-10"></i>
                        <h5 class="fs-5 fw-semibold mt-8">Informatif</h5>
                        <p class="mb-0 text-dark">Dapatkan informasi laporanmu secara transparan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- LAPOR SECTION --}}
    <section class="pt-8 pt-md-5 pb-5 pb-lg-10 pb-xl-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card c2a-box" data-aos="fade-up" data-aos-delay="1600" data-aos-duration="1000">
                        <div class="card-body text-center p-4 pt-8">
                            <h3 class="fs-7 fw-semibold pt-6">Ada masalah kebersihan?</h3>
                            <p class="mb-8 pb-2 text-dark">Laporkan sekarang! ✨</p>
                            <div class="d-sm-flex align-items-center justify-content-center gap-3 mb-4">
                                {{-- <a href="https://adminmart.com/support" target="_blank"
                                    class="btn btn-outline-secondary d-block" type="button">Lapor</a> --}}
                                    @if (Auth::check())
                                        <a class="btn btn-primary fs-3 rounded btn-hover-shadow px-3 py-2"
                                            href="{{ route('dashboard') }}">Lapor</a>
                                    @else
                                        <a class="btn btn-primary fs-3 rounded btn-hover-shadow px-3 py-2"
                                            href="{{ route('login') }}">Lapor</a>
                                    @endif
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
