<?php

use App\Http\Controllers\coba;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\samkev;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\Katagori_BarangController;
use App\Http\Controllers\Mutasi_StokController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\Stok_BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\GudangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::resource('barang', BarangController::class);
Route::resource('gudang', GudangController::class);
Route::resource('katagori-barang', Katagori_BarangController::class);
Route::resource('mutasi-stok', Mutasi_StokController::class);
Route::resource('outlet', OutletController::class);
Route::resource('pegawai', PegawaiController::class);
Route::resource('pengguna', PenggunaController::class);
Route::resource('pengiriman', PengirimanController::class);
Route::resource('stok-barang', Stok_BarangController::class);
Route::resource('supplier', SupplierController::class);
Route::resource('transaksi', TransaksiController::class);

Route::get('print-stok', [Stok_BarangController::class, 'print']);
Route::get('print-kategori-barang', [Katagori_BarangController::class, 'print']);
Route::get('print-gudang', [GudangController::class, 'print']);
Route::get('print-outlet', [OutletController::class, 'print']);
Route::get('print-pengguna', [PenggunaController::class, 'print']);
Route::get('print-barang', [BarangController::class, 'print']);
Route::get('print-mutasi', [Mutasi_StokController::class, 'print']);
Route::get('print-pegawai', [PegawaiController::class, 'print']);
Route::get('print-pengiriman', [PengirimanController::class, 'print']);
Route::get('print-supplier', [SupplierController::class, 'print']);
Route::get('print-transaksi', [TransaksiController::class, 'print']);


