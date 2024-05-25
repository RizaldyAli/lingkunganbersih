<?php

use App\Http\Controllers\Laporan\SampahController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'sampah', 'as' => 'sampah.'], function () {
        Route::get('/', [SampahController::class, 'index'])->name('index');
        Route::get('/create', [SampahController::class, 'create'])->name('create');
        Route::post('/', [SampahController::class, 'store'])->name('store');
        Route::get('/{laporan}', [SampahController::class, 'show'])->name('show');
        Route::put('/{laporan}', [SampahController::class, 'update'])->name('update');
    });
});
