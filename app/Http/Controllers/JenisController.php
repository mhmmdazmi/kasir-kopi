<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJenisRequest;
use App\Http\Requests\UpdateJenisRequest;
use App\Models\Jenis;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;
use Illuminate\Http\Request;

class jenisController extends Controller
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
    public function destroy(Jenis $jenis)
    { {
            try {
                $jenis->delete();
                return redirect('jenis')->with('success', 'Data berhasil dihapus!');
            } catch (QueryException | Exception | PDOException $error) {
                $this->failResponse($error->getMessage(), $error->getCode());
            }
        }
    }
}
