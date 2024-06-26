<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\DomisiliController;
use App\Http\Controllers\SKTMController;
use App\Http\Controllers\wargaController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\KeuanganRTController;
use App\Http\Controllers\RTController;
use App\Http\Controllers\KeuanganRWController;
use App\Http\Controllers\BansosController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\KeuanganWargaRTController;
use App\Http\Controllers\KeuanganWargaRWController;
use App\Http\Controllers\KriteriaBansosController;
use App\Http\Controllers\LandingPageController;
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


Route::get('/', [LandingPageController::class, 'viewHome1'])->name('landing_page');

Route::get('/pengaduan_page', [LandingPageController::class, 'viewPengaduanWarga'])->name('pengaduan_page');
Route::post('/pengaduan_page', [LandingPageController::class, 'createPengaduanWarga'])->name('pengaduan_page_create');

Route::get('/domisili_warga', [LandingPageController::class, 'viewDomisiliWarga'])->name('domisili_page');
Route::post('/domisili_warga', [LandingPageController::class, 'createDomisiliWarga'])->name('domisili_page_create');

Route::get('/sktm_warga', [LandingPageController::class, 'viewSktmWarga'])->name('sktm_page');
Route::post('/sktm_warga', [LandingPageController::class, 'createSktmWarga'])->name('sktm_page_create');

Route::get('/kegiatan_warga', [LandingPageController::class, 'showKegiatanWarga'])->name('kegiatan_page');

Route::get('/keuangan_warga', function () {
    return view('keuangan_page');
})->name('keuangan_page');

Route::get('/cek_sktm', function () {
    return view('cek_sktm_page');
})->name('cek_sktm_page');

Route::get('/cek_domisili', function () {
    return view('cek_domisili_page');
})->name('cek_domisili_page');

Route::get('/cek_status_sktm/{nik}/cek_status', [LandingPageController::class, 'cekStatusSktm'])->name('cek_status_sktm');
Route::get('/cek_status_domisili/{nik}', [LandingPageController::class, 'cekStatusDomisili'])->name('cek_status_domisili');

Route::get('/suratdomisili-pdf/{id}', [LandingPageController::class, 'generatePDFDomisili']);
Route::get('/suratsktm-pdf/{id}', [LandingPageController::class, 'generatePDFSktm']);

Route::prefix('keuanganWarga')->name('keuanganWarga.')->group(function () {
    Route::get('/rt', [KeuanganWargaRTController::class, 'index'])->name('rt.index');
    Route::get('/rw', [KeuanganWargaRWController::class, 'index'])->name('rw.index');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth', 'device.check')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});

Route::middleware(['device.check'])->group(function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.post');
    });
});
Route::get('/device-warning', function () {
    return view('device-warning');
})->name('device.warning');


