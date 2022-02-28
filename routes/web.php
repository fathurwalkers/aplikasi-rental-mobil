<?php

use App\Http\Controllers\BackController;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PenyewaController;
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

    // Kendaraan
    Route::get('/daftar-kendaraan', [KendaraanController::class, 'daftar_kendaraan'])->name('daftar-kendaraan');
    Route::post('/daftar-kendaraan/hapus/{id}', [KendaraanController::class, 'hapus_kendaraan'])->name('hapus-kendaraan');
});

// GENERATE ROUTE
Route::get('/generate/chained-generate', [GenerateController::class, 'chained_generate'])->name('chained-generate');
Route::get('/generate/customer', [GenerateController::class, 'generate_pengguna'])->name('generate-customer');
Route::get('/generate/kendaraan', [GenerateController::class, 'generate_kendaraan'])->name('generate-kendaraan');
