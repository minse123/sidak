@extends('layouts.app')

@section('main-classes', 'p-0')

@php
    $lastCreatedUser = $statistics['lastCreated'] ?? null;
    $lastCreatedName = $lastCreatedUser?->name ?? 'Belum tersedia';
    $lastCreatedTime = $lastCreatedUser?->created_at?->format('d F Y H:i') ?? '-';
@endphp

@section('page-header')
    <div class="bg-white border-bottom shadow-sm">
        <div class="container-fluid py-4 d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3">
            <div>
                <small class="text-uppercase text-success fw-semibold" style="letter-spacing: 0.35em;">Manajemen User</small>
                <h2 class="h2 fw-semibold text-dark mt-2 mb-1">Kelola akses dan peran pengguna</h2>
                <p class="text-muted mb-0">Pastikan hanya akun yang tepat yang memiliki akses ke sistem.</p>
            </div>
            <div class="text-end">
                <p class="text-uppercase text-muted small mb-0">Terakhir dibuat</p>
                <p class="h5 fw-semibold text-dark mb-0">{{ $lastCreatedName }}</p>
                <small class="text-muted">{{ $lastCreatedTime }}</small>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid py-4 px-3 px-lg-4 px-xxl-5">
        <div class="row g-4 mb-4">
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-uppercase text-muted small mb-1">Total Pengguna</p>
                        <p class="display-6 fw-semibold text-dark mb-0">{{ $statistics['total'] }}</p>
                        <small class="text-muted">Seluruh akun aktif dalam sistem.</small>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-uppercase text-muted small mb-1">Memiliki Role</p>
                        <p class="display-6 fw-semibold text-dark mb-0">{{ $statistics['withRole'] }}</p>
                        <small class="text-muted">Akun yang sudah ditetapkan perannya.</small>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <p class="text-uppercase text-muted small mb-1">Super Admin Aktif</p>
                        <p class="display-6 fw-semibold text-dark mb-0">{{ $statistics['superAdmins'] }}</p>
                        <small class="text-muted">Pengguna dengan wewenang penuh.</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3">
                <div>
                    <h3 class="h5 fw-semibold text-dark mb-1">Daftar Pengguna</h3>
                    <p class="text-muted mb-0">Ringkasan akun yang terdaftar dalam aplikasi.</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('users.create') }}" class="btn btn-success rounded-3 px-4">
                        <i class="bi bi-person-plus me-2" aria-hidden="true"></i>
                        Tambah Pengguna
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="px-4" style="width: 60px;">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col" style="width: 160px;">Role</th>
                                <th scope="col" style="width: 200px;">Dibuat</th>
                                <th scope="col" class="text-end pe-4" style="width: 220px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                @php
                                    $roleName = $user->role?->role_name ?? 'Belum ditetapkan';
                                    $isSuperAdmin = strtolower($roleName) === 'superadmin';
                                    $roleBadgeClass = $isSuperAdmin ? 'bg-success-subtle text-success' : 'bg-secondary-subtle text-secondary';
                                    $roleLabel = $isSuperAdmin ? 'Super Admin' : ucfirst($roleName);
                                @endphp
                                <tr>
                                    <td class="px-4 fw-semibold">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="fw-semibold text-dark">{{ $user->name }}</div>
                                        <small class="text-muted">ID #{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</small>
                                    </td>
                                    <td class="text-muted">
                                        <i class="bi bi-envelope me-2" aria-hidden="true"></i>{{ $user->email }}
                                    </td>
                                    <td>
                                        <span class="badge rounded-pill {{ $roleBadgeClass }}">{{ $roleLabel }}</span>
                                    </td>
                                    <td>
                                        <div class="text-dark">{{ optional($user->created_at)->format('d F Y') }}</div>
                                        <small class="text-muted">{{ optional($user->created_at)->format('H:i') }}</small>
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="d-flex justify-content-end gap-1">
                                            <a href="{{ route('users.show', $user) }}" class="btn btn-outline-secondary btn-sm rounded-circle" title="Detail">
                                                <i class="bi bi-eye" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('users.edit', $user) }}" class="btn btn-outline-primary btn-sm rounded-circle" title="Edit">
                                                <i class="bi bi-pencil" aria-hidden="true"></i>
                                            </a>
                                            <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Hapus pengguna ini?');" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-circle" title="Hapus">
                                                    <i class="bi bi-trash" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <p class="text-muted mb-1">Belum ada pengguna yang terdaftar.</p>
                                        <a href="{{ route('users.create') }}" class="btn btn-link">Tambahkan pengguna pertama</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
