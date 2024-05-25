@extends('layouts.auth.app')
@section('content')
    <div class="card-body">
        <div class="mb-5">
            <h2 class="fw-bolder fs-7 mb-3">Lupa Kata Sandi Kamu?</h2>
            <p class="mb-0 ">
                tolong masukkan email kamu, kami akan mengirimkan link untuk mereset kata sandi kamu.
            </p>
        </div>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-3">
                <label for="email_field" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email_field" value="{{ old('email') }}"
                    required />
                @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100 py-8 mb-3">Kirim</button>
            <a href="{{ route('login') }}" class="btn btn-light-primary text-primary w-100 py-8">Kembali ke
                Masuk</a>
        </form>
    </div>
@endsection
