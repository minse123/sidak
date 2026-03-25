@extends('layouts.app')

@section('page-header')
    <div class="container-fluid px-3 px-lg-4 px-xxl-5 py-4">
        <div class="bg-white border-0 shadow-sm rounded-4">
            <div
                class="px-4 px-md-5 py-4 d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-4">
                <div>
                    <div class="text-success fw-semibold text-uppercase small mb-2" style="letter-spacing: 0.3em;">
                        Manajemen Surat Pesanan
                    </div>
                    <h1 class="h2 fw-bold text-dark mb-2">Tambah Data Surat Pesanan</h1>
                    <p class="text-muted mb-0">
                        Isi formulir berikut untuk menambahkan item surat pesanan baru.
                    </p>
                </div>

                <div>
                    <a href="{{ route('surat-pesanan.index') }}" class="btn btn-light border rounded-3 px-4 py-2">
                        <i class="bi bi-arrow-left me-2"></i>
                        Kembali ke daftar
                    </a>
                </div>
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
                        <form action="{{ route('surat-pesanan.store') }}" method="POST" class="d-flex flex-column gap-4">
                            @csrf

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="no_surat_pesanan" class="form-label fw-semibold">No Surat Pesanan</label>
                                    <input type="number" id="no_surat_pesanan" name="no_surat_pesanan"
                                        value="{{ old('no_surat_pesanan') }}"
                                        class="form-control @error('no_surat_pesanan') is-invalid @enderror"
                                        placeholder="Masukkan ID surat pesanan" min="1" required>
                                    @error('no_surat_pesanan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="nama_produk" class="form-label fw-semibold">Nama Produk</label>
                                    <input type="text" id="nama_produk" name="nama_produk"
                                        value="{{ old('nama_produk') }}"
                                        class="form-control @error('nama_produk') is-invalid @enderror"
                                        placeholder="Masukkan nama produk" required>
                                    @error('nama_produk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="jenis_produk" class="form-label fw-semibold">Jenis Produk</label>
                                    <input type="text" id="jenis_produk" name="jenis_produk"
                                        value="{{ old('jenis_produk') }}"
                                        class="form-control @error('jenis_produk') is-invalid @enderror"
                                        placeholder="Masukkan jenis produk" required>
                                    @error('jenis_produk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="kategori" class="form-label fw-semibold">Kategori</label>
                                    <input type="text" id="kategori" name="kategori" value="{{ old('kategori') }}"
                                        class="form-control @error('kategori') is-invalid @enderror"
                                        placeholder="Masukkan kategori" required>
                                    @error('kategori')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="durasi_bulan" class="form-label fw-semibold">Durasi (Bulan)</label>
                                    <input type="number" id="durasi_bulan" name="durasi_bulan"
                                        value="{{ old('durasi_bulan') }}"
                                        class="form-control @error('durasi_bulan') is-invalid @enderror" placeholder="0"
                                        min="1" required>
                                    @error('durasi_bulan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="variasi" class="form-label fw-semibold">Variasi</label>
                                    <input type="text" id="variasi" name="variasi" value="{{ old('variasi') }}"
                                        class="form-control @error('variasi') is-invalid @enderror"
                                        placeholder="Masukkan variasi produk" required>
                                    @error('variasi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="harga" class="form-label fw-semibold">Harga (Rp)</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="number" id="harga" name="harga" value="{{ old('harga') }}"
                                            class="form-control @error('harga') is-invalid @enderror" placeholder="0"
                                            step="0.01" min="0" required>
                                    </div>
                                    @error('harga')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="jumlah" class="form-label fw-semibold">Jumlah</label>
                                    <input type="number" id="jumlah" name="jumlah" value="{{ old('jumlah') }}"
                                        class="form-control @error('jumlah') is-invalid @enderror" placeholder="0"
                                        min="1" required>
                                    @error('jumlah')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label for="bebas_ppn" class="form-label fw-semibold">Status PPN</label>
                                    <select id="bebas_ppn" name="bebas_ppn"
                                        class="form-select @error('bebas_ppn') is-invalid @enderror" required>
                                        <option value="0" @selected(old('bebas_ppn', '0') == '0')>Kena PPN</option>
                                        <option value="1" @selected(old('bebas_ppn') == '1')>Bebas PPN</option>
                                    </select>
                                    @error('bebas_ppn')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="url_produk" class="form-label fw-semibold">URL Produk</label>
                                    <input type="url" id="url_produk" name="url_produk"
                                        value="{{ old('url_produk') }}"
                                        class="form-control @error('url_produk') is-invalid @enderror"
                                        placeholder="https://contoh.com/produk">
                                    @error('url_produk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="bg-light p-3 rounded-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-muted small">Estimasi Total Nilai:</span>
                                    <span id="estimasi_total" class="fw-bold text-dark">Rp 0</span>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2 pt-2">
                                <a href="{{ route('surat-pesanan.index') }}" class="btn btn-light rounded-3">Batal</a>
                                <button type="submit" class="btn btn-success rounded-3 px-4">
                                    Simpan Data Surat Pesanan
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
            const hargaInput = document.getElementById('harga');
            const jumlahInput = document.getElementById('jumlah');
            const estimasiOutput = document.getElementById('estimasi_total');

            function calculate() {
                const harga = parseFloat(hargaInput.value) || 0;
                const jumlah = parseInt(jumlahInput.value) || 0;
                const total = harga * jumlah;

                estimasiOutput.innerText = 'Rp ' + new Intl.NumberFormat('id-ID').format(total);
            }

            hargaInput.addEventListener('input', calculate);
            jumlahInput.addEventListener('input', calculate);
        });
    </script>
@endsection
