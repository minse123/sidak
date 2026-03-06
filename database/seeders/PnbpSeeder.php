<?php

namespace Database\Seeders;

use App\Models\Pnbp;
use App\Models\User;
use Illuminate\Database\Seeder;

class PnbpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        if (! $user) {
            return;
        }

        $pnbps = [
            [
                'no_dokumen' => 'DOC/2026/001',
                'nama_paket' => 'Pengadaan Laptop Kantor',
                'no_surat_pesanan' => 'SP/LPT/001',
                'no_dokumen_penerima' => 'REC/LPT/001',
                'termin' => 'Termin 1',
                'persentase_tarif' => 10,
                'nominal_tarif' => 50000000,
                'status' => 'Verifikasi',
            ],
            [
                'no_dokumen' => 'DOC/2026/002',
                'nama_paket' => 'Renovasi Aula Utama',
                'no_surat_pesanan' => 'SP/REN/005',
                'no_dokumen_penerima' => 'REC/REN/002',
                'termin' => 'Termin 2',
                'persentase_tarif' => 5,
                'nominal_tarif' => 120000000,
                'status' => 'Pending',
            ],
            [
                'no_dokumen' => 'DOC/2026/003',
                'nama_paket' => 'Pemeliharaan Jaringan Internet',
                'no_surat_pesanan' => 'SP/NET/012',
                'no_dokumen_penerima' => 'REC/NET/008',
                'termin' => 'Final',
                'persentase_tarif' => 0,
                'nominal_tarif' => 25000000,
                'status' => 'Verifikasi',
            ],
            [
                'no_dokumen' => 'DOC/2026/004',
                'nama_paket' => 'Pengadaan Alat Tulis Kantor',
                'no_surat_pesanan' => 'SP/ATK/202',
                'no_dokumen_penerima' => 'REC/ATK/150',
                'termin' => 'Termin 1',
                'persentase_tarif' => 2.5,
                'nominal_tarif' => 15000000,
                'status' => 'Pending',
            ],
            [
                'no_dokumen' => 'DOC/2026/005',
                'nama_paket' => 'Pembangunan Pagar Keliling',
                'no_surat_pesanan' => 'SP/BGN/088',
                'no_dokumen_penerima' => null,
                'termin' => 'Termin 1',
                'persentase_tarif' => 15,
                'nominal_tarif' => 350000000,
                'status' => 'Pending',
            ],
            [
                'no_dokumen' => 'DOC/2026/006',
                'nama_paket' => 'Sewa Kendaraan Operasional',
                'no_surat_pesanan' => 'SP/TRN/044',
                'no_dokumen_penerima' => 'REC/TRN/040',
                'termin' => 'Termin 3',
                'persentase_tarif' => 10,
                'nominal_tarif' => 45000000,
                'status' => 'Verifikasi',
            ],
            [
                'no_dokumen' => 'DOC/2026/007',
                'nama_paket' => 'Pengadaan Seragam Pegawai',
                'no_surat_pesanan' => 'SP/SRG/101',
                'no_dokumen_penerima' => 'REC/SRG/099',
                'termin' => 'Termin 1',
                'persentase_tarif' => 5,
                'nominal_tarif' => 85000000,
                'status' => 'Pending',
            ],
            [
                'no_dokumen' => 'DOC/2026/008',
                'nama_paket' => 'Pelatihan SDM IT',
                'no_surat_pesanan' => null,
                'no_dokumen_penerima' => 'REC/EDU/005',
                'termin' => 'Final',
                'persentase_tarif' => 0,
                'nominal_tarif' => 60000000,
                'status' => 'Verifikasi',
            ],
            [
                'no_dokumen' => 'DOC/2026/009',
                'nama_paket' => 'Pengadaan Server Cloud',
                'no_surat_pesanan' => 'SP/CLD/001',
                'no_dokumen_penerima' => 'REC/CLD/001',
                'termin' => 'Termin 1',
                'persentase_tarif' => 20,
                'nominal_tarif' => 200000000,
                'status' => 'Pending',
            ],
            [
                'no_dokumen' => 'DOC/2026/010',
                'nama_paket' => 'Penggantian AC Ruang Rapat',
                'no_surat_pesanan' => 'SP/ELC/055',
                'no_dokumen_penerima' => 'REC/ELC/050',
                'termin' => 'Termin 1',
                'persentase_tarif' => 7.5,
                'nominal_tarif' => 30000000,
                'status' => 'Verifikasi',
            ],
            [
                'no_dokumen' => 'DOC/2026/011',
                'nama_paket' => 'Audit Keuangan Internal',
                'no_surat_pesanan' => 'SP/AUD/002',
                'no_dokumen_penerima' => null,
                'termin' => 'Termin 2',
                'persentase_tarif' => 0,
                'nominal_tarif' => 75000000,
                'status' => 'Pending',
            ],
            [
                'no_dokumen' => 'DOC/2026/012',
                'nama_paket' => 'Pengadaan Meja dan Kursi',
                'no_surat_pesanan' => 'SP/FRN/090',
                'no_dokumen_penerima' => 'REC/FRN/085',
                'termin' => 'Termin 1',
                'persentase_tarif' => 5,
                'nominal_tarif' => 42000000,
                'status' => 'Verifikasi',
            ],
            [
                'no_dokumen' => 'DOC/2026/013',
                'nama_paket' => 'Instalasi CCTV Gedung',
                'no_surat_pesanan' => 'SP/SEC/015',
                'no_dokumen_penerima' => 'REC/SEC/010',
                'termin' => 'Termin 1',
                'persentase_tarif' => 12,
                'nominal_tarif' => 95000000,
                'status' => 'Pending',
            ],
            [
                'no_dokumen' => 'DOC/2026/014',
                'nama_paket' => 'Sewa Lisensi Software',
                'no_surat_pesanan' => 'SP/SFT/022',
                'no_dokumen_penerima' => null,
                'termin' => 'Termin 1',
                'persentase_tarif' => 20,
                'nominal_tarif' => 150000000,
                'status' => 'Verifikasi',
            ],
            [
                'no_dokumen' => 'DOC/2026/015',
                'nama_paket' => 'Pengadaan Genset Darurat',
                'no_surat_pesanan' => 'SP/PWR/004',
                'no_dokumen_penerima' => 'REC/PWR/002',
                'termin' => 'Termin 1',
                'persentase_tarif' => 10,
                'nominal_tarif' => 280000000,
                'status' => 'Pending',
            ],
            [
                'no_dokumen' => 'DOC/2026/016',
                'nama_paket' => 'Pembuatan Taman Kantor',
                'no_surat_pesanan' => 'SP/LND/011',
                'no_dokumen_penerima' => 'REC/LND/009',
                'termin' => 'Termin 2',
                'persentase_tarif' => 3,
                'nominal_tarif' => 55000000,
                'status' => 'Verifikasi',
            ],
            [
                'no_dokumen' => 'DOC/2026/017',
                'nama_paket' => 'Pengadaan Printer Laser',
                'no_surat_pesanan' => 'SP/PRT/077',
                'no_dokumen_penerima' => 'REC/PRT/070',
                'termin' => 'Termin 1',
                'persentase_tarif' => 8,
                'nominal_tarif' => 38000000,
                'status' => 'Pending',
            ],
            [
                'no_dokumen' => 'DOC/2026/018',
                'nama_paket' => 'Layanan Kebersihan Tahunan',
                'no_surat_pesanan' => 'SP/CLN/001',
                'no_dokumen_penerima' => null,
                'termin' => 'Termin 1',
                'persentase_tarif' => 0,
                'nominal_tarif' => 180000000,
                'status' => 'Verifikasi',
            ],
            [
                'no_dokumen' => 'DOC/2026/019',
                'nama_paket' => 'Pengadaan UPS Ruang Server',
                'no_surat_pesanan' => 'SP/UPS/005',
                'no_dokumen_penerima' => 'REC/UPS/003',
                'termin' => 'Termin 1',
                'persentase_tarif' => 15,
                'nominal_tarif' => 110000000,
                'status' => 'Pending',
            ],
            [
                'no_dokumen' => 'DOC/2026/020',
                'nama_paket' => 'Jasa Konsultasi Pajak',
                'no_surat_pesanan' => 'SP/TAX/009',
                'no_dokumen_penerima' => 'REC/TAX/008',
                'termin' => 'Final',
                'persentase_tarif' => 5,
                'nominal_tarif' => 40000000,
                'status' => 'Verifikasi',
            ],
        ];

        foreach ($pnbps as $data) {
            $data['total_potongan'] = $data['persentase_tarif'] == 0 ? 0 : $data['nominal_tarif'] * ($data['persentase_tarif'] / 100);
            $data['created_by'] = $user->id;
            Pnbp::create($data);
        }
    }
}
