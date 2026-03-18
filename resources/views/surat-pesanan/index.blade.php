@extends('layouts.app')

@section('main-classes', 'p-0')

@section('page-header')
    <div class="container-fluid px-3 px-lg-4 px-xxl-5 py-4">
        <div class="bg-white border-0 shadow-sm rounded-4">
            <div
                class="px-4 px-md-5 py-4 d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-4">
                <div>
                    <div class="text-success fw-semibold text-uppercase small mb-2" style="letter-spacing: 0.3em;">
                        Manajemen Surat Pesanan
                    </div>
                    <h1 class="h2 fw-bold text-dark mb-2">Kelola data Surat Pesanan</h1>
                    <p class="text-muted mb-0">
                        Pantau detail produk dan informasi pemesanan yang sudah tercatat.
                    </p>
                </div>

                <div class="text-end">
                    <p class="text-uppercase text-muted small mb-0">Total Data</p>
                    <p class="h5 fw-semibold text-dark mb-0">{{ number_format($suratPesanans->total()) }} Dokumen</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid py-4 px-3 px-lg-4 px-xxl-5">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 px-4 px-lg-5 py-4">
                <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3">

                    <div>
                        <h3 class="fw-semibold text-dark mb-1" style="font-size: 1.25rem;">
                            Daftar Surat Pesanan
                        </h3>

                        <p class="text-muted mb-0" style="font-size: 0.95rem; max-width: 520px;">
                            Ringkasan item surat pesanan yang tersimpan di sistem.
                        </p>
                    </div>

                    <div>
                        <a href="{{ route('surat-pesanan.create') }}"
                            class="btn btn-success rounded-3 px-4 py-2 d-inline-flex align-items-center gap-2 shadow-sm">
                            <i class="bi bi-plus-circle"></i>
                            Tambah Surat Pesanan
                        </a>
                    </div>

                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="px-4" style="width: 60px;">#</th>
                                <th scope="col">Produk</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Durasi</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">PPN</th>
                                <th scope="col" class="text-end pe-4" style="width: 140px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($suratPesanans as $suratPesanan)
                                <tr>
                                    <td class="px-4 fw-semibold">
                                        {{ ($suratPesanans->currentPage() - 1) * $suratPesanans->perPage() + $loop->iteration }}
                                    </td>
                                    <td>
                                        <div class="fw-semibold text-dark">{{ $suratPesanan->nama_produk }}</div>
                                        <small class="text-muted">SP ID: {{ $suratPesanan->surat_pesanan_id }} |
                                            {{ $suratPesanan->jenis_produk }}</small>
                                    </td>
                                    <td>
                                        <div class="text-dark">{{ $suratPesanan->kategori }}</div>
                                        <small class="text-muted">{{ $suratPesanan->variasi }}</small>
                                    </td>
                                    <td>{{ $suratPesanan->durasi_bulan }} Bulan</td>
                                    <td>Rp {{ number_format($suratPesanan->harga, 0, ',', '.') }}</td>
                                    <td>{{ number_format($suratPesanan->jumlah) }}</td>
                                    <td>
                                        @if ($suratPesanan->bebas_ppn)
                                            <span class="badge rounded-pill bg-success-subtle text-success">Bebas PPN</span>
                                        @else
                                            <span class="badge rounded-pill bg-secondary-subtle text-secondary">Kena
                                                PPN</span>
                                        @endif
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="d-flex justify-content-end gap-1">
                                            @can('update', $suratPesanan)
                                                <a href="{{ route('surat-pesanan.edit', $suratPesanan) }}"
                                                    class="btn btn-outline-primary btn-sm rounded-circle" title="Edit">
                                                    <i class="bi bi-pencil" aria-hidden="true"></i>
                                                </a>
                                            @endcan

                                            @can('delete', $suratPesanan)
                                                <form action="{{ route('surat-pesanan.destroy', $suratPesanan) }}"
                                                    method="POST" onsubmit="return confirm('Hapus data surat pesanan ini?');"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-circle"
                                                        title="Hapus">
                                                        <i class="bi bi-trash" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-5">
                                        <p class="text-muted mb-1">Belum ada data surat pesanan yang terdaftar.</p>
                                        <a href="{{ route('surat-pesanan.create') }}" class="btn btn-link">Tambahkan data
                                            surat pesanan pertama</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($suratPesanans->hasPages())
                <div class="card-footer bg-white border-0 py-3">
                    {{ $suratPesanans->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
