<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(){
        $menu = Menu::get();
        $data['count_menu'] = $menu->count();

        //tampilkan 10 data pelanggan terakhir
        $data['pelanggan'] = Pelanggan::limit(10)->orderBy
        ('created_at', 'desc')->get();


        return view('data.data')->with($data);
    }
}
