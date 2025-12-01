<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\siswaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('web');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('dashboard', dashboardController::class)->middleware('auth');

Route::resource('siswa', siswaController::class)->middleware('auth');
Route::get('siswa-export', [siswaController::class, 'export'])->name('siswa.export');
