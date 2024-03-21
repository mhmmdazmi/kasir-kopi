<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Http\Requests\StoreKaryawanRequest;
use App\Http\Requests\UpdateKaryawanRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class KaryawanController extends Controller
{
    public function index()
    {
        return view('karyawan.index', [
            'karyawan' => Karyawan::latest()->get()
        ]);
    }
    public function store(StoreKaryawanRequest $request)
    {
        Karyawan::create($request->all());
        return redirect('karyawan')->with('success', "Input data barang berhasil");
    }

    public function edit(Karyawan $request)
    {
        
    }
    
    public function update(UpdateKaryawanRequest $request, Karyawan $karyawan)
    {
        $karyawan->update($request->all());

        return redirect('karyawan')->with('success', "Update Data Berhasil!");
    }
    public function destroy(Karyawan $karyawan)
    { {
            try {
                $karyawan->delete();
                return redirect('karyawan')->with('success', 'Data berhasil dihapus!');
            } catch (QueryException | Exception | PDOException $error) {
                $this->failResponse($error->getMessage(), $error->getCode());
            }
        }
    }
}
