<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GiangVienController;
use App\Http\Controllers\Admin\NguoiDungController;
use App\Http\Controllers\Admin\SignInController;

Route::get('/', function () {
    return "Dang nhap";
});

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
    Route::resource('/user', NguoiDungController::class);
    Route::get('/giangvien', [GiangVienController::class, 'index'])->name('giangvien.index');

    
});

Route::get('/', [SignInController::class, 'index'])->name('login');
Route::post('/login', [SignInController::class, 'login'])->name('login.post');
Route::post('/logout', [SignInController::class, 'logout'])->name('logout');

Route::get('/test', [NguoiDungController::class, 'testData']);