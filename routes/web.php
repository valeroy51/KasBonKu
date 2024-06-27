<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BuktiBayarController;
use App\Http\Controllers\PermintaanController;


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
Auth::routes(['verify' => true]);

Route::GET('/', [PermintaanController::class, 'first'])->name('home');

Route::GET('/userProfile/{hashedEmail}', [SiswaController::class, 'profile'])->name('userProfile');
Route::put('/userProfile/profileStore/{hashedEmail}', [SiswaController::class, 'profileStore'])->name('profileStore');

Route::middleware(['verified'])->group(function () {
    Route::GET('/home', [PermintaanController::class, 'first'])->name('home');

    Route::prefix('siswa')->name('siswa.')->group(function () {
        Route::get('/{hashedEmail}', [SiswaController::class, 'index'])->name('index');
        Route::GET('/create', [SiswaController::class, 'create'])->name('create');
        Route::GET('/edit/{id}', [SiswaController::class, 'edit'])->name('edit');
        Route::POST('/store', [SiswaController::class, 'store'])->name('store');
        Route::PUT('/update/{hashedEmail}', [SiswaController::class, 'update'])->name('update');
        Route::DELETE('/destroy/{id}', [SiswaController::class, 'destroy'])->name('destroy');
    });


    Route::prefix('buktiBayar')->name('buktiBayar.')->group(function () {
        Route::GET('/', [BuktiBayarController::class, 'index'])->name('index');
        Route::GET('/create', [BuktiBayarController::class, 'create'])->name('create');
        Route::POST('/confirm/{id}', [BuktiBayarController::class, 'confirm'])->name('confirm');
        Route::POST('/store', [BuktiBayarController::class, 'store'])->name('store');
        Route::PUT('/update/{id}', [BuktiBayarController::class, 'update'])->name('update');
        Route::DELETE('/destroy/{id}', [PermintaanController::class, 'destroy'])->name('destroy');
        Route::post('/reject/{id}', [BuktiBayarController::class, 'reject'])->name('reject');
    });

    Route::prefix('permintaan')->name('permintaan.')->group(function () {
        Route::GET('/', [PermintaanController::class, 'index'])->name('index');
        Route::GET('/create', [PermintaanController::class, 'create'])->name('create');
        Route::POST('/confirm/{id}', [PermintaanController::class, 'confirm'])->name('confirm');
        Route::POST('/store', [PermintaanController::class, 'store'])->name('store');
        Route::PUT('/update/{id}', [PermintaanController::class, 'update'])->name('update');
        Route::DELETE('/destroy/{id}', [PermintaanController::class, 'destroy'])->name('destroy');
        Route::GET('/search', [PermintaanController::class, 'search'])->name('search');
        Route::GET('/filter', [PermintaanController::class, 'filter'])->name('filter');
    });

});
