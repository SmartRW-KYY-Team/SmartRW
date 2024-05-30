<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\DomisiliController;
use App\Http\Controllers\SKTMController;
use App\Http\Controllers\wargaController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\keuanganRTController;
use App\Http\Controllers\keuanganRWController;
use App\Http\Controllers\BansosController;
use App\Http\Controllers\KriteriaBansosController;
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

Route::prefix('warga')->name('warga.')->group(function () {
    Route::get('/', [wargaController::class, 'index'])->name('index');
    Route::get('/create', [wargaController::class, 'create'])->name('create');
    Route::post('/store', [wargaController::class, 'store'])->name('store');
    Route::post('/{id}/destroy', [wargaController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/edit', [wargaController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [wargaController::class, 'update'])->name('update');
});

Route::get('/pengaduan-index', [PengaduanController::class, 'index'])->name('pengaduan.index');
Route::get('/pengaduan-create', [PengaduanController::class, 'create'])->name('pengaduan.create');
Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
Route::post('/pengaduan/{id}/destroy', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');
Route::get('/pengaduan/{id}/show', [PengaduanController::class, 'show'])->name('pengaduan.show');
Route::post('/pengaduan/{id}/update', [PengaduanController::class, 'update'])->name('pengaduan.update');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.post');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('kegiatan')->name('kegiatan.')->group(function () {
    Route::get('/', [KegiatanController::class, 'index'])->name('index');
    Route::get('/create', [KegiatanController::class, 'create'])->name('create');
    Route::post('/', [KegiatanController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [KegiatanController::class, 'edit'])->name('edit');
    Route::get('/{id}/show', [KegiatanController::class, 'show'])->name('show');
    Route::post('/{id}/update', [KegiatanController::class, 'update'])->name('update');
    Route::delete('/{id}/destroy', [KegiatanController::class, 'destroy'])->name('destroy');
});

Route::get('/domisili', [DomisiliController::class, 'index'])->name('domisili.index');
Route::post('/domisili', [DomisiliController::class, 'store'])->name('domisili.store');
Route::post('/domisili/accept/{id}', [DomisiliController::class, 'accept'])->name('domisili.accept');
Route::get('/domisili/{id}/show', [DomisiliController::class, 'show'])->name('domisili.show');

Route::get('/sktm', [SKTMController::class, 'index'])->name('sktm.index');
Route::post('/sktm', [SKTMController::class, 'store'])->name('sktm.store');
Route::post('/sktm/accept/{id}', [SKTMController::class, 'accept'])->name('sktm.accept');
Route::get('/sktm/{id}/show', [SKTMController::class, 'show'])->name('sktm.show');

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

Route::get('/kriteriabansos', [KriteriaBansosController::class, 'index']);

Route::prefix('bansos')->name('bansos.')->group(function () {
    Route::get('/', [BansosController::class, 'index'])->name('index');
});
