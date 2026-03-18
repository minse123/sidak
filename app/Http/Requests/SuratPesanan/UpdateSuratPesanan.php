<?php

namespace App\Http\Requests\SuratPesanan;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSuratPesanan extends FormRequest
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
            'no_surat_pesanan' => [
                'required',
                'string',
                Rule::unique('surat_pesanans', 'no_surat_pesanan')->ignore($this->suratPesanan),
            ],
            'nama_produk' => ['required', 'string', 'max:255'],
            'jenis_produk' => ['required', 'string', 'max:255'],
            'kategori' => ['required', 'string', 'max:255'],
            'durasi_bulan' => ['required', 'integer', 'min:1'],
            'variasi' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'numeric', 'min:0'],
            'jumlah' => ['required', 'integer', 'min:1'],
            'bebas_ppn' => ['required', 'boolean'],
            'url_produk' => ['nullable', 'url'],
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
            'no_surat_pesanan.unique' => 'Nomor surat pesanan sudah digunakan.',
            'nama_produk.required' => 'Nama produk wajib diisi.',
            'jenis_produk.required' => 'Jenis produk wajib diisi.',
            'kategori.required' => 'Kategori wajib diisi.',
            'durasi_bulan.required' => 'Durasi bulan wajib diisi.',
            'durasi_bulan.integer' => 'Durasi bulan harus berupa angka.',
            'durasi_bulan.min' => 'Durasi bulan minimal 1.',
            'variasi.required' => 'Variasi wajib diisi.',
            'harga.required' => 'Harga wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'harga.min' => 'Harga tidak boleh kurang dari 0.',
            'jumlah.required' => 'Jumlah wajib diisi.',
            'jumlah.integer' => 'Jumlah harus berupa angka bulat.',
            'jumlah.min' => 'Jumlah minimal 1.',
            'bebas_ppn.required' => 'Status bebas PPN wajib dipilih.',
            'bebas_ppn.boolean' => 'Status bebas PPN tidak valid.',
            'url_produk.url' => 'URL produk harus berupa tautan yang valid.',
        ];
    }
}
