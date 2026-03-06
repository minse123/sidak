<?php

namespace App\Http\Requests\Pnbp;

use Illuminate\Foundation\Http\FormRequest;

class StorePnbpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'no_dokumen' => 'required|string|unique:pnbps,no_dokumen',
            'nama_paket' => 'required|string|max:255',
            'no_surat_pesanan' => 'nullable|string|max:255',
            'no_dokumen_penerima' => 'nullable|string|max:255',
            'termin' => 'required|string|max:255',
            'persentase_tarif' => 'required|numeric|min:0|max:100',
            'nominal_tarif' => 'required|numeric|min:0',
            'status' => 'required|in:Pending,Verifikasi',
        ];
    }
}
