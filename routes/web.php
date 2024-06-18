<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BuktiBayarController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [homeController::class, 'index']);
// Route::get('/register', [homeController::class, 'register']);
// Route::get('/login', [homeController::class, 'login']);

Auth::routes();

Route::get('/', [HomeController::class, 'first'])->name('home');
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
Route::get('/bukti_bayar', [BuktiBayarController::class, 'index'])->name('bukti_bayar') ;


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::put('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/destroy/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    Route::get('/payment', [HomeController::class, 'payment'])->name('payment');
    Route::get('/request', [HomeController::class, 'request'])->name('request');

    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::get('/barang', [BarangController::class, 'index'])->name('barang');

    Route::get('/bukti_bayar/payment', [BuktiBayarController::class, 'payment'])->name('bukti_bayar.payment');
    Route::get('/bukti_bayar/confirm/{id}', [BuktiBayarController::class, 'confirm'])->name('bukti_bayar.confirm');
    Route::post('/bukti_bayar/store', [BuktiBayarController::class, 'store'])->name('bukti_bayar.store');
    Route::put('/bukti_bayar/update/{id}', [BuktiBayarController::class, 'update'])->name('bukti_bayar.update');
    Route::delete('/bukti_bayar/destroy/{id}', [BuktiBayarController::class, 'destroy'])->name('bukti_bayar.destroy');

});
