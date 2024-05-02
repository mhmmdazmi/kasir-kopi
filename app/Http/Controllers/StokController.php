<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStokRequest;
use App\Http\Requests\UpdateStokRequest;
use App\Models\Stok;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index()
    {
        return view('stok.index', [
            'stok' => Stok::latest()->get()
        ]);
    }

    public function store(StoreStokRequest $request)
    {
        Stok::create($request->all());
        return redirect('stok')->with('success', "Input data barang berhasil");
    }
    public function update(UpdateStokRequest $request, Stok $stok)
    {
        $stok->update($request->all());

        return redirect('stok')->with('success', "Update Data Berhasil!");
    }
    public function destroy(Stok $stok)
    { {
            try {
                $stok->delete();
                return redirect('stok')->with('success', 'Data berhasil dihapus!');
            } catch (QueryException | Exception | PDOException $error) {
                $this->failResponse($error->getMessage(), $error->getCode());
            }
        }
    }
}
