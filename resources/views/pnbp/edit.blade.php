@extends('layouts.app')

@section('page-header')
    <div class="container-fluid px-3 px-lg-4 px-xxl-5 py-4">
        <div class="bg-white border-0 shadow-sm rounded-4">
            <div
                class="px-4 px-md-5 py-4 d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-4">
                <div>
                    <div class="text-success fw-semibold text-uppercase small mb-2" style="letter-spacing: 0.3em;">
                        Manajemen
                        PNBP
                    </div>
                    <h1 class="h2 fw-bold text-dark mb-2">Edit Data PNBP</h1>
                    <p class="text-muted mb-0">
                        Perbarui informasi transaksi PNBP yang telah tercatat.
                    </p>
                </div>

                <a href="{{ route('pnbp.index') }}" class="btn btn-outline-secondary rounded-3 px-4">
                    <i class="bi bi-arrow-left me-2" aria-hidden="true"></i>
                    Kembali ke daftar
                </a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid py-4 px-3 px-lg-4 px-xxl-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form action="{{ route('pnbp.update', $pnbp) }}" method="POST" class="d-flex flex-column gap-4">
                            @csrf
                            @method('PUT')

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="no_dokumen" class="form-label fw-semibold">No. Dokumen</label>
                                    <input type="text" id="no_dokumen" name="no_dokumen"
                                        value="{{ old('no_dokumen', $pnbp->no_dokumen) }}"
                                        class="form-control @error('no_dokumen') is-invalid @enderror"
                                        placeholder="Contoh: DOC/2026/001" required>
                                    @error('no_dokumen')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="status" class="form-label fw-semibold">Status</label>
                                    <select id="status" name="status"
                                        class="form-select @error('status') is-invalid @enderror" required>
                                        <option value="Pending" @selected(old('status', $pnbp->status) == 'Pending')>Pending</option>
                                        <option value="Verifikasi" @selected(old('status', $pnbp->status) == 'Verifikasi')>Verifikasi</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="nama_paket" class="form-label fw-semibold">Nama Paket</label>
                                <input type="text" id="nama_paket" name="nama_paket"
                                    value="{{ old('nama_paket', $pnbp->nama_paket) }}"
                                    class="form-control @error('nama_paket') is-invalid @enderror"
                                    placeholder="Masukkan nama paket" required>
                                @error('nama_paket')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="no_surat_pesanan" class="form-label fw-semibold">No. Surat Pesanan</label>
                                    <input type="text" id="no_surat_pesanan" name="no_surat_pesanan"
                                        value="{{ old('no_surat_pesanan', $pnbp->no_surat_pesanan) }}"
                                        class="form-control @error('no_surat_pesanan') is-invalid @enderror"
                                        placeholder="Masukkan nomor surat pesanan">
                                    @error('no_surat_pesanan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="no_dokumen_penerima" class="form-label fw-semibold">No. Dokumen
                                        Penerima</label>
                                    <input type="text" id="no_dokumen_penerima" name="no_dokumen_penerima"
                                        value="{{ old('no_dokumen_penerima', $pnbp->no_dokumen_penerima) }}"
                                        class="form-control @error('no_dokumen_penerima') is-invalid @enderror"
                                        placeholder="Masukkan nomor dokumen penerima">
                                    @error('no_dokumen_penerima')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="termin" class="form-label fw-semibold">Termin</label>
                                <input type="text" id="termin" name="termin"
                                    value="{{ old('termin', $pnbp->termin) }}"
                                    class="form-control @error('termin') is-invalid @enderror"
                                    placeholder="Contoh: Termin 1 / Final" required>
                                @error('termin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="nominal_tarif" class="form-label fw-semibold">Nominal Tarif (Rp)</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" id="nominal_tarif" name="nominal_tarif"
                                            value="{{ old('nominal_tarif', $pnbp->nominal_tarif) }}"
                                            class="form-control @error('nominal_tarif') is-invalid @enderror"
                                            placeholder="0" step="0.01" required>
                                    </div>
                                    @error('nominal_tarif')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="persentase_tarif" class="form-label fw-semibold">Persentase Tarif
                                        (%)</label>
                                    <div class="input-group">
                                        <input type="number" id="persentase_tarif" name="persentase_tarif"
                                            value="{{ old('persentase_tarif', $pnbp->persentase_tarif) }}"
                                            class="form-control @error('persentase_tarif') is-invalid @enderror"
                                            placeholder="0" step="0.01" min="0" max="100" required>
                                        <span class="input-group-text">%</span>
                                    </div>
                                    @error('persentase_tarif')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="bg-light p-3 rounded-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-muted small">Estimasi Total Potongan:</span>
                                    <span id="estimasi_potongan" class="fw-bold text-dark">Rp
                                        {{ number_format($pnbp->total_potongan, 0, ',', '.') }}</span>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2 pt-2">
                                <a href="{{ route('pnbp.index') }}" class="btn btn-light rounded-3">Batal</a>
                                <button type="submit" class="btn btn-success rounded-3 px-4">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nominalInput = document.getElementById('nominal_tarif');
            const persentaseInput = document.getElementById('persentase_tarif');
            const estimasiOutput = document.getElementById('estimasi_potongan');

            function calculate() {
                const nominal = parseFloat(nominalInput.value) || 0;
                const persentase = parseFloat(persentaseInput.value) || 0;
                const total = nominal * (persentase / 100);

                estimasiOutput.innerText = 'Rp ' + new Intl.NumberFormat('id-ID').format(total);
            }

            nominalInput.addEventListener('input', calculate);
            persentaseInput.addEventListener('input', calculate);
        });
    </script>
@endsection
