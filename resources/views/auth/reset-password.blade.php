@extends('layouts.auth.app')
@section('content')
    <div class="card-body">
        <div class="mb-5">
            <h2 class="fw-bolder fs-7 mb-3">Lupa Kata Sandi Kamu?</h2>
            <p class="mb-0 ">
                tolong masukkan email kamu, kami akan mengirimkan link untuk mereset kata sandi kamu.
            </p>
        </div>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="mb-3">
                <label for="email_field" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ request('email') }}" readonly >
                @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_field" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password_field" required autofocus />
                @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation_field" class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation_field"
                    required />
                @error('password_confirmation')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100 py-8 mb-3">Kirim</button>
            <a href="{{ route('login') }}" class="btn btn-light-primary text-primary w-100 py-8">Kembali ke
                Masuk</a>
        </form>
    </div>
@endsection
