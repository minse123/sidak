@extends('layouts.app')

@section('content')
    <div class="bg-body-tertiary py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-xxl-7">
                    <div class="card border-0 shadow-lg overflow-hidden">
                        <div class="row g-0">
                            <div
                                class="col-lg-5 bg-primary text-white p-4 p-lg-5 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="d-flex justify-content-center mb-4">
                                        <img src="{{ asset('assets/logos/logo_pemprov.png') }}" alt="Logo Pemerintah Provinsi"
                                            class="img-fluid" style="max-height: 80px;">
                                    </div>
                                    <span
                                        class="badge bg-white text-primary fw-semibold mb-3">{{ config('app.name') }}</span>
                                    <h2 class="fw-bold mb-3">Selamat Datang Kembali</h2>
                                    <p class="text-white-50 mb-4">Masuk untuk melanjutkan pengelolaan data dan memantau
                                        aktivitas terbaru di SIDAK.</p>
                                </div>
                                <ul class="list-unstyled text-white-50 small mb-0">
                                    <li class="d-flex align-items-start gap-2 mb-2">
                                        <span
                                            class="badge rounded-pill bg-white bg-opacity-25 text-white fw-semibold">✓</span>
                                        Akses aman dan terenkripsi
                                    </li>
                                    <li class="d-flex align-items-start gap-2 mb-2">
                                        <span
                                            class="badge rounded-pill bg-white bg-opacity-25 text-white fw-semibold">✓</span>
                                        Laporan real-time yang informatif
                                    </li>
                                    <li class="d-flex align-items-start gap-2">
                                        <span
                                            class="badge rounded-pill bg-white bg-opacity-25 text-white fw-semibold">✓</span>
                                        Dukungan tim setiap saat
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-7 bg-white p-4 p-lg-5">
                                <div class="mb-4 text-center">
                                    <h3 class="fw-semibold mb-2">Masuk ke Akun Anda</h3>
                                    <p class="text-muted mb-0">Gunakan kredensial yang telah terdaftar untuk mengakses
                                        dashboard.</p>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-floating mb-3">
                                        <input id="email" type="email"
                                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" placeholder="nama@contoh.com"
                                            required autocomplete="email" autofocus>
                                        <label for="email">{{ __('Email Address') }}</label>
                                        @error('email')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-4">
                                        <input id="password" type="password"
                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                            name="password" placeholder="********" required autocomplete="current-password">
                                        <label for="password">{{ __('Password') }}</label>
                                        @error('password')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label small text-muted"
                                                for="remember">{{ __('Remember Me') }}</label>
                                        </div>
                                        <span class="text-muted small">Hubungi admin jika lupa kata sandi</span>
                                    </div>

                                    <button type="submit"
                                        class="btn btn-primary btn-lg w-100 mb-3">{{ __('Login') }}</button>

                                </form>
                            </div>
                        </div>
                    </div>
                    <p class="text-center text-muted small mt-4 mb-0">Jika mengalami kendala akses, hubungi administrator
                        untuk bantuan lebih lanjut.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
