<?php

// routes/web.php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ItemsController;
use App\Http\Controllers\Admin\StockController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\Admin\SupplierController;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

     Route::resource('items', ItemsController::class);

     Route::resource('stock', StockController::class);
    
 
     Route::resource('category', CategoryController::class);

     Route::resource('supplier', SupplierController::class);

    Route::get('/staff', function () {
        return view('admin.users.index');
    })->name('admin.staff.index');
});

// Staff routes


// Authentication routes
 Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
 Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
 Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register route
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');


