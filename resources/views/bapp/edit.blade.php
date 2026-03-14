@extends('layouts.app')

@section('page-header')
    <div class="bg-white border-bottom shadow-sm">
        <div class="container-fluid py-4 d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3">
            <div>
                <small class="text-uppercase text-success fw-semibold" style="letter-spacing: 0.35em;">Manajemen BAPP</small>
                <h2 class="h2 fw-semibold text-dark mt-2 mb-1">Ubah Dokumen BAPP</h2>
                <p class="text-muted mb-0">Perbarui informasi pekerjaan, jadwal, dan status verifikasi.</p>
            </div>
            <a href="{{ route('bapp.index') }}" class="btn btn-outline-secondary rounded-3 px-4">
                <i class="bi bi-arrow-left me-2" aria-hidden="true"></i>
                Kembali ke daftar
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid py-4 px-3 px-lg-4 px-xxl-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form action="{{ route('bapp.update', $bapp) }}" method="POST" class="d-flex flex-column gap-4">
                            @csrf
                            @method('PUT')

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="nama_penerima" class="form-label fw-semibold">Nama Penerima</label>
                                    <input type="text" id="nama_penerima" name="nama_penerima"
                                        value="{{ old('nama_penerima', $bapp->nama_penerima) }}"
                                        class="form-control @error('nama_penerima') is-invalid @enderror" required>
                                    @error('nama_penerima')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="nik" class="form-label fw-semibold">NIK</label>
                                    <input type="text" id="nik" name="nik" value="{{ old('nik', $bapp->nik) }}"
                                        class="form-control @error('nik') is-invalid @enderror" required>
                                    @error('nik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="alamat_pekerjaan" class="form-label fw-semibold">Alamat Pekerjaan</label>
                                <textarea id="alamat_pekerjaan" name="alamat_pekerjaan" rows="3"
                                    class="form-control @error('alamat_pekerjaan') is-invalid @enderror" required>{{ old('alamat_pekerjaan', $bapp->alamat_pekerjaan) }}</textarea>
                                @error('alamat_pekerjaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="selesai_pengerjaan" class="form-label fw-semibold">Tanggal Selesai Pengerjaan</label>
                                    <input type="date" id="selesai_pengerjaan" name="selesai_pengerjaan"
                                        value="{{ old('selesai_pengerjaan', optional($bapp->selesai_pengerjaan)->format('Y-m-d')) }}"
                                        class="form-control @error('selesai_pengerjaan') is-invalid @enderror" required>
                                    @error('selesai_pengerjaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="selesai_pemeriksaan" class="form-label fw-semibold">Tanggal Selesai Pemeriksaan</label>
                                    <input type="date" id="selesai_pemeriksaan" name="selesai_pemeriksaan"
                                        value="{{ old('selesai_pemeriksaan', optional($bapp->selesai_pemeriksaan)->format('Y-m-d')) }}"
                                        class="form-control @error('selesai_pemeriksaan') is-invalid @enderror" required>
                                    @error('selesai_pemeriksaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="nama_pekerjaan" class="form-label fw-semibold">Nama Pekerjaan</label>
                                <input type="text" id="nama_pekerjaan" name="nama_pekerjaan"
                                    value="{{ old('nama_pekerjaan', $bapp->nama_pekerjaan) }}"
                                    class="form-control @error('nama_pekerjaan') is-invalid @enderror" required>
                                @error('nama_pekerjaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="detail_pekerjaan" class="form-label fw-semibold">Detail Pekerjaan</label>
                                <textarea id="detail_pekerjaan" name="detail_pekerjaan" rows="4"
                                    class="form-control @error('detail_pekerjaan') is-invalid @enderror" required>{{ old('detail_pekerjaan', $bapp->detail_pekerjaan) }}</textarea>
                                @error('detail_pekerjaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="subtotal" class="form-label fw-semibold">Subtotal Pekerjaan (Rp)</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" id="subtotal" name="subtotal"
                                            value="{{ old('subtotal', $bapp->subtotal) }}"
                                            class="form-control @error('subtotal') is-invalid @enderror"
                                            step="0.01" min="0" required>
                                    </div>
                                    @error('subtotal')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="status" class="form-label fw-semibold">Status</label>
                                    <select id="status" name="status"
                                        class="form-select @error('status') is-invalid @enderror" required
                                        {{ auth()->user()->isSuperAdmin() ? '' : 'disabled' }}>
                                        <option value="Pending"
                                            @selected(old('status', $bapp->status) === 'Pending')>Pending</option>
                                        <option value="Verifikasi"
                                            @selected(old('status', $bapp->status) === 'Verifikasi')>Verifikasi</option>
                                    </select>
                                    @if (! auth()->user()->isSuperAdmin())
                                        <input type="hidden" name="status" value="{{ $bapp->status }}">
                                    @endif
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2 pt-2">
                                <a href="{{ route('bapp.index') }}" class="btn btn-light rounded-3">Batal</a>
                                <button type="submit" class="btn btn-primary rounded-3 px-4">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
