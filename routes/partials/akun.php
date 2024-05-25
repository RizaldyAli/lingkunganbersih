<?php

use App\Http\Controllers\Akun\AdminController;
use App\Http\Controllers\Akun\MasyarakatController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
    });
    Route::group(['prefix' => 'masyarakat', 'as' => 'masyarakat.'], function () {
        Route::get('/', [MasyarakatController::class, 'index'])->name('index');
    });
});
