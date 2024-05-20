<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\wargaController;
use App\Http\Controllers\keuanganRTController;
use App\Http\Controllers\keuanganRWController;
use App\Models\Kegiatan;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/warga', [wargaController::class, 'index'])->name('warga.index');
Route::post('/warga', [wargaController::class, 'store'])->name('warga.store');
Route::post('/warga/{id}/destroy', [wargaController::class, 'destroy'])->name('warga.destroy');
Route::get('/warga/{id}/edit', [wargaController::class, 'edit'])->name('warga.edit');
Route::post('/warga/{id}/update', [wargaController::class, 'update'])->name('warga.update');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.post');
});

Route::get('/kegiatan', [KegiatanController::class, 'index']);

Route::prefix('keuanganrt')->name('keuanganrt.')->group(function () {
    Route::get('/', [KeuanganRTController::class, 'index'])->name('index');
    Route::post('/', [KeuanganRTController::class, 'store'])->name('store');
    Route::post('{id}/destroy', [KeuanganRTController::class, 'destroy'])->name('destroy');
    Route::get('{id}/edit', [KeuanganRTController::class, 'edit'])->name('edit');
    Route::post('{id}/update', [KeuanganRTController::class, 'update'])->name('update');
});

Route::prefix('keuanganrw')->name('keuanganrw.')->group(function () {
    Route::get('/', [KeuanganRWController::class, 'index'])->name('index');
    Route::post('/', [KeuanganRWController::class, 'store'])->name('store');
    Route::post('{id}/destroy', [KeuanganRWController::class, 'destroy'])->name('destroy');
    Route::get('{id}/edit', [KeuanganRWController::class, 'edit'])->name('edit');
    Route::post('{id}/update', [KeuanganRWController::class, 'update'])->name('update');
});
