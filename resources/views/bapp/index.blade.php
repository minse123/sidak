@extends('layouts.app')

@section('main-classes', 'p-0')

@section('page-header')
    <div class="container-fluid px-3 px-lg-4 px-xxl-5 py-4">
        <div class="bg-white border-0 shadow-sm rounded-4">
            <div
                class="px-4 px-md-5 py-4 d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-4">
                <div>
                    <div class="text-success fw-semibold text-uppercase small mb-2" style="letter-spacing: 0.3em;">
                        Manajemen
                        BAPP
                    </div>
                    <h1 class="h2 fw-bold text-dark mb-2">Kelola Dokumen Berita Acara Pekerjaan</h1>
                    <p class="text-muted mb-0">
                        Pantau progres pengerjaan, pemeriksaan, dan status BAPP terbaru.
                    </p>
                </div>

                <div class="text-end">
                    <p class="text-uppercase text-muted small mb-0">Total BAPP</p>
                    <p class="h5 fw-semibold text-dark mb-0">{{ number_format($bapp->total()) }} Dokumen</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid py-4 px-3 px-lg-4 px-xxl-5">
        <div class="card border-0 shadow-sm">
            <div
                class="card-header bg-white border-0 d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3">
                <div>
                    <h3 class="h5 fw-semibold text-dark mb-1">Daftar Dokumen BAPP</h3>
                    <p class="text-muted mb-0">Ringkasan proses pengerjaan dan pemeriksaan BAPP.</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('bapp.create') }}" class="btn btn-success rounded-3 px-4">
                        <i class="bi bi-plus-circle me-2" aria-hidden="true"></i>
                        Tambah BAPP
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="px-4" style="width: 60px;">#</th>
                                <th scope="col">Nama Penerima</th>
                                <th scope="col" style="min-width: 230px;">Detail Pekerjaan</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Timeline</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="text-end pe-4" style="width: 180px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bapp as $item)
                                <tr>
                                    <td class="px-4 fw-semibold">
                                        {{ ($bapp->currentPage() - 1) * $bapp->perPage() + $loop->iteration }}</td>
                                    <td>
                                        <div class="fw-semibold text-dark">{{ $item->nama_penerima }}</div>
                                        <small class="text-muted d-block">NIK: {{ $item->nik }}</small>
                                        <small class="text-muted">Dibuat oleh:
                                            {{ optional($item->creator)->name ?? '—' }}</small>
                                    </td>
                                    <td>
                                        <div class="text-dark">{{ $item->nama_pekerjaan }}</div>
                                        <div class="small text-muted">{{ $item->detail_pekerjaan }}</div>
                                    </td>
                                    <td>
                                        <div class="text-dark">{{ $item->alamat_pekerjaan }}</div>
                                    </td>
                                    <td>
                                        <div class="fw-semibold text-dark">Rp
                                            {{ number_format($item->subtotal, 0, ',', '.') }}</div>
                                    </td>
                                    <td>
                                        <div class="small text-muted">Pengerjaan:
                                            <span
                                                class="text-dark">{{ optional($item->selesai_pengerjaan)->translatedFormat('d F Y') ?? '—' }}</span>
                                        </div>
                                        <div class="small text-muted">Pemeriksaan:
                                            <span
                                                class="text-dark">{{ optional($item->selesai_pemeriksaan)->translatedFormat('d F Y') ?? '—' }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($item->status === 'Verifikasi')
                                            <span
                                                class="badge rounded-pill bg-success-subtle text-success">Verifikasi</span>
                                        @else
                                            <span
                                                class="badge rounded-pill bg-warning-subtle text-warning">{{ $item->status }}</span>
                                        @endif
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="d-flex justify-content-end gap-1">
                                            @can('verify', $item)
                                                @if ($item->status === 'Pending')
                                                    <form action="{{ route('bapp.verify', $item) }}" method="POST"
                                                        onsubmit="return confirm('Verifikasi data BAPP ini?');"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit"
                                                            class="btn btn-outline-success btn-sm rounded-circle"
                                                            title="Verifikasi">
                                                            <i class="bi bi-check-lg" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endcan

                                            @can('update', $item)
                                                <a href="{{ route('bapp.edit', $item) }}"
                                                    class="btn btn-outline-primary btn-sm rounded-circle" title="Edit">
                                                    <i class="bi bi-pencil" aria-hidden="true"></i>
                                                </a>
                                            @endcan

                                            @can('delete', $item)
                                                <form action="{{ route('bapp.destroy', $item) }}" method="POST"
                                                    onsubmit="return confirm('Hapus data BAPP ini?');" class="d-inline">
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
                                        <p class="text-muted mb-1">Belum ada data BAPP yang tersedia.</p>
                                        <a href="{{ route('bapp.create') }}" class="btn btn-link">Tambahkan data BAPP
                                            pertama</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($bapp->hasPages())
                <div class="card-footer bg-white border-0 py-3">
                    {{ $bapp->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
