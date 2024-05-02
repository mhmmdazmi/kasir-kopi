<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAbsensiRequest;
use App\Http\Requests\UpdateAbsensiRequest;
use App\Models\Absensi;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        return view('absensi.index', [
            'absensi' => Absensi::latest()->get()
        ]);
    }
    public function store(StoreAbsensiRequest $request)
    {
        Absensi::create($request->all());
        return redirect('absensi')->with('success', "Input data barang berhasil");
    }
    public function update(UpdateAbsensiRequest $request, Absensi $absensi)
    {
        // $absensi->update($request->all());

        // return redirect('absensi')->with('success', "Update Data Berhasil!");

        $absensi->update($request->all());
        return response()->json(['result' => $absensi]);
    }
    public function destroy(Absensi $absensi)
    { {
            try {
                $absensi->delete();
                return redirect('absensi')->with('success', 'Data berhasil dihapus!');
            } catch (QueryException | Exception | PDOException $error) {
                $this->failResponse($error->getMessage(), $error->getCode());
            }
        }
    }
    public function updateStatus(Absensi $absensi, $id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->status = $absensi->status;
        $absensi->save();

        return response()->json(['success' => 'status updated successfully'], 200);
    }
}
