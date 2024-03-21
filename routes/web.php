<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeControll;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\ProdukTitipanController;
use App\Http\Controllers\MenuController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('tentang', [HomeController::class, 'tentang']);
Route::get('sejarah', [HomeController::class, 'sejarah']);
Route::get('layanan', [HomeController::class, 'layanan']);
Route::resource('karyawan', KaryawanController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('jenis', JenisController::class);
Route::resource('produk_titipan', ProdukTitipanController::class);
Route::post('/hitung-harga-jual', 'ProdukTitipanController@hitungHargaJual');
Route::post('/produk_titipan/{id}', 'ProdukTitipanController@updateStok');
Route::controller(PemesananController::class)->prefix('pemesanan')->group(function () {
    Route::get('', 'index')->name('pemesanan');
});
Route::controller(MenuController::class)->prefix('menu')->group(function () {
    Route::get('', 'index')->name('menu');
});
