@extends('layouts.app')

@section('main-classes', 'p-0')

@section('page-header')
    <div class="bg-white border-bottom shadow-sm">
        <div class="container-fluid py-4 d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3">
            <div>
                <small class="text-uppercase text-success fw-semibold" style="letter-spacing: 0.35em;">Manajemen PNBP</small>
                <h2 class="h2 fw-semibold text-dark mt-2 mb-1">Kelola data Penerimaan Negara Bukan Pajak</h2>
                <p class="text-muted mb-0">Pantau dan verifikasi setiap transaksi PNBP yang masuk.</p>
            </div>
            <div class="text-end">
                <p class="text-uppercase text-muted small mb-0">Total PNBP</p>
                <p class="h5 fw-semibold text-dark mb-0">{{ number_format($pnbps->total()) }} Dokumen</p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid py-4 px-3 px-lg-4 px-xxl-5">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3">
                <div>
                    <h3 class="h5 fw-semibold text-dark mb-1">Daftar PNBP</h3>
                    <p class="text-muted mb-0">Ringkasan transaksi PNBP yang terdaftar.</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('pnbp.create') }}" class="btn btn-success rounded-3 px-4">
                        <i class="bi bi-plus-circle me-2" aria-hidden="true"></i>
                        Tambah PNBP
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="px-4" style="width: 60px;">#</th>
                                <th scope="col">No. Dokumen</th>
                                <th scope="col">Nama Paket</th>
                                <th scope="col">Termin</th>
                                <th scope="col">Nominal Tarif</th>
                                <th scope="col">Total Potongan</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="text-end pe-4" style="width: 180px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pnbps as $pnbp)
                                <tr>
                                    <td class="px-4 fw-semibold">{{ ($pnbps->currentPage() - 1) * $pnbps->perPage() + $loop->iteration }}</td>
                                    <td>
                                        <div class="fw-semibold text-dark">{{ $pnbp->no_dokumen }}</div>
                                        <small class="text-muted">ID #{{ str_pad($pnbp->id, 4, '0', STR_PAD_LEFT) }}</small>
                                    </td>
                                    <td>
                                        <div class="text-dark">{{ $pnbp->nama_paket }}</div>
                                        <div class="small text-muted">
                                            @if($pnbp->no_surat_pesanan)
                                                <span class="me-2">SP: {{ $pnbp->no_surat_pesanan }}</span>
                                            @endif
                                            @if($pnbp->no_dokumen_penerima)
                                                <span>Rec: {{ $pnbp->no_dokumen_penerima }}</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{ $pnbp->termin }}</td>
                                    <td>Rp {{ number_format($pnbp->nominal_tarif, 0, ',', '.') }}</td>
                                    <td>
                                        <div class="text-dark">Rp {{ number_format($pnbp->total_potongan, 0, ',', '.') }}</div>
                                        <small class="text-muted">({{ $pnbp->persentase_tarif }}%)</small>
                                    </td>
                                    <td>
                                        @if($pnbp->status === 'Verifikasi')
                                            <span class="badge rounded-pill bg-success-subtle text-success">Verifikasi</span>
                                        @else
                                            <span class="badge rounded-pill bg-warning-subtle text-warning">Pending</span>
                                        @endif
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="d-flex justify-content-end gap-1">
                                            @can('verify', $pnbp)
                                                @if($pnbp->status === 'Pending')
                                                    <form action="{{ route('pnbp.verify', $pnbp) }}" method="POST" onsubmit="return confirm('Verifikasi data PNBP ini?');" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-outline-success btn-sm rounded-circle" title="Verifikasi">
                                                            <i class="bi bi-check-lg" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endcan

                                            @can('update', $pnbp)
                                                <a href="{{ route('pnbp.edit', $pnbp) }}" class="btn btn-outline-primary btn-sm rounded-circle" title="Edit">
                                                    <i class="bi bi-pencil" aria-hidden="true"></i>
                                                </a>
                                            @endcan
                                            
                                            @can('delete', $pnbp)
                                                <form action="{{ route('pnbp.destroy', $pnbp) }}" method="POST" onsubmit="return confirm('Hapus data PNBP ini?');" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-circle" title="Hapus">
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
                                        <p class="text-muted mb-1">Belum ada data PNBP yang terdaftar.</p>
                                        <a href="{{ route('pnbp.create') }}" class="btn btn-link">Tambahkan data PNBP pertama</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if($pnbps->hasPages())
                <div class="card-footer bg-white border-0 py-3">
                    {{ $pnbps->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
