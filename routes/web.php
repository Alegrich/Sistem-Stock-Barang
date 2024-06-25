<?php

// routes/web.php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Staff\StaffController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;



Route::middleware(['auth', 'admin'])->prefix('admin')->group(function ()  {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::view('/admin/crud-tambah', 'frontend.admin.create');
    Route::view('/admin/crud-edit', 'frontend.admin.edit');
    Route::view('/manajemen-staff', 'frontend.admin.manajemen-staff');
    Route::view('/stockout', 'frontend.admin.stokout');
    Route::view('/stockin', 'frontend.admin.stockin');

    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
});

Route::middleware(['auth', 'staff'])->prefix('staff')->group(function () {
    Route::get('/dashboard', [StaffController::class, 'index'])->name('staff.dashboard');
    Route::resource('products', ProductController::class)->except(['create', 'edit', 'update', 'destroy']);
    Route::resource('categories', CategoryController::class)->except(['create', 'edit', 'update', 'destroy']);
});

Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
