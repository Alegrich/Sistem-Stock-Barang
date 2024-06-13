<?php

use App\Http\Controllers\Admin\{
    DashboardController, CategoryController, PermissionController, SupplierController,
    ProductController, RoleController, StockController, VehicleController, TransactionController,
    UserController, OrderController,
    ReportController,
    SettingController
};
use App\Http\Controllers\Auth\LoginController; // Pastikan LoginController diimport
use App\Http\Controllers\Customer\{
    DashboardController as CustomerDashboardController, OrderController as CustomerOrderController, TransactionController as CustomerTransactionController, RentController as CustomerRentController,
    SettingController as CustomerSettingController
};
use App\Http\Controllers\{
    LandingController, ProductController as LandingProductController,
    CartController, TransactionController as LandingTransactionController,
    CategoryController as LandingCategoryController, VehicleController as LandingVehicleController
};
use Illuminate\Support\Facades\Route;

// Rute untuk halaman utama
Route::get('/', function () {
    return redirect()->route('login');
})->middleware('guest');

// Rute untuk dashboard
Route::get('/dashboard', function () {
    if (auth()->check() && auth()->user()) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('landing');
})->middleware('auth')->name('dashboard');

// Rute untuk login dan logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', LandingController::class)->name('landing');

Route::controller(LandingCategoryController::class)->as('category.')->group(function(){
    Route::get('/category', 'index')->name('index');
    Route::get('/category/{slug}', 'show')->name('show');
});

Route::controller(LandingProductController::class)->as('product.')->group(function(){
    Route::get('/product', 'index')->name('index');
    Route::get('/product/{slug}', 'show')->name('show');
});

Route::controller(LandingVehicleController::class)->as('vehicle.')->group(function(){
    Route::get('/vehicle', 'index')->name('index')->middleware('permission:index-rent');
    Route::post('/vehicle', 'store')->name('store')->middleware(['permission:create-rent','auth']);
});

Route::controller(CartController::class)->middleware(['permission:create-transaction','auth'])->group(function(){
    Route::get('/cart', 'index')->name('cart.index');
    Route::post('/cart/{product:slug}', 'store')->name('cart.store');
    Route::delete('/cart/destroy/{cart:id}', 'destroy')->name('cart.destroy');
    Route::put('/cart/update/{cart:id}', 'update')->name('cart.update');
    Route::post('/cart/order/{product:slug}', 'order')->name('cart.order');
});

Route::post('/transaction', [LandingTransactionController::class, 'store'])
    ->middleware(['permission:create-transaction','auth'])->name('transaction.store');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'role:Admin|Super Admin']], function () {
    Route::get('/dashboard', DashboardController::class)
        ->name('dashboard')
        ->middleware('permission:index-dashboard');

    Route::resource('/category', CategoryController::class)
        ->except('show', 'create', 'edit')
        ->middleware('permission:index-category');

    Route::resource('/supplier', SupplierController::class)
        ->except('show', 'create', 'edit')
        ->middleware('permission:index-supplier');

    Route::resource('/product', ProductController::class)
        ->except('show')
        ->middleware('permission:index-product');

    Route::resource('/stock', StockController::class)
        ->only('index', 'update')
        ->middleware('permission:index-stock');

    Route::resource('/vehicle', VehicleController::class)
        ->except('show', 'create', 'edit')
        ->middleware('permission:index-vehicle');

    Route::resource('/order', OrderController::class)
        ->middleware('permission:index-order');

    Route::resource('/user', UserController::class)
        ->middleware('permission:index-user');

    Route::resource('/role', RoleController::class)
        ->middleware('permission:index-role');

    Route::resource('/permission', PermissionController::class)
        ->except('show', 'create', 'edit')
        ->middleware('permission:index-permission');

    Route::controller(TransactionController::class)->group(function(){
        Route::get('/transaction/product', 'product')->name('transaction.product');
        Route::get('/transaction/vehicle', 'vehicle')->name('transaction.vehicle');
    });

    Route::controller(SettingController::class)->group(function(){
        Route::get('/setting', 'index')->name('setting.index');
        Route::put('/setting/update/{user}', 'update')->name('setting.update');
    });
});

Route::group(['prefix' => 'customer', 'as' => 'customer.', 'middleware' => ['auth', 'role:Customer']], function (){
    Route::get('/dashboard', CustomerDashboardController::class)->name('dashboard');
    Route::get('/transaction', CustomerTransactionController::class)->name('transaction');
    Route::resource('/order', CustomerOrderController::class);
    Route::resource('/rent', CustomerRentController::class);
    Route::controller(CustomerSettingController::class)->group(function(){
        Route::get('/setting', 'index')->name('setting.index');
        Route::put('/setting/update/{user}', 'update')->name('setting.update');
    });
});
