<?php

use Illuminate\Support\Facades\Route;

// Route untuk halaman utama tanpa login
Route::get('/', function () {
    return view('home');
});

// Route Kirim Aduan
Route::get('/kirim-aduan', function () {
    return view('kirim_aduan/kirim_aduan');
});

Route::get('/kirim-aduan-umum', function () {
    return view('kirim_aduan/kirim_aduan_umum');
});

Route::get('/kirim-aduan-privat', function () {
    return view('kirim_aduan/kirim_aduan_privat');
});

// Route Lihat Aduan
Route::get('/aduan-umum', function () {
    return view('lihat_aduan_umum');
});

Route::get('/aduan-anda', function () {
    return view('lihat_aduan_anda');
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

Route::get('/aduan-detail', function () {
    return view('lihat_aduan_detail');
});

Route::get('/user-profile', function () {
    return view('user_profile');
});
