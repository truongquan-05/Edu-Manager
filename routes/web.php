<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LopHocController;
use App\Http\Controllers\Admin\SignInController;
use App\Http\Controllers\Admin\SinhVienController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GiangVienController;
use App\Http\Controllers\Admin\NguoiDungController;


Route::get('/', [SignInController::class, 'index']);

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
    Route::resource('/user', NguoiDungController::class);
    Route::get('/giangvien', [GiangVienController::class, 'index'])->name('giangvien.index');
    Route::post('/giangvien/{id}/delete', [GiangVienController::class, 'destroy'])->name('giangvien.destroy');
    Route::get('/sinhvien', [SinhVienController::class, 'index'])->name('sinhvien.index');
    Route::post('/sinhvien/{id}/delete', [SinhVienController::class, 'destroy'])->name('sinhvien.destroy');
    Route::resource('/lophoc', LopHocController::class);
});
