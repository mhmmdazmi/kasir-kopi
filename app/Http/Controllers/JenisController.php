<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJenisRequest;
use App\Http\Requests\UpdateJenisRequest;
use App\Models\Jenis;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index()
    {
        return view('jenis.index', [
            'jenis' => Jenis::latest()->get()
        ]);
      
    }

    public function store(StoreJenisRequest $request)
    {
        Jenis::create($request->all());
        return redirect('jenis')->with('success', "Input jenis makanan berhasil");
    }
    public function update(UpdateJenisRequest $request,  $jenis)
    {
        $jenis = Jenis::findOrFail($jenis);

        $jenis->update($request->all());

        return redirect('jenis')->with('success', "Update Data Berhasil!");
    }
    public function destroy(Jenis $jenis, $id) {
        // Lakukan validasi dan verifikasi penghapusan data
        $data = Jenis::find($id);
        // Lakukan proses penghapusan data
        $deleted = $data->delete();
    
        if ($deleted) {
            return redirect('jenis')->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect('jenis')->with('success', 'Data gagal dihapus!');
        }
    }
    
}
