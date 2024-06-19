<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BuktiBayarController;
use App\Http\Controllers\BarangController;

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

// Route::GET('/', function () {
//     return view('welcome');
// });

// Route::GET('/', [homeController::class, 'index']);
// Route::GET('/register', [homeController::class, 'register']);
// Route::GET('/login', [homeController::class, 'login']);

Auth::routes(['verify' => true]);

Route::GET('/', [Controller::class, 'first'])->name('home');

// Route::middleware(['verified'])->group(function () {
//     Route::GET('/home', [HomeController::class, 'index'])->name('home');

//     Route::prefix('siswa')->name('siswa.')->group(function () {
//         Route::GET('/', [SiswaController::class, 'index'])->name('siswa');
//         Route::GET('/create', [SiswaController::class, 'create'])->name('siswa.create');
//         Route::GET('/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
//         Route::POST('/store', [SiswaController::class, 'store'])->name('siswa.store');
//         Route::PUT('/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
//         Route::DELETE('/destroy/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
//     });
//     Route::prefix('buktiBayar')->name('buktiBayar.')->group(function () {
//         Route::GET('/', [BuktiBayarController::class, 'index'])->name('buktiBayar');
//         Route::GET('/create', [BuktiBayarController::class, 'create'])->name('buktiBayar.create');
//         Route::GET('/confirm/{id}', [BuktiBayarController::class, 'confirm'])->name('buktiBayar.confirm');
//         Route::POST('/store', [BuktiBayarController::class, 'store'])->name('buktiBayar.store');
//         Route::PUT('/update/{id}', [BuktiBayarController::class, 'update'])->name('buktiBayar.update');
//         Route::DELETE('/destroy/{id}', [BuktiBayarController::class, 'destroy'])->name('buktiBayar.destroy');
//     });
//     Route::prefix('barang')->name('barang.')->group(function () {
//         Route::GET('/', [BarangController::class, 'index'])->name('barang');
//         Route::GET('/create', [BarangController::class, 'create'])->name('barang.create');
//         Route::POST('/store', [BarangController::class, 'store'])->name('barang.store');
//     });
// });
Route::middleware(['verified'])->group(function () {
    Route::GET('/home', [HomeController::class, 'index'])->name('home');
    
    Route::GET('/siswa', [SiswaController::class, 'index'])->name('siswa');
    Route::GET('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::GET('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::POST('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::PUT('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::DELETE('/siswa/destroy/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    Route::GET('/barang', [BarangController::class, 'index'])->name('barang');
    Route::GET('/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::POST('/barang/store', [BarangController::class, 'store'])->name('barang.store');
    Route::GET('/buktiBayar', [BuktiBayarController::class, 'index'])->name('buktiBayar');
    Route::GET('/buktiBayar/create', [BuktiBayarController::class, 'create'])->name('buktiBayar.create');
    Route::GET('/buktiBayar/confirm/{id}', [BuktiBayarController::class, 'confirm'])->name('buktiBayar.confirm');
    Route::POST('/buktiBayar/store', [BuktiBayarController::class, 'store'])->name('buktiBayar.store');
    Route::PUT('/buktiBayar/update/{id}', [BuktiBayarController::class, 'update'])->name('buktiBayar.update');
    Route::DELETE('/buktiBayar/destroy/{id}', [BuktiBayarController::class, 'destroy'])->name('buktiBayar.destroy');
});
