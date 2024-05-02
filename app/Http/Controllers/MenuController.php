<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Menu;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PDOException;

class MenuController extends Controller
{
    public function index()
    {
        return view('menu.index', [
            'menu' => Menu::latest()->get()
        ]);
    }

    public function store(StoreMenuRequest $request)
    {
        Menu::create($request->all());
        return redirect('menu')->with('success', "Input menu makanan berhasil");
    }
    public function update(UpdateMenuRequest $request,  $menu)
    {
        $menu = Menu::findOrFail($menu);

        $menu->update($request->all());

        return redirect('menu')->with('success', "Update Data Berhasil!");
    }
    public function destroy(Menu $menu)
    { {
            try {
                $menu->delete();
                return redirect('menu')->with('success', 'Data berhasil dihapus!');
            } catch (QueryException | Exception | PDOException $error) {
                $this->failResponse($error->getMessage(), $error->getCode());
            }
        }
    }
    public function kurangiStokMenu(Request $request)
{
    $id_menu = $request->input('id_menu');
    $qty_pemesanan = $request->input('qty_pemesanan');

    // Lakukan pengurangan stok menu di sini, contoh:
    $menu = Menu::find($id_menu);
    if ($menu) {
        $menu->qty -= $qty_pemesanan;
        $menu->save();
        return response()->json(['message' => 'Stok menu berhasil dikurangi'], 200);
    } else {
        return response()->json(['message' => 'Menu tidak ditemukan'], 404);
    }
}
}
