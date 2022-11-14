<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PengajuanBahanController;
use App\Http\Controllers\BahanPengajuanController;
use App\Http\Controllers\PengajuanLayananController;
use App\Http\Controllers\VerifikasiLayananController;
use App\Http\Controllers\VerifikasiBahanController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

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


Route::get('/',[LoginController::class, 'showFormLogin'])->middleware('guest')->name('login');

Route::post('/',[LoginController::class, 'authenticate']);

Route::get('/dashboard', [LoginController::class, 'dashboard'])->middleware('auth');

Route::get('signOut', [LoginController::class, 'signOut'])->name('signOut');

Route::resource('layanan', LayananController::class)->middleware('auth', 'role:subag, kepala');
Route::resource('pengajuanBahan', PengajuanBahanController::class)->middleware('auth', 'role:analis, kepala');
Route::resource('pengajuanLayanan', PengajuanLayananController::class)->middleware('auth','role:verifikator,subag,analis, kepala');
Route::resource('user', UserController::class)->middleware('auth', 'role:subag, kepala');
Route::resource('bahan', BahanController::class)->middleware('auth', 'role:subag, kepala');
Route::resource('verifikasiBahan', VerifikasiBahanController::class)->middleware('auth');
Route::resource('verifikasiLayanan', VerifikasiLayananController::class)->middleware('auth');
Route::resource('bahanPengajuan', BahanPengajuanController::class)->middleware('auth');

Route::prefix('laporan')->group(function(){
    Route::get('/pdfUser', [ReportController::class, 'pdfUser']);
    Route::get('/pdfBahan', [ReportController::class, 'pdfBahan']);
    Route::get('/pdfLayanan', [ReportController::class, 'pdfLayanan']);
    Route::get('/pdfPengajuanBahan', [ReportController::class, 'pdfPengajuanBahan']);
    Route::get('/pdfPengajuanLayanan', [ReportController::class, 'pdfPengajuanLayanan']);
});



Route::prefix('verifikasi')->group(function(){
    Route::get('/index', [VerifikasiController::class, 'index']);
    Route::post('/tolakpb/{id}', [VerifikasiController::class, 'tolakpb']);
    Route::post('/tolakpl/{id}', [VerifikasiController::class, 'tolakpl']);
    Route::post('/fetch_data', [VerifikasiController::class, 'fetch_data']);
});

    Route::prefix('pengajuanLayanan')->group(function(){
        Route::get('/create', [PengajuanLayananController::class, 'create']);
        Route::post('/store', [PengajuanLayananController::class, 'store']);
        Route::post('/update/{id}', [PengajuanLayananController::class, 'update']);
        Route::post('/fetch', [PengajuanLayananController::class, 'parameter']);
        Route::post('/fetch/bahan', [PengajuanLayananController::class, 'bahan']);
        Route::get('/autocomplete', [PengajuanLayananController::class, 'autocomplete']);
    });


Route::get('/contact', function () {
    return view('auth/contact');
});

Route::get('/about', function () {
    return view('auth/about');
});

Route::get('/cetak', function () {
    return view('bahan/cetak');
});

Route::get('/home', function () {
    return view('auth/login');
});



Route::get('/pengujian', function () {
    return view('auth/layanan/layanan');
});

Route::get('/sarana', function () {
    return view('auth/layanan/sarana');
});