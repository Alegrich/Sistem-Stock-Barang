<?php

// routes/web.php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ItemsController;
use App\Http\Controllers\Admin\StockInController;
use App\Http\Controllers\Admin\StockOutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\Admin\SupplierController;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

     Route::resource('items', ItemsController::class)->names('admin.items');

     Route::resource('stockin', StockInController::class)->names('admin.stockin');
     Route::resource('stockout', StockOutController::class)->names('admin.stockout');
    
 
     Route::resource('category', CategoryController::class);

     Route::resource('supplier', SupplierController::class);

    Route::get('/staff', function () {
        return view('admin.users.index');
    })->name('admin.staff.index');
});

// Staff routes
Route::middleware(['auth', 'staff'])->prefix('staff')->group(function () {
    Route::get('/dashboard', [StaffController::class, 'index'])->name('staff.dashboard');
    Route::resource('items', ItemsController::class);
    Route::resource('stockin', StockInController::class, ['as' => 'staff']);
    Route::resource('stockout', StockOutController::class, ['as' => 'staff']);
   
});

// Authentication routes
 Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
 Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
 Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register route
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');


