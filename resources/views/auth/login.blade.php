@extends('layouts.auth.app')
@section('content')
    <h2 class="mb-3 fs-7 fw-bolder">lingkunganbersih.id</h2>
    <p class=" mb-9">Laporkan semua permasalahan lingkungan di sekitarmu 🫡</p>
    <div class="row">
    </div>
    <div class="position-relative text-center my-4">
        <p class="mb-0 fs-4 px-3 d-inline-block bg-white text-dark z-index-5 position-relative">
            selamat datang</p>
        <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
    </div>
    @if (session('status'))
        <div class="alert customize-alert alert-dismissible border-primary text-primary fade show remove-close-icon"
            role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <div class="d-flex align-items-center font-medium me-3 me-md-0">
                <i class="ti ti-info-circle fs-5 me-2 text-primary"></i>
                {{ session('status') }}
            </div>
        </div>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email_field" class="form-label">Email</label>
            <input name="email" value="{{ old('email') }}" type="email" class="form-control" id="email_field">
            @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password_field" class="form-label">Kata Sandi</label>
            <input name="password" type="password" class="form-control" id="password_field">
        </div>
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="form-check">
                <input name="remember" class="form-check-input primary" type="checkbox" value="1" id="remember_field"
                    checked>
                <label class="form-check-label text-dark" for="remember_field">
                    Ingat saya
                </label>
            </div>
            <a class="text-primary fw-medium" href="{{ route('password.request') }}">Lupa Kata Sandi?</a>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Masuk</button>
        <div class="d-flex align-items-center justify-content-center">
            <p class="fs-4 mb-0 fw-medium">Belum punya akun?</p>
            <a class="text-primary fw-medium ms-2" href="{{ route('register') }}">Daftar</a>
        </div>
    </form>
@endsection
