<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/staff', function () {
    return view('admin.users.index');
})->name('admin.staff.index');

Route::get('/admin/items', function () {
    return view('admin.items.index');
})->name('admin.items.index');


Route::get('/admin/items/add', function () {
    return view('admin.items.add_items');
})->name('admin.items.add');

Route::get('/admin/items/stockIn', function () {
    return view('admin.items.stockIn');
})->name('admin.items.stockIn');

Route::get('/admin/items/stockOut', function () {
    return view('admin.items.stockOut');
})->name('admin.items.stockOut');

Route::get('/admin/supplier', function () {
    return view('admin.supplier.index');
})->name('admin.supplier.index');

Route::get('/admin/supplier/add', function () {
    return view('admin.supplier.add_supplier');
})->name('admin.supplier.add');

Route::get('/admin/category', function () {
    return view('admin.category.index');
})->name('admin.category.index');

Route::get('/admin/category/add', function () {
    return view('admin.category.add_category');
})->name('admin.category.add');













Route::get('/staff', function () {
    return view('staff.dashboard');
})->name('staff.dashboard');

Route::get('/staff/items/add', function () {
    return view('staff.items.add_items');
})->name('staff.items.add');

Route::get('/staff/items/stockIn', function () {
    return view('staff.items.stockIn');
})->name('staff.items.stockIn');

Route::get('/staff/items/stockOut', function () {
    return view('staff.items.stockOut');
})->name('staff.items.stockOut');