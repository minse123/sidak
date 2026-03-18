<?php

namespace App\Http\Requests\Invoices;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoicesRequest extends FormRequest
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
            'judul_invoice' => ['required', 'string', 'max:255'],
            'nama' => ['required', 'string', 'max:255'],
            'jabatan' => ['required', 'string', 'max:255'],
            'no_rekening' => ['required', 'string', 'max:50'],
            'gaji' => ['required', 'numeric', 'min:0'],
            'bulan' => ['required', 'integer', 'between:1,12'],
            'tahun' => ['required', 'integer', 'digits:4', 'min:2000'],
            'jumlah' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'in:Pending,Verifikasi'],
            'created_by' => ['required', 'integer', 'exists:users,id'],
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
            'judul_invoice.required' => 'Judul invoice wajib diisi.',
            'nama.required' => 'Nama wajib diisi.',
            'jabatan.required' => 'Jabatan wajib diisi.',
            'no_rekening.required' => 'Nomor rekening wajib diisi.',
            'gaji.required' => 'Gaji wajib diisi.',
            'gaji.numeric' => 'Gaji harus berupa angka.',
            'bulan.required' => 'Bulan wajib diisi.',
            'bulan.integer' => 'Bulan harus berupa angka bulat.',
            'bulan.between' => 'Bulan harus di antara 1 sampai 12.',
            'tahun.required' => 'Tahun wajib diisi.',
            'tahun.integer' => 'Tahun harus berupa angka bulat.',
            'tahun.digits' => 'Tahun harus terdiri dari 4 digit.',
            'jumlah.required' => 'Jumlah wajib diisi.',
            'jumlah.numeric' => 'Jumlah harus berupa angka.',
            'status.required' => 'Status wajib diisi.',
            'status.in' => 'Status harus berupa Pending atau Verifikasi.',
            'created_by.required' => 'Pembuat invoice wajib diisi.',
            'created_by.exists' => 'Pembuat invoice tidak ditemukan.',
        ];
    }
}
