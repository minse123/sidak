@extends('layouts.app')

@section('page-header')
    <div class="container-fluid px-3 px-lg-4 px-xxl-5 py-4">
        <div class="bg-white border-0 shadow-sm rounded-4">
            <div
                class="px-4 px-md-5 py-4 d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-4">
                <div>
                    <div class="text-success fw-semibold text-uppercase small mb-2" style="letter-spacing: 0.3em;">
                        Manajemen User
                    </div>
                    <h1 class="h2 fw-bold text-dark mb-2">Tambah Pengguna Baru</h1>
                    <p class="text-muted mb-0">
                        Isi formulir berikut untuk membuat akun.
                    </p>
                </div>

                <div>
                    <a href="{{ route('users.index') }}" class="btn btn-light border rounded-3 px-4 py-2">
                        <i class="bi bi-arrow-left me-2"></i>
                        Kembali ke daftar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form action="{{ route('users.store') }}" method="POST" class="d-flex flex-column gap-4">
                            @csrf

                            <div>
                                <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Masukkan nama pengguna" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="form-label fw-semibold">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="nama@email.com"
                                    required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="role_id" class="form-label fw-semibold">Role</label>
                                <select id="role_id" name="role_id"
                                    class="form-select @error('role_id') is-invalid @enderror" required>
                                    <option value="" disabled {{ old('role_id') ? '' : 'selected' }}>Pilih role
                                    </option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" @selected(old('role_id') == $role->id)>
                                            {{ ucfirst($role->role_name) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="password" class="form-label fw-semibold">Kata Sandi</label>
                                    <input type="password" id="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Minimal 8 karakter" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Kata
                                        Sandi</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control" placeholder="Ulangi kata sandi" required>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('users.index') }}" class="btn btn-light rounded-3">Batal</a>
                                <button type="submit" class="btn btn-success rounded-3 px-4">
                                    Simpan Pengguna
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
