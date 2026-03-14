<?php

namespace App\Http\Requests\Bapp;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBappRequest extends FormRequest
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
            'nama_penerima' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'max:25'],
            'alamat_pekerjaan' => ['required', 'string', 'max:500'],
            'selesai_pengerjaan' => ['required', 'date'],
            'selesai_pemeriksaan' => ['required', 'date', 'after_or_equal:selesai_pengerjaan'],
            'nama_pekerjaan' => ['required', 'string', 'max:255'],
            'detail_pekerjaan' => ['required', 'string'],
            'subtotal' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'in:Pending,Verifikasi'],
        ];
    }
}
