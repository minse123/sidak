<?php

namespace Database\Seeders;

use App\Models\SuratPesanan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SuratPesananSeeder extends Seeder
{
    public function run(): void
    {

        $user = User::first();

        if (! $user) {
            return;
        }

        $suratPesanans = [
            [
                'nama_produk' => 'Jasa Tenaga Keamanan',
                'jenis_produk' => 'Jasa',
                'kategori' => 'PDN',
                'durasi_bulan' => 12,
                'variasi' => 'Variasi Laki Laki',
                'harga' => 3400000,
                'jumlah' => 12,
                'bebas_ppn' => true,
                'url_produk' => 'https://katalog.inaproc.id/snapshot-product?product=tenaga-keamanan-001',
            ],
            [
                'nama_produk' => 'Pengadaan Laptop Kantor',
                'jenis_produk' => 'Barang',
                'kategori' => 'PDN',
                'durasi_bulan' => 1,
                'variasi' => 'RAM 16GB SSD 512GB',
                'harga' => 12500000,
                'jumlah' => 8,
                'bebas_ppn' => false,
                'url_produk' => 'https://katalog.inaproc.id/snapshot-product?product=laptop-kantor-002',
            ],
            [
                'nama_produk' => 'Jasa Kebersihan Gedung',
                'jenis_produk' => 'Jasa',
                'kategori' => 'PDN',
                'durasi_bulan' => 12,
                'variasi' => 'Full Service',
                'harga' => 2750000,
                'jumlah' => 10,
                'bebas_ppn' => true,
                'url_produk' => 'https://katalog.inaproc.id/snapshot-product?product=kebersihan-003',
            ],
            [
                'nama_produk' => 'Pengadaan Printer',
                'jenis_produk' => 'Barang',
                'kategori' => 'PDN',
                'durasi_bulan' => 5,
                'variasi' => 'LaserJet Hitam Putih',
                'harga' => 2256124,
                'jumlah' => 3,
                'bebas_ppn' => true,
                'url_produk' => 'https://katalog.inaproc.id/snapshot-product?product=printer-004',
            ],
            [
                'nama_produk' => 'Jasa Maintenance Server',
                'jenis_produk' => 'Jasa',
                'kategori' => 'Impor',
                'durasi_bulan' => 6,
                'variasi' => 'Full Support 24/7',
                'harga' => 7800000,
                'jumlah' => 2,
                'bebas_ppn' => false,
                'url_produk' => 'https://katalog.inaproc.id/snapshot-product?product=server-005',
            ],
            [
                'nama_produk' => 'Pengadaan AC Ruang Rapat',
                'jenis_produk' => 'Barang',
                'kategori' => 'PDN',
                'durasi_bulan' => 2,
                'variasi' => '2 PK Inverter',
                'harga' => 8900000,
                'jumlah' => 4,
                'bebas_ppn' => false,
                'url_produk' => 'https://katalog.inaproc.id/snapshot-product?product=ac-006',
            ],
            [
                'nama_produk' => 'Jasa Pelatihan SDM IT',
                'jenis_produk' => 'Jasa',
                'kategori' => 'PDN',
                'durasi_bulan' => 3,
                'variasi' => 'Pelatihan Keamanan Siber',
                'harga' => 15000000,
                'jumlah' => 1,
                'bebas_ppn' => true,
                'url_produk' => 'https://katalog.inaproc.id/snapshot-product?product=pelatihan-it-007',
            ],
            [
                'nama_produk' => 'Pengadaan Meja dan Kursi Kantor',
                'jenis_produk' => 'Barang',
                'kategori' => 'PDN',
                'durasi_bulan' => 1,
                'variasi' => 'Set Meja Kursi Ergonomis',
                'harga' => 3200000,
                'jumlah' => 15,
                'bebas_ppn' => false,
                'url_produk' => 'https://katalog.inaproc.id/snapshot-product?product=meja-kursi-008',
            ],
            [
                'nama_produk' => 'Jasa Sewa Kendaraan Operasional',
                'jenis_produk' => 'Jasa',
                'kategori' => 'PDN',
                'durasi_bulan' => 12,
                'variasi' => 'Mobil Operasional MPV',
                'harga' => 6500000,
                'jumlah' => 2,
                'bebas_ppn' => true,
                'url_produk' => 'https://katalog.inaproc.id/snapshot-product?product=kendaraan-009',
            ],
            [
                'nama_produk' => 'Pengadaan UPS Ruang Server',
                'jenis_produk' => 'Barang',
                'kategori' => 'Impor',
                'durasi_bulan' => 1,
                'variasi' => 'UPS 3000VA',
                'harga' => 11750000,
                'jumlah' => 2,
                'bebas_ppn' => false,
                'url_produk' => 'https://katalog.inaproc.id/snapshot-product?product=ups-010',
            ],
        ];

        foreach ($suratPesanans as $suratPesanan) {
            SuratPesanan::create([
                'no_surat_pesanan' => 'EP-' . strtoupper(Str::random(26)),
                ...$suratPesanan,
            ]);
        }
    }
}
