<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use App\Models\Kategori;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return view('kategori.index', [
            'kategori' => Kategori::latest()->get()
        ]);
    }

    public function store(StoreKategoriRequest $request)
    {
        Kategori::create($request->all());
        return redirect('kategori')->with('success', "Input data barang berhasil");
    }
    public function update(UpdateKategoriRequest $request, Kategori $kategori)
    {
        $kategori->update($request->all());

        return redirect('kategori')->with('success', "Update Data Berhasil!");
    }
    public function destroy(Kategori $kategori)
    { {
            try {
                $kategori->delete();
                return redirect('kategori')->with('success', 'Data berhasil dihapus!');
            } catch (QueryException | Exception | PDOException $error) {
                $this->failResponse($error->getMessage(), $error->getCode());
            }
        }
    }
}
