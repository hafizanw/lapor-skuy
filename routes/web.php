<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/aduan-umum', function () {
    return view('layouts.lihat_aduan_umum');
});

Route::get('/aduan-anda', function () {
    return view('layouts.lihat_aduan_anda');
});

Route::get('/', function () {
    return view('layouts.dashboard');
});

Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::get('/about', function () {
    return view('layouts.about');
});

Route::get('/panduan', function () {
    return view('layouts.panduan');
});

Route::get('/reports', function () {
    return view('layouts.reports');

});

Route::get('/aduan-detail', function () {
    return view('layouts.lihat_aduan_detail');
});

Route::get('/user-profile', function () {
    return view('layouts.user_profile');
});
