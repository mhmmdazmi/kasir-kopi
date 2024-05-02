<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePemesananRequest;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Jenis;

class PemesananController extends Controller
{
    public function index()
    {
        $data['jenis'] = Jenis::with('menu')->get();

        return view('pemesanan.index')->with($data);
    }
    public function store(StorePemesananRequest $request)
    {
        Pemesanan::create($request->all());
        return redirect('pemesanan')->with('success', "Input data barang berhasil");
    }
}