Route::middleware('auth', 'device.check')->prefix('warga')->name('warga.')->group(function () {
    Route::get('/', [wargaController::class, 'index'])->name('index');
    Route::get('/create', [wargaController::class, 'create'])->name('create');
    Route::post('/store', [wargaController::class, 'store'])->name('store');
    Route::delete('/{id}/destroy', [wargaController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/edit', [wargaController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [wargaController::class, 'update'])->name('update');
    Route::get('/{id}/show', [wargaController::class, 'show'])->name('show');
});

Route::middleware('auth', 'device.check')->prefix('keluarga')->name('keluarga.')->group(function () {
    Route::get('/', [KeluargaController::class, 'index'])->name('index');
    Route::get('/create', [KeluargaController::class, 'create'])->name('create');
    Route::post('/store', [KeluargaController::class, 'store'])->name('store');
    Route::delete('/{id}/destroy', [KeluargaController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/edit', [KeluargaController::class, 'edit'])->name('edit');
    Route::get('/{id}/show', [KeluargaController::class, 'show'])->name('show');
    Route::put('/{id}/update', [KeluargaController::class, 'update'])->name('update');
});

Route::middleware('auth', 'device.check')->prefix('pengaduan')->name('pengaduan.')->group(function () {
    Route::get('/', [PengaduanController::class, 'index'])->name('index');
    Route::get('/create', [PengaduanController::class, 'create'])->name('create');
    Route::post('/', [PengaduanController::class, 'store'])->name('store');
    Route::post('/{id}/destroy', [PengaduanController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/show', [PengaduanController::class, 'show'])->name('show');
    Route::post('/{id}/update', [PengaduanController::class, 'update'])->name('update');
});


Route::middleware('auth', 'device.check')->prefix('kegiatan')->name('kegiatan.')->group(function () {
    Route::get('/', [KegiatanController::class, 'index'])->name('index');
    Route::get('/create', [KegiatanController::class, 'create'])->name('create');
    Route::post('/', [KegiatanController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [KegiatanController::class, 'edit'])->name('edit');
    Route::get('/{id}/show', [KegiatanController::class, 'show'])->name('show');
    Route::post('/{id}/update', [KegiatanController::class, 'update'])->name('update');
    Route::delete('/{id}/destroy', [KegiatanController::class, 'destroy'])->name('destroy');
});

Route::middleware('auth', 'device.check')->prefix('domisili')->name('domisili.')->group(function () {
    Route::get('/', [DomisiliController::class, 'index'])->name('index');
    Route::post('/', [DomisiliController::class, 'store'])->name('store');
    Route::post('/accept/{id}', [DomisiliController::class, 'accept'])->name('accept');
    Route::get('/{id}/show', [DomisiliController::class, 'show'])->name('show');
});

Route::middleware('auth', 'device.check')->prefix('sktm')->name('sktm.')->group(function () {
    Route::get('/', [SKTMController::class, 'index'])->name('index');
    Route::post('/', [SKTMController::class, 'store'])->name('store');
    Route::post('/accept/{id}', [SKTMController::class, 'accept'])->name('accept');
    Route::get('/{id}/show', [SKTMController::class, 'show'])->name('show');
});

Route::middleware('auth', 'device.check')->prefix('keuanganrt')->name('keuanganrt.')->group(function () {
    Route::get('/', [KeuanganRTController::class, 'index'])->name('index')->middleware('rt');
    Route::post('/', [KeuanganRTController::class, 'store'])->name('store');
    Route::post('{id}/destroy', [KeuanganRTController::class, 'destroy'])->name('destroy');
    Route::get('{id}/edit', [KeuanganRTController::class, 'edit'])->name('edit');
    Route::post('{id}/update', [KeuanganRTController::class, 'update'])->name('update');
})->middleware(RTMiddleware::class);

Route::middleware('auth', 'device.check')->prefix('keuanganrw')->name('keuanganrw.')->group(function () {
    Route::get('/', [KeuanganRWController::class, 'index'])->name('index')->middleware('rw');
    Route::post('/', [KeuanganRWController::class, 'store'])->name('store');
    Route::post('{id}/destroy', [KeuanganRWController::class, 'destroy'])->name('destroy');
    Route::get('{id}/edit', [KeuanganRWController::class, 'edit'])->name('edit');
    Route::post('{id}/update', [KeuanganRWController::class, 'update'])->name('update');
})->middleware(RWMiddleware::class);

Route::middleware(['auth', 'device.check'])->group(function () {
    Route::get('/kriteriabansos', [KriteriaBansosController::class, 'index'])->name('kriteriabansos.index');
});

Route::middleware('auth', 'device.check')->prefix('bansos')->name('bansos.')->group(function () {
    Route::get('/', [BansosController::class, 'index'])->name('index');
    Route::get('/create', [BansosController::class, 'create'])->name('create');
    Route::post('/', [BansosController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [BansosController::class, 'edit'])->name('edit');
    Route::post('{id}/update', [BansosController::class, 'update'])->name('update');
    Route::get('/process', [BansosController::class, 'process'])->name('process');
    Route::delete('/{id}', [BansosController::class, 'delete'])->name('delete');
});

Route::middleware('auth', 'device.check')->prefix('rt')->name('rt.')->group(function () {
    Route::get('/', [RTController::class, 'index'])->name('index')->middleware('rw');
    Route::get('{id}/edit', [RTController::class, 'edit'])->name('edit')->middleware('rw');
    Route::post('{id}/update', [RTController::class, 'update'])->name('update')->middleware('rw');
})->middleware(RWMiddleware::class);
