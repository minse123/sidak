@extends('layouts.app')

@php
    $roleName = strtolower(auth()->user()?->role?->role_name ?? 'user');
    $displayRole = $roleName === 'superadmin' ? 'Super Admin' : ucfirst($roleName);
@endphp

@section('page-header')
    <div class="container-fluid px-3 px-lg-4 px-xxl-5 py-4">
        <div class="bg-white border-0 shadow-sm rounded-4">
            <div
                class="px-4 px-md-5 py-4 d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-4">
                <div>
                    <small class="text-uppercase text-success fw-semibold"
                        style="letter-spacing: 0.35em;">{{ now()->format('d F Y') }}</small>
                    <h2 class="h2 fw-semibold text-dark mt-2 mb-1">Selamat datang, {{ Auth::user()->name }}</h2>
                    <p class="text-muted mb-0">Anda masuk sebagai {{ $displayRole }}.</p>
                </div>
                <div class="d-flex align-items-center gap-4">
                    <div class="text-end">
                        <p class="text-uppercase text-muted small mb-0">Status Akun</p>
                        <p class="h5 fw-semibold text-dark mb-0">Aktif</p>
                    </div>
                    <div class="d-none d-lg-flex flex-column text-end">
                        <small class="text-uppercase text-muted">ID User</small>
                        <span class="fw-semibold">#{{ str_pad(Auth::id(), 4, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <button type="button" class="btn btn-success rounded-pill px-4" disabled>Sinkronisasi Data</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid py-4" id="dashboard">
        <div class="text-uppercase text-muted small fw-semibold mb-4" style="letter-spacing: 0.4em;">
            <span class="text-success">Ringkasan</span>
            <span class="mx-2">/</span>
            <span>Pemutakhiran Data</span>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="text-muted mb-0">Total Data</p>
                            <span class="badge rounded-pill bg-info-subtle text-info">Disiapkan</span>
                        </div>
                        <p class="display-6 fw-semibold text-dark mt-3 mb-1">--</p>
                        <p class="text-muted mb-0 small">Statistik sedang dibersihkan.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="text-muted mb-0">Perlu Tindak Lanjut</p>
                            <span class="badge rounded-pill bg-warning-subtle text-warning">Menunggu</span>
                        </div>
                        <p class="display-6 fw-semibold text-dark mt-3 mb-1">--</p>
                        <p class="text-muted mb-0 small">Tidak ada data aktif saat ini.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="text-muted mb-0">Selesai Bulan Ini</p>
                            <span class="badge rounded-pill bg-success-subtle text-success">Stabil</span>
                        </div>
                        <p class="display-6 fw-semibold text-dark mt-3 mb-1">--</p>
                        <p class="text-muted mb-0 small">Menunggu data terbaru.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-1">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white border-0 pb-0">
                        <small class="text-uppercase text-success fw-semibold"
                            style="letter-spacing: 0.4em;">Aktivitas</small>
                        <h3 class="h5 fw-semibold text-dark mt-2">Belum ada catatan aktivitas</h3>
                    </div>
                    <div class="card-body">
                        <div class="border rounded-3 py-5 text-center text-muted">
                            Data aktivitas akan muncul kembali setelah proses pembersihan selesai.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body d-flex flex-column gap-3">
                        <div>
                            <small class="text-uppercase text-success fw-semibold"
                                style="letter-spacing: 0.4em;">Tindakan</small>
                            <h3 class="h5 fw-semibold text-dark mb-1">{{ $displayRole }}</h3>
                            <p class="text-muted small mb-0">Tidak ada tindakan yang perlu dilakukan.</p>
                        </div>
                        <div class="flex-grow-1 d-flex align-items-center justify-content-center">
                            <p class="text-muted text-center mb-0">Modul akan diaktifkan kembali setelah data siap.</p>
                        </div>
                        <div class="mt-auto">
                            <button class="btn btn-dark w-100 rounded-3" disabled>Lihat Seluruh Modul</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-1">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <small class="text-uppercase text-success fw-semibold"
                            style="letter-spacing: 0.4em;">Pengingat</small>
                        <ul class="list-unstyled mt-4 mb-0 text-muted">
                            <li class="mb-3">• Proses bersih-bersih data sedang berlangsung.</li>
                            <li class="mb-3">• Modul akan tersedia kembali setelah verifikasi.</li>
                            <li>• Pengguna akan diberi tahu ketika dashboard aktif.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <small class="text-uppercase text-success fw-semibold"
                            style="letter-spacing: 0.4em;">Informasi</small>
                        <p class="text-muted mt-4">Seluruh grafik, log aktivitas, dan statistik sementara dinonaktifkan
                            untuk menjaga konsistensi data. Silakan hubungi admin apabila membutuhkan akses khusus selama
                            proses ini.</p>
                        <div class="d-flex flex-column gap-2 text-muted small">
                            <span>Pengguna: {{ Auth::user()->name }}</span>
                            <span>Role: {{ $displayRole }}</span>
                            <span>ID: #{{ str_pad(Auth::id(), 4, '0', STR_PAD_LEFT) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
