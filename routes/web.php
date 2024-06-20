<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('dashboard');

Route::get('/stock', function () {
    return view('stock.index');
});

Route::get('/users', function () {
    return view('users.index');
});
Route::get('/items', function () {
    return view('items.index');
})->name('items.index');
Route::get('/items/add', function () {
    return view('items.add_items');
})->name('items.add');
