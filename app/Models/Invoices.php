<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{

    protected $table = 'invoices';
    protected $fillable = [
        'judul_invoice',
        'nama',
        'jabatan',
        'no_rekening',
        'gaji',
        'bulan',
        'tahun',
        'jumlah',
        'status',
        'created_by',
    ];

    protected function casts(): array
    {
        return [
            'gaji' => 'decimal:2',
            'jumlah' => 'decimal:2',
            'bulan' => 'integer',
            'tahun' => 'integer',
            'created_by' => 'integer',
        ];
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
