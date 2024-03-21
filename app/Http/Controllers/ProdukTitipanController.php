<?php

namespace App\Http\Controllers;

use App\Models\ProdukTitipan;
use App\Http\Requests\StoreProdukTitipanRequest;
use App\Http\Requests\UpdateProdukTitipanRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class ProdukTitipanController extends Controller
{
    public function index()
    {
        return view('produk_titipan.index', [
            'produk_titipan' => ProdukTitipan::latest()->get()
        ]);
    }
    public function store(StoreProdukTitipanRequest $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga_beli' => 'required|numeric|min:0'
        ]);

        ProdukTitipan::create($request->all());
        return redirect('produk_titipan')->with('success', "Input data barang berhasil");
    }
    public function update(UpdateProdukTitipanRequest $request, ProdukTitipan $produkTitipan)
    {
        $produkTitipan->update($request->all());

        return redirect('produk_titipan')->with('success', "Update Data Berhasil!");
    }
    public function destroy(ProdukTitipan $produkTitipan)
    { {
            try {
                $produkTitipan->delete();
                return redirect('produk_titipan')->with('success', 'Data berhasil dihapus!');
            } catch (QueryException | Exception | PDOException $error) {
                $this->failResponse($error->getMessage(), $error->getCode());
            }
        }
    }
    public function updateStok(ProdukTitipan $produkTitipan, $id)
    {
        $produkTitipan = ProdukTitipan::findOrFail($id);
        $produkTitipan->stok = $produkTitipan->stok;
        $produkTitipan->save();

        return response()->json(['success' => 'Stok updated successfully'], 200);
    }
}
