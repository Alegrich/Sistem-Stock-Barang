<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/stock', function () {
    return view('stock.index');
});

Route::get('/users', function () {
    return view('users.index');
});
