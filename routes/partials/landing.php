<?php

use App\Http\Controllers\Landing\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/laporan-lengkap', [LandingController::class, 'laporanLengkap'])->name('laporan-lengkap');
Route::get('/laporan-detail', [LandingController::class, 'laporanDetail'])->name('laporan-detail');
