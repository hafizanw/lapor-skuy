<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/panduan', function () {
    return view('panduan');
});

Route::get('/reports', function () {
    return view('reports');
});
