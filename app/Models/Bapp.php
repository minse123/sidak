<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bapp extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bapp';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_penerima',
        'nik',
        'alamat_pekerjaan',
        'selesai_pengerjaan',
        'selesai_pemeriksaan',
        'nama_pekerjaan',
        'detail_pekerjaan',
        'subtotal',
        'status',
        'created_by',
    ];

    /**
     * Get the user who created the BAPP.
     */
    /**
     * Get the user who created the BAPP.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    protected function casts(): array
    {
        return [
            'selesai_pengerjaan' => 'date',
            'selesai_pemeriksaan' => 'date',
            'subtotal' => 'decimal:2',
        ];
    }
}
