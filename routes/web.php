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
use App\Http\Middleware\RTMiddleware;
use App\Http\Middleware\RWMiddleware;
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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('warga')->name('warga.')->group(function () {
    Route::get('/', [wargaController::class, 'index'])->name('index');
    Route::get('/create', [wargaController::class, 'create'])->name('create');
    Route::post('/store', [wargaController::class, 'store'])->name('store');
    Route::post('/{id}/destroy', [wargaController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/edit', [wargaController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [wargaController::class, 'update'])->name('update');
});

Route::middleware('auth')->prefix('pengaduan')->name('pengaduan.')->group(function () {
    Route::get('/index', [PengaduanController::class, 'index'])->name('index');
    Route::get('/create', [PengaduanController::class, 'create'])->name('create');
    Route::post('/', [PengaduanController::class, 'store'])->name('store');
    Route::post('/{id}/destroy', [PengaduanController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/show', [PengaduanController::class, 'show'])->name('show');
    Route::post('/{id}/update', [PengaduanController::class, 'update'])->name('update');
});


Route::middleware('auth')->prefix('kegiatan')->name('kegiatan.')->group(function () {
    Route::get('/', [KegiatanController::class, 'index'])->name('index');
    Route::get('/create', [KegiatanController::class, 'create'])->name('create');
    Route::post('/', [KegiatanController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [KegiatanController::class, 'edit'])->name('edit');
    Route::get('/{id}/show', [KegiatanController::class, 'show'])->name('show');
    Route::post('/{id}/update', [KegiatanController::class, 'update'])->name('update');
    Route::delete('/{id}/destroy', [KegiatanController::class, 'destroy'])->name('destroy');
});

Route::middleware('auth')->prefix('domisiili')->name('domisiili.')->group(function () {
    Route::get('/', [DomisiliController::class, 'index'])->name('index');
    Route::post('/', [DomisiliController::class, 'store'])->name('store');
    Route::post('/accept/{id}', [DomisiliController::class, 'accept'])->name('accept');
    Route::get('/{id}/show', [DomisiliController::class, 'show'])->name('show');
});

Route::middleware('auth')->prefix('sktm')->name('sktm.')->group(function () {
    Route::get('/', [SKTMController::class, 'index'])->name('index');
    Route::post('/', [SKTMController::class, 'store'])->name('store');
    Route::post('/accept/{id}', [SKTMController::class, 'accept'])->name('accept');
    Route::get('/{id}/show', [SKTMController::class, 'show'])->name('show');
});

Route::middleware('auth')->prefix('keuanganrt')->name('keuanganrt.')->group(function () {
    Route::get('/', [KeuanganRTController::class, 'index'])->name('index')->middleware('rt');
    Route::post('/', [KeuanganRTController::class, 'store'])->name('store');
    Route::post('{id}/destroy', [KeuanganRTController::class, 'destroy'])->name('destroy');
    Route::get('{id}/edit', [KeuanganRTController::class, 'edit'])->name('edit');
    Route::post('{id}/update', [KeuanganRTController::class, 'update'])->name('update');
})->middleware(RTMiddleware::class);

Route::middleware('auth')->prefix('keuanganrw')->name('keuanganrw.')->group(function () {
    Route::get('/', [KeuanganRWController::class, 'index'])->name('index')->middleware('rw');
    Route::post('/', [KeuanganRWController::class, 'store'])->name('store');
    Route::post('{id}/destroy', [KeuanganRWController::class, 'destroy'])->name('destroy');
    Route::get('{id}/edit', [KeuanganRWController::class, 'edit'])->name('edit');
    Route::post('{id}/update', [KeuanganRWController::class, 'update'])->name('update');
})->middleware(RWMiddleware::class);

Route::middleware('auth')->prefix('bansos')->name('bansos.')->group(function () {
    Route::get('/', [BansosController::class, 'index'])->name('index');
});

Route::get('/kriteriabansos', [KriteriaBansosController::class, 'index']);

Route::prefix('bansos')->name('bansos.')->group(function () {
    Route::get('/', [BansosController::class, 'index'])->name('index');
});