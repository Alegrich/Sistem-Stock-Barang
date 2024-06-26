<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ItemsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Staff\StaffController;

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
     Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

     Route::resource('items', ItemsController::class);

     Route::prefix('items')->group(function () {
         Route::get('/stockIn', [ItemsController::class, 'stockIn'])->name('admin.items.stockIn');
         Route::get('/stockOut', [ItemsController::class, 'stockOut'])->name('admin.items.stockOut');
     });
 
     Route::resource('category', CategoryController::class);


    Route::get('/supplier', function () {
        return view('admin.supplier.index');
    })->name('admin.supplier.index');

    Route::get('/supplier/add', function () {
        return view('admin.supplier.add_supplier');
    })->name('admin.supplier.add');

    Route::get('/staff', function () {
        return view('admin.users.index');
    })->name('admin.staff.index');
});

// Staff routes
Route::middleware(['auth', 'staff'])->prefix('staff')->group(function () {
    Route::get('/dashboard', [StaffController::class, 'index'])->name('staff.dashboard');
    Route::prefix('items')->group(function () {
        Route::get('/', function () {
            return view('staff.items.index');
        })->name('staff.items.index');

        Route::get('/stockIn', function () {
            return view('staff.items.stockIn');
        })->name('staff.items.stockIn');

        Route::get('/stockOut', function () {
            return view('staff.items.stockOut');
        })->name('staff.items.stockOut');
    });
});

// Authentication routes
 Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
 Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
 Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register route
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');


Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});

