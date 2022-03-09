<?php

use App\Http\Controllers\BackController;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

// MISC ROUTE
Route::get('/login', [BackController::class, 'login'])->name('login');
Route::get('/register', [BackController::class, 'register'])->name('register');
Route::post('/post-login', [BackController::class, 'postlogin'])->name('post-login');
Route::post('/post-register', [BackController::class, 'postregister'])->name('post-register');
Route::post('/logout', [BackController::class, 'logout'])->name('logout');

// DASHBOARD ROUTE
Route::group(["prefix" => "/dashboard", "middleware" => "ceklogin"], function () {
    Route::get('/', [BackController::class, 'index'])->name('dashboard');

    // Kendaraan Route
    Route::get('/daftar-kendaraan', [KendaraanController::class, 'daftar_kendaraan'])->name('daftar-kendaraan');
    Route::post('/daftar-kendaraan/update/{id}', [KendaraanController::class, 'update_kendaraan'])->name('update-kendaraan');
    Route::post('/daftar-kendaraan/hapus/{id}', [KendaraanController::class, 'hapus_kendaraan'])->name('hapus-kendaraan');
    Route::post('/daftar-kendaraan/tambah', [KendaraanController::class, 'tambah_kendaraan'])->name('tambah-kendaraan');

    // Penyewaan Route
    Route::get('/daftar-penyewaan', [PenyewaanController::class, 'daftar_penyewaan'])->name('daftar-penyewaan');
    Route::post('/daftar-penyewaan/update/{id}', [PenyewaanController::class, 'update_penyewaan'])->name('update-penyewaan');
    Route::post('/daftar-penyewaan/hapus/{id}', [PenyewaanController::class, 'hapus_penyewaan'])->name('hapus-penyewaan');

    // Customer Route
    Route::get('/daftar-customer', [CustomerController::class, 'daftar_customer'])->name('daftar-customer');
    Route::post('/daftar-customer/update/{id}', [CustomerController::class, 'update_customer'])->name('update-customer');
    Route::post('/daftar-customer/hapus/{id}', [CustomerController::class, 'hapus_customer'])->name('hapus-customer');

});

// HOME ROUTE
Route::group(["prefix" => "/"], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');
    Route::post('/proses-penyewaan/{id}', [HomeController::class, 'proses_penyewaan'])->name('proses-penyewaan');
});

// GENERATE ROUTE
Route::get('/generate/chained-generate', [GenerateController::class, 'chained_generate'])->name('chained-generate');
Route::get('/generate/customer', [GenerateController::class, 'generate_pengguna'])->name('generate-customer');
Route::get('/generate/kendaraan', [GenerateController::class, 'generate_kendaraan'])->name('generate-kendaraan');
Route::get('/generate/penyewaan', [GenerateController::class, 'generate_penyewaan'])->name('generate-penyewaan');
