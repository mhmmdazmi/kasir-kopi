<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAbsensiRequest extends FormRequest
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
    public function rules()
    {
        return [
            // 'nama_karyawan' => 'required',
            // 'tanggal_masuk' => 'required',
            // 'waktu_masuk' => 'required',
            // 'status' => 'required',
            // 'waktu_keluar' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama_karyawan.required' => 'Data nama karyawan belum di isi cok! isi dulu!',
            'tanggal_masuk.required' => 'Data tanggal masuk belum di isi cok! isi dulu!',
            'waktu_masuk.required' => 'Data waktu masuk belum di isi cok! isi dulu!',
            'status.required' => 'Data status belum di isi cok! isi dulu!',
            'waktu_keluar.required' => 'Data waktu keluar belum di isi cok! isi dulu!',
        ];
    }
}
