<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NguoiDungController;

Route::get('/', function () {
    return "Dang nhap";
});

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
    Route::resource('/user', NguoiDungController::class);
    
    
});

Route::get('/test', [NguoiDungController::class, 'testData']);