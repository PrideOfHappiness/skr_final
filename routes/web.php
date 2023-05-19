<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\KaryawanController;

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
});

Route::middleware(['Admin'])->group(function() {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('adminHome');
    Route::resource('/admin/karyawan', KaryawanController::class);
});

Route::middleware(['Karyawan'])->group(function() {
    Route::get('/karyawan/home', [HomeController::class, 'karyawanHome'])->name('karyawanHome');
});

Route::middleware(['Pemilik'])->group(function() {
    Route::get('/pemilik/home', [HomeController::class, 'pemilikHome'])->name('pemilikHome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
