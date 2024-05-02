<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\ProdukTitipanController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TransaksiController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');
// Route::get('/', function () {
//     return redirect()->route('login'); // Redirect ke halaman login
// });
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('auth');
Route::post('/logout', [AuthController::class, 'showLoginForm'])->name('logout')->middleware('auth');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/logout', [AuthController::class, 'showLoginForm'])->name('logout');
Route::get('tentang', [HomeController::class, 'tentang']);
Route::get('sejarah', [HomeController::class, 'sejarah']);
Route::get('layanan', [HomeController::class, 'layanan']);
Route::get('contact', [HomeController::class, 'contact']);
Route::get('grafik', [DataController::class, 'index']);
Route::get('nota/{nofaktur}', [TransaksiController::class, 'faktur']);
Route::resource('karyawan', KaryawanController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('jenis', JenisController::class);
Route::resource('menu', MenuController::class);
Route::resource('pemesanan', PemesananController::class);
Route::resource('transaksi', TransaksiController::class);
Route::resource('stok', StokController::class);
Route::resource('produk_titipan', ProdukTitipanController::class);
Route::post('/hitung-harga-jual', [ProdukTitipanController::class, 'hitungHargaJual']);
Route::post('/produk_titipan/{id}', [ProdukTitipanController::class, 'updateStok']);
Route::post('contact/submit', [ContactUsController::class, 'submitForm'])->name('contact.submit');
Route::post('/kurangi-stok-menu', 'MenuController@kurangiStokMenu');
Route::resource('absensi', AbsensiController::class);

