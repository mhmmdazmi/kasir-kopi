<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function store (Transaksi $request)
    {
        try {
        DB:: beginTransaction();
        $last_id = Transaksi :: where('tanggal', date('Y-m-d'))->orderBy('created_at', 'desc')->select('id')->first();
        $notrans = $last_id = null ? date('Ymd').'0001' : date('Ymd').sprintf('%04d', substr($last_id->id,8,4)+1); // dd($notrans);
        $insertTransaksi = Transaksi::create([
            'id' => $notrans,
            'tanggal' => date('Y-m-d'),
            'total_harga' => $request->total,
            'metode pembayaran' => 'cash', 
            'keterangan' => ''
        ]);
        if (!$insertTransaksi->exists) return 'error';
        // input detail transaksi
        foreach ($request->orderedList as $detail) {
        // dd($detail);
        $insertDetailTransaksi = DetailTransaksi ::create([ 
            'transaksi_id' => $notrans,
            'menu_id' => $detail['menu_id'],
            'jumlah' => $detail['qty'],
            'subtotal' => $detail['harga'] * $detail ['qty']
        ]);
        }
        DB::commit();
        return response()->json(['status'=>true, 'message'=>'Pemesanan berhasil!', 'notrans'=> $notrans]);
        } catch (QueryException | Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'Pemesanan gagal!']);
            DB::rollback();
        }
    }
    public function faktur($nofaktur){
        try {
            $data['transaksi'] = Transaksi::where('id', $nofaktur)->with(['detailtransaksi' => function
            ($query){
                $query-with('menu');
            }])->first();

            return view('cetak.faktur')->with($data);   
        } catch (QueryException | Exception | PDOException $e) {
            return response()->json(['status'=>false, 'message'=>'Pemesanan gagal!']);
            DB::rollback();
        }
    }
}