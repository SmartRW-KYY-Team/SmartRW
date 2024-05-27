<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\DomisiliController;
use App\Http\Controllers\SKTMController;
use App\Http\Controllers\wargaController;
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

Route::get('/domisili', [DomisiliController::class, 'index'])->name('domisili.index');
Route::post('/domisili', [DomisiliController::class, 'store'])->name('domisili.store');
Route::post('/domisili/accept/{id}', [DomisiliController::class, 'accept'])->name('domisili.accept');
Route::get('/domisili/{id}/show', [DomisiliController::class, 'show'])->name('domisili.show');

Route::get('/sktm', [SKTMController::class, 'index'])->name('sktm.index');
Route::post('/sktm', [SKTMController::class, 'store'])->name('sktm.store');
Route::post('/sktm/accept/{id}', [SKTMController::class, 'accept'])->name('sktm.accept');
Route::get('/sktm/{id}/show', [SKTMController::class, 'show'])->name('sktm.show');
