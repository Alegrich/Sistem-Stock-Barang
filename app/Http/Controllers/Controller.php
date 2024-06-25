<?php

namespace App\Http\Controllers;

abstract class Controller
{
    // Jika diperlukan, definisikan properti atau metode lain di sini

    protected $routeMiddleware = [
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
        'staff' => \App\Http\Middleware\StaffMiddleware::class,
    ];
}
