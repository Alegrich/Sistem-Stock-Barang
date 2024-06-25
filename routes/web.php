<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\StockOutController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Route Untuk Hak Akses staf
Route::middleware(['staf', 'auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'stafDashboard']);
});



// Autentikasi Pengguna
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});







// Route Untuk Hak Akses Admin
Route::middleware(['admin', 'auth'])->group(function() {

    Route::get('/admin', [DashboardController::class, 'adminDashboard'])->name('admin');

    // kategori
    Route::get('/admin/tampilkategori', [CategoryController::class, 'index'])->name('admin.tampilkategori');
    Route::get('/admin/crud-tambah-kategori', [CategoryController::class, 'create'])->name('admin.crud-tambah-kategori');
    Route::post('/admin/crud-tambah-kategori', [CategoryController::class, 'store']);
    Route::get('/admin/crud-edit-kategori/{id_kategori}', [CategoryController::class, 'edit'])->name('admin.crud-edit-kategori');
    Route::put('/admin/crud-edit-kategori/{id_kategori}', [CategoryController::class, 'update']);
    Route::delete('/admin/crud-delete/{id_kategori}', [CategoryController::class, 'destroy'])->name('admin.crud-delete-kategori');


    // supplier
    Route::get('/admin/tampil_supplier', [SupplierController::class, 'index'])->name('admin.tampil_supplier');
    Route::get('/admin/tambah_supplier', [SupplierController::class, 'create'])->name('admin.tambah_supplier');
    Route::post('/admin/tambah_supplier', [SupplierController::class, 'store']);
    Route::get('/admin/edit_supplier/{id}', [SupplierController::class, 'edit'])->name('admin.edit_supplier');
    Route::put('/admin/edit_supplier/{id}', [SupplierController::class, 'update']);
    Route::delete('/admin/hapus_supplier/{id}', [SupplierController::class, 'destroy'])->name('admin.hapus_supplier');


    // user
    Route::get('/admin/tampil_staff', [UserController::class, 'tampil'])->name('admin.tampil_staff');
    Route::get('/manajemen-staff', [UserController::class, 'index'])->name('admin.manajemen.staff');
    Route::get('/admin/edit_staff/{id}', [UserController::class, 'edit'])->name('admin.edit_staff');
    Route::put('/admin/edit_staff/{id}', [UserController::class, 'update']);
    Route::delete('/admin/delete_user/{id}', [UserController::class, 'destroy'])->name('admin.delete_user');

    // Items
    // Routes for item CRUD
    Route::get('/admin/crud-tambah', [ItemController::class, 'create'])->name('admin.crud-tambah');
    Route::post('/admin/crud-tambah', [ItemController::class, 'store']);
    Route::get('/admin/crud-edit-item/{id}', [ItemController::class, 'edit'])->name('admin.crud-edit-item');
    Route::put('/admin/crud-update-item/{id}', [ItemController::class, 'update'])->name('admin.crud-update-item');
    Route::delete('/admin/hapus-item/{id}', [ItemController::class, 'destroy'])->name('admin.hapus-item');


});

Route::middleware('auth')->group(function () {

    // HALAMAN YANG BISA DIAKSES OLEH ADMIN DAN JUGA STAF
    //PDF
    Route::get('/admin/generate-pdf', [ItemController::class, 'generatePDF'])->name('admin.generate_pdf');
    // Item
    Route::get('/tampil_item', [ItemController::class, 'item'])->name('tampil_item');

    // Stockin
    Route::get('stockin', [StockInController::class, 'index'])->name('stockin');
    Route::get('tambah-stockin', [StockInController::class, 'create'])->name('tambah_stockin');
    Route::post('store_stockin', [StockInController::class, 'store'])->name('store_stockin');
    Route::get('edit-stockin/{id}', [StockInController::class, 'edit'])->name('edit_stockin');
    Route::put('edit-stockin/{id}', [StockInController::class, 'update']);
    Route::delete('hapus-stockin/{id}', [StockInController::class, 'destroy'])->name('hapus_stockin');


    // Stockout
    Route::get('stockout', [StockoutController::class, 'index'])->name('stockout');
    Route::get('tambah-stockout', [stockoutController::class, 'create'])->name('tambah_stockout');
    Route::post('store_stockout', [stockoutController::class, 'store'])->name('store_stockout');
    Route::get('edit-stockout/{id}', [stockoutController::class, 'edit'])->name('edit_stockout');
    Route::put('edit-stockout/{id}', [stockoutController::class, 'update']);
    Route::delete('hapus-stockout/{id}', [stockoutController::class, 'destroy'])->name('hapus_stockout');
});