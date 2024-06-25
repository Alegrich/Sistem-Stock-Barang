<?php

// routes/web.php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Staff\StaffController;

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix('items')->group(function () {
        Route::get('/', function () {
            return view('admin.items.index');
        })->name('admin.items.index');

        Route::get('/items/add', function () {
            return view('admin.items.add_items');
        })->name('admin.items.add');

        Route::get('/stockIn', function () {
            return view('admin.items.stockIn');
        })->name('admin.items.stockIn');

        Route::get('/stockOut', function () {
            return view('admin.items.stockOut');
        })->name('admin.items.stockOut');
    });

    Route::get('/category', function () {
        return view('admin.category.index');
    })->name('admin.category.index');

    Route::get('/category/add', function () {
        return view('admin.category.add_category');
    })->name('admin.category.add');


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


