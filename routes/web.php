<?php

use App\Http\Controllers\BackController;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PenyewaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(["prefix" => "/dashboard"], function () {
    Route::get('/', [BackController::class, 'index'])->name('dashboard');
});

// GENERATE ROUTE
Route::get('/generate/customer', [GenerateController::class, 'generate_pengguna'])->name('generate-customer');
