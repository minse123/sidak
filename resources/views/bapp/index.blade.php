@extends('layouts.app')

@php
    $bappWorkers = collect($bappWorkers ?? [
        [
            'name' => 'Budi Santoso',
            'role' => 'Pengawas Lapangan',
            'identifier' => 'PKR-001',
            'document' => 'BAPP/001/III/2024',
            'project' => 'Pemeliharaan Jalan Nasional Lintas Timur',
            'location' => 'Kab. Demak, Jawa Tengah',
            'duration' => '5 Januari – 20 Februari 2024',
            'shift' => 'Shift Pagi · 07.00 – 15.00',
            'shift_badge' => 'bg-info-subtle text-info',
            'status' => 'Progres 80%',
            'status_badge' => 'bg-success-subtle text-success',
            'notes' => 'Fokus pada pelapisan aspal tahap kedua dan inspeksi sambungan expansion joint.',
            'subtotal' => 42000000,
        ],
        [
            'name' => 'Siti Rahmawati',
            'role' => 'Quality Engineer',
            'identifier' => 'PKR-014',
            'document' => 'BAPP/014/III/2024',
            'project' => 'Peningkatan PJU & Median Jalan',
            'location' => 'Kota Bandung, Jawa Barat',
            'duration' => '18 Februari – 2 April 2024',
            'shift' => 'Shift Malam · 19.00 – 03.00',
            'shift_badge' => 'bg-primary-subtle text-primary',
            'status' => 'Dokumen Revisi',
            'status_badge' => 'bg-warning-subtle text-warning',
            'notes' => 'Menunggu validasi ulang terhadap hasil pengambilan sampel beton pracetak.',
            'subtotal' => 38500000,
        ],
        [
            'name' => 'Andi Wijaya',
            'role' => 'Site Manager',
            'identifier' => 'PKR-027',
            'document' => 'BAPP/027/III/2024',
            'project' => 'Pembangunan Dermaga Pelabuhan Utama',
            'location' => 'Kab. Belitung Timur, Bangka Belitung',
            'duration' => '7 Januari – 12 Maret 2024',
            'shift' => 'Shift Penuh · 24 Jam Bergilir',
            'shift_badge' => 'bg-secondary-subtle text-secondary',
            'status' => 'Menunggu Approval',
            'status_badge' => 'bg-info-subtle text-info',
            'notes' => 'Dokumen hasil uji load test ponton sedang direview oleh tim pengawas Kemenhub.',
            'subtotal' => 51200000,
        ],
        [
            'name' => 'Mega Pratama',
            'role' => 'Supervisor Mekanikal',
            'identifier' => 'PKR-033',
            'document' => 'BAPP/033/III/2024',
            'project' => 'Instalasi Pompa Irigasi Terpadu',
            'location' => 'Kab. Gowa, Sulawesi Selatan',
            'duration' => '26 Februari – 30 Maret 2024',
            'shift' => 'Shift Siang · 09.00 – 17.00',
            'shift_badge' => 'bg-dark-subtle text-dark',
            'status' => 'Selesai 100%',
            'status_badge' => 'bg-success-subtle text-success',
            'notes' => 'BAPP final disetujui pengawas; jadwal serah terima instalasi pekan depan.',
            'subtotal' => 44750000,
        ],
    ]);
@endphp

@section('main-classes', 'p-0')

@section('page-header')
    <div class="bg-white border-bottom shadow-sm">
        <div class="container-fluid py-4 d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3">
            <div>
                <small class="text-uppercase text-success fw-semibold" style="letter-spacing: 0.35em;">Manajemen BAPP</small>
                <h2 class="h2 fw-semibold text-dark mt-2 mb-1">Kelola Dokumen Berita Acara Pekerjaan</h2>
                <p class="text-muted mb-0">Visualisasi statis untuk memudahkan tim frontend merancang antarmuka.</p>
            </div>
            <div class="text-end">
                <p class="text-uppercase text-muted small mb-0">Total Dokumen</p>
                <p class="h5 fw-semibold text-dark mb-0">{{ number_format($bappWorkers->count()) }} Dokumen</p>
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
                    <h3 class="h5 fw-semibold text-dark mb-1">Daftar Pekerja</h3>
                    <p class="text-muted mb-0">Tampilan dummy untuk kebutuhan prototyping halaman BAPP.</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="javascript:void(0)" class="btn btn-success rounded-3 px-4">
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
                                <th scope="col" class="px-4" style="width: 60px;">No</th>
                                <th scope="col" style="min-width: 220px;">Nama Pekerja</th>
                                <th scope="col" style="min-width: 320px;">Detail Pekerja</th>
                                <th scope="col" class="text-end pe-4" style="width: 220px;">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bappWorkers as $worker)
                                <tr>
                                    <td class="px-4 fw-semibold text-muted">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="fw-semibold text-dark">{{ $worker['name'] }}</div>
                                        <small class="text-muted d-block">{{ $worker['role'] }}</small>
                                        <div class="small text-muted mt-2">ID: {{ $worker['identifier'] }}</div>
                                        <div class="small text-muted">No. Dokumen: {{ $worker['document'] }}</div>
                                    </td>
                                    <td>
                                        <div class="fw-semibold text-dark">{{ $worker['project'] }}</div>
                                        <div class="small text-muted">Lokasi: {{ $worker['location'] }}</div>
                                        <div class="small text-muted">Durasi: {{ $worker['duration'] }}</div>
                                        <div class="d-flex flex-wrap gap-2 mt-3">
                                            <span class="badge rounded-pill {{ $worker['shift_badge'] }}">{{ $worker['shift'] }}</span>
                                            <span class="badge rounded-pill {{ $worker['status_badge'] }}">{{ $worker['status'] }}</span>
                                        </div>
                                        <p class="small text-muted mb-0 mt-3">{{ $worker['notes'] }}</p>
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="fw-semibold text-dark">Rp
                                            {{ number_format($worker['subtotal'], 0, ',', '.') }}</div>
                                        <small class="text-muted d-block">Estimasi subtotal pekerjaan</small>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5">
                                        <p class="text-muted mb-1">Belum ada data pekerja untuk ditampilkan.</p>
                                        <span class="text-muted small">Tambahkan data melalui backend ketika siap.</span>
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
