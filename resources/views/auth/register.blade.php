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
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <label for="name_field" class="form-label">Nama</label>
            <input name="name" value="{{ old('name') }}" type="text" class="form-control" id="name_field">
        </div>
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
            @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password_confirmation_field" class="form-label">Konfirmasi Kata Sandi</label>
            <input name="password_confirmation" type="password" class="form-control" id="password_confirmation_field">
        </div>
        <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Daftar</button>
        <div class="d-flex align-items-center justify-content-center">
            <p class="fs-4 mb-0 fw-medium">Sudah punya akun?</p>
            <a class="text-primary fw-medium ms-2" href="{{ route('login') }}">Masuk</a>
        </div>
    </form>
@endsection
