<?php

namespace App\Models;

use Illuminate\http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukTitipan extends Model
{
    use HasFactory;

    protected $fillable = ['nama_produk', 'nama_supplier', 'harga_beli', 'harga_jual', 'stok', 'keterangan'];
    protected $table = 'produk_titipan';

    public function setHargaBeliAttribute($value)
    {
        $this->attributes['harga_beli'] = $value;
        $this->attributes['harga_jual'] = $this->hitungHargaJual(); // Panggil hitungHargaJual tanpa argumen
    }

    private function hitungHargaJual()
    {
        $hargaBeli = $this->harga_beli; // Menggunakan properti langsung
        $keuntungan = $hargaBeli * 0.7;
        $hargaJual = round(($hargaBeli + $keuntungan) / 500) * 500;
        return $hargaJual;
    }
    public function updateStock(Request $request, $id)
    {
        $produkTitipan = ProdukTitipan::findOrFail($id);
        $produkTitipan->stok = $request->stok;
        $produkTitipan->save();

        return response()->json(['success' => 'Stock updated successfully']);
    }
}
