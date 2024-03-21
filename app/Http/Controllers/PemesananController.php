<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Jenis;

class PemesananController extends Controller
{
    public function index()
    {
        $data['jenis'] = Jenis::with(['menu'])->get();
        dd($data['jenis']);
        
        return view('pemesanan.index')->with($data);
    }
}
