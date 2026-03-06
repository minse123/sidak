<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pnbp extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pnbps';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'no_dokumen',
        'nama_paket',
        'no_surat_pesanan',
        'no_dokumen_penerima',
        'termin',
        'persentase_tarif',
        'nominal_tarif',
        'total_potongan',
        'status',
        'created_by',
    ];

    /**
     * Get the user who created the PNBP.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
