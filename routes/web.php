<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\wargaController;
use App\Http\Controllers\PengaduanController;
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

Route::get('/kegiatan', [KegiatanController::class, 'index']);
