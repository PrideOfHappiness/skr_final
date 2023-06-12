<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\LaporanPenjualanKaryawanController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\PengirimanKaryawanController;
use App\Http\Controllers\RekapPenjualanController;
use App\Http\COntrollers\RekapPengirimanController;
use App\Http\Controllers\BpkbStnkController;
use App\Http\Controllers\GrowthPenjualanController;

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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/login', function() {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function() {
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
    Route::get('/aboutUs', [LogoutController::class, 'aboutUs']);
});

Route::middleware(['Admin'])->group(function() {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('adminHome');
    Route::resource('/admin/karyawan', KaryawanController::class);
    Route::resource('/admin/wilayah', WilayahController::class);
    Route::resource('/admin/gudang', GudangController::class);
    Route::resource('/admin/barang', BarangController::class);
    Route::post('/admin/barang/filter', [BarangController::class, 'filter'])->name('filter');
    Route::get('/barang/imporData', [BarangController::class, 'importDataBarang']);
    Route::get('/barang/allData', [BarangController::class, 'indexAll']);
    Route::post('/barang/imporData/impor', [BarangController::class, 'import'])->name('prosesImpor');
});

Route::middleware(['Karyawan'])->group(function() {
    Route::get('/karyawan/home', [HomeController::class, 'karyawanHome'])->name('karyawanHome');
    Route::get('/karyawan/barangTersedia', [BarangController::class, "indexKaryawan"]);
    Route::get('/karyawan/barangTersedia/{id}', [BarangController::class, "showKaryawan"]);
    Route::post('/karyawan/barangTersedia/filter', [BarangController::class, "filterKaryawan"])->name('filterKry');
    Route::resource('/karyawan/konsumen', KonsumenController::class);
    Route::resource('/karyawan/penjualan', PenjualanController::class);
    Route::get('/penjualan/{id}/downloadFJ', [PenjualanController::class, 'download']);
    Route::resource('/karyawan/pengiriman', PengirimanController::class);
    Route::get('pengiriman/{id}/downloadSJ', [PengirimanController::class, 'download']);
    Route::get('pengiriman/{id}/ubahStatusPengiriman', [PengirimanController::class, 'ubahPengiriman']);
    Route::resource('/karyawan/bpkbstnk', BpkbStnkController::class);
    Route::post('/bpkbstnk/downloadSPSTNK/{id}', [BpkbStnkController::class, "downloadStnk"])->name('downloadSPSTNK');
    Route::post('/bpkbstnk/downloadSPBPKB/{id}', [BpkbStnkController::class, "downloadBpkb"])->name('downloadSPBPKB');
});

Route::middleware(['Pemilik'])->group(function() {
    Route::get('/pemilik/home', [HomeController::class, 'pemilikHome'])->name('pemilikHome');
    Route::get('/pemilik/laporanPenjualan/sepedaMotor/ambilData', [LaporanPenjualanController::class, "pickData"])->name('ambilDataSPM');
    Route::post('/pemilik/laporanPenjualan/sepedaMotor/proses', [LaporanPenjualanController::class, "prosesTanggalSepedaMotor"])->name("prosesSPM");
    Route::get('/pemilik//laporanPenjualan/karyawan/ambilData', [LaporanPenjualanKaryawanController::class, "pickData"])->name('ambilDataKRY');
    Route::post('/pemilik/laporanPenjualan/karyawan/proses', [LaporanPenjualanKaryawanController::class, "prosesTanggalKaryawan"])->name("prosesKRY");
    Route::get('/pemilik/rekapPenjualan/ambilData', [RekapPenjualanController::class, "pickData"])->name('ambilTglRekapPjl');
    Route::post('/pemilik/rekapPenjualan/proses', [RekapPenjualanController::class, "hasil"])->name('hasilRekapPjl');
    Route::get('/pemilik/rekapPengiriman/ambilDataPgr', [RekapPengirimanController::class, "pickData"])->name('ambilTglRekapPgr');
    Route::post('/pemilik/rekapPengiriman/prosesPgr', [RekapPengirimanController::class, "hasil"])->name('hasilRekapPgr');
});

Route::middleware(['Karyawan Pengirim'])->group(function(){
    Route::get('/karyawanPengirim/home', [HomeController::class, 'karyawanPengirimHome'])->name('karyawanPengirimHome');
    Route::get('/karyawanPengirim/pengiriman', [PengirimanKaryawanController::class, 'index']);
    Route::get('/karyawanPengirim/{id}/showPengiriman', [PengirimanKaryawanController::class, "show"]);
    Route::post('/karyawanPengirim/pengiriman/{id}/ubahKeSelesai', [PengirimanKaryawanController::class, 'selesai']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
