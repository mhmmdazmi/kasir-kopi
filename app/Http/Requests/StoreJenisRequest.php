<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJenisRequest extends FormRequest
{
  
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_jenis' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama_jenis.required' => 'Data nama jenis belum di isi cok! isi dulu!'
        ];
    }
}
