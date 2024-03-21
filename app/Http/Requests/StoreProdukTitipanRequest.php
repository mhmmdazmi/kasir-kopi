<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdukTitipanRequest extends FormRequest
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
            'nama_produk' => 'required',
            'nama_supplier' => 'required',
            // 'harga_beli' => 'required',
            // 'harga_jual' => 'required',
            'stok' => 'required',
            'keterangan' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama_produk.required' => 'Data nama produk belum di isi cok! isi dulu!',
            'nama_supplier.required' => 'Data nama supplier belum di isi cok! isi dulu!',
            // 'harga_beli.required' => 'Data harga beli belum di isi cok! isi dulu!',
            // 'harga_jual.required' => 'Data harga jual belum di isi cok! isi dulu!',
            'stok.required' => 'Data stok belum di isi cok! isi dulu!',
            'keterangan.required' => 'Data keterangan belum di isi cok! isi dulu!'
        ];
    }
}
