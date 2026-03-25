<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuratPesanan extends Model
{
    protected $table = 'surat_pesanans';
    protected $fillable = [
        'no_surat_pesanan',
        'nama_produk',
        'jenis_produk',
        'kategori',
        'durasi_bulan',
        'variasi',
        'harga',
        'jumlah',
        'bebas_ppn',
        'url_produk',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    protected function casts(): array
    {
        return [
            'durasi_bulan' => 'integer',
            'harga' => 'decimal:2',
            'jumlah' => 'integer',
            'bebas_ppn' => 'boolean',
        ];
    }
}
