<?php

namespace App\Http\Requests\SuratPesanan;

use Illuminate\Foundation\Http\FormRequest;

class StoreSuratPesanan extends FormRequest
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
            'no_surat_pesanan' => 'required', 'string', 'unique:surat_pesanans,no_surat_pesanan',
            'nama_produk' => 'required', 'string', 'max:255',
            'jenis_produk' => 'required', 'string', 'max:255',
            'kategori' => 'required', 'string', 'max:255',
            'durasi_bulan' => 'required', 'integer', 'min:1',
            'variasi' => 'required', 'string', 'max:255',
            'harga' => 'required', 'numeric', 'min:0',
            'jumlah' => 'required', 'integer', 'min:1',
            'bebas_ppn' => 'required', 'boolean',
            'url_produk' => 'nullable', 'url',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'no_surat_pesanan.required' => 'Surat pesanan wajib diisi.',
            'nama_produk.required' => 'Nama produk wajib diisi.',
            'jenis_produk.required' => 'Jenis produk wajib diisi.',
            'kategori.required' => 'Kategori wajib diisi.',
            'durasi_bulan.required' => 'Durasi bulan wajib diisi.',
            'durasi_bulan.integer' => 'Durasi bulan harus berupa angka.',
            'variasi.required' => 'Variasi wajib diisi.',
            'harga.required' => 'Harga wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'jumlah.required' => 'Jumlah wajib diisi.',
            'jumlah.integer' => 'Jumlah harus berupa angka bulat.',
            'bebas_ppn.required' => 'Status bebas PPN wajib dipilih.',
            'bebas_ppn.boolean' => 'Status bebas PPN tidak valid.',
            'url_produk.url' => 'URL produk harus berupa tautan yang valid.',
        ];
    }
}
