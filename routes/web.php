<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');


Route::get('/admin', function () {
    return view('frontend.admin.admin');
});

Route::get('/admin/crud-tambah', function () {
    return view('frontend.admin.create');
});

Route::get('/admin/crud-edit', function () {
    return view('frontend.admin.edit');
});

Route::get('/manajemen-staff', function () {
    return view('frontend.admin.manajemen-staff');
});
Route::get('stockout', function () {
    return view('frontend.admin.stokout');
});
Route::get('stockin', function () {
    return view('frontend.admin.stockin');
});


Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');