@extends('layouts.app')

@section('page-header')
    <div class="bg-white border-bottom shadow-sm">
        <div class="container-fluid py-4 d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3">
            <div>
                <small class="text-uppercase text-success fw-semibold" style="letter-spacing: 0.35em;">Profil User</small>
                <h2 class="h2 fw-semibold text-dark mt-2 mb-1">{{ $user->name }}</h2>
                <p class="text-muted mb-0">Detail akun dan riwayat akses pengguna.</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('users.edit', $user) }}" class="btn btn-primary rounded-3 px-4">
                    <i class="bi bi-pencil-square me-2" aria-hidden="true"></i>
                    Ubah Data
                </a>
                <a href="{{ route('users.index') }}" class="btn btn-outline-secondary rounded-3 px-4">
                    Kembali
                </a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="mb-4">
                            <p class="text-uppercase text-muted small mb-1">Informasi Dasar</p>
                            <h3 class="h5 fw-semibold text-dark mb-0">{{ $user->name }}</h3>
                            <small class="text-muted">ID #{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</small>
                        </div>

                        <dl class="row mb-0">
                            <dt class="col-md-4 text-muted">Email</dt>
                            <dd class="col-md-8 text-dark fw-semibold">{{ $user->email }}</dd>

                            <dt class="col-md-4 text-muted">Role</dt>
                            <dd class="col-md-8">
                                @php
                                    $roleName = $user->role?->role_name ? ucfirst($user->role->role_name) : 'Belum ditetapkan';
                                    $isSuperAdmin = strtolower($user->role?->role_name ?? '') === 'superadmin';
                                @endphp
                                <span class="badge rounded-pill {{ $isSuperAdmin ? 'bg-success-subtle text-success' : 'bg-secondary-subtle text-secondary' }}">
                                    {{ $roleName }}
                                </span>
                            </dd>

                            <dt class="col-md-4 text-muted">Dibuat</dt>
                            <dd class="col-md-8 text-dark">{{ optional($user->created_at)->translatedFormat('d F Y H:i') }}</dd>

                            <dt class="col-md-4 text-muted">Terakhir diperbarui</dt>
                            <dd class="col-md-8 text-dark">{{ optional($user->updated_at)->translatedFormat('d F Y H:i') }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4 d-flex flex-column">
                        <p class="text-uppercase text-muted small mb-2">Tindakan</p>
                        <p class="text-muted mb-4">Gunakan tombol berikut untuk mengelola akun.</p>
                        <div class="d-flex flex-column gap-2">
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-outline-primary rounded-3">
                                Edit Informasi
                            </a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST"
                                onsubmit="return confirm('Hapus pengguna ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger rounded-3 w-100" {{ auth()->id() === $user->id ? 'disabled' : '' }}>
                                    Hapus Pengguna
                                </button>
                            </form>
                        </div>
                        <div class="mt-auto pt-4">
                            <small class="text-muted">Terakhir login: data belum tersedia.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
