<?php

use App\Http\Controllers\Laporan\LaporanController;
use App\Models\Laporan;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'laporan', 'as' => 'laporan.'], function () {
        Route::get('/{kategori}', [LaporanController::class, 'index'])->name('index');
        Route::get('/{kategori}/create', [LaporanController::class, 'create'])->name('create');
        Route::post('/{kategori}', [LaporanController::class, 'store'])->name('store');
        Route::get('/{kategori}/{laporan}', [LaporanController::class, 'show'])->name('show');
        Route::put('/{kategori}/{laporan}', [LaporanController::class, 'update'])->name('update');
    });
});
