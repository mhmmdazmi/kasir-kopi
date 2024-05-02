<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class PelangganController extends Controller
{
    public function index()
    {
        return view('pelanggan.index', [
            'pelanggan' => Pelanggan::latest()->get()
        ]);
    }
    public function store(StorePelangganRequest $request)
    {
        Pelanggan::create($request->all());
        return redirect('pelanggan')->with('success', "Input data barang berhasil");
    }

    public function edit(Pelanggan $request)
    {
        
    }
    
    public function update(UpdatePelangganRequest $request, Pelanggan $pelanggan)
    {
        $pelanggan->update($request->all());

        return redirect('pelanggan')->with('success', "Update Data Berhasil!");
    }
    public function destroy(Pelanggan $pelanggan)
    { {
            try {
                $pelanggan->delete();
                return redirect('Pelanggan')->with('success', 'Data berhasil dihapus!');
            } catch (QueryException | Exception | PDOException $error) {
                $this->failResponse($error->getMessage(), $error->getCode());
            }
        }
    }
}
