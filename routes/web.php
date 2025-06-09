<?php

use App\Http\Controllers\faq_controller;
use App\Http\Controllers\lihat_aduan_anda_controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Lihat_aduan_detail_controller;
use App\Http\Controllers\lihat_aduan_umum_controller;
use App\Http\Controllers\user_profile_controller;

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

Route::get('/aduan-umum', [lihat_aduan_umum_controller::class, 'index'])->name('aduan-umum');

Route::get('/aduan-anda', [lihat_aduan_anda_controller::class, 'index'])->name('aduan-anda');

Route::post('/aduan-detail', [Lihat_aduan_detail_controller::class, 'store'])->name('aduan-detail');

Route::get('/aduan-detail', [Lihat_aduan_detail_controller::class, 'index'])->name('aduan-detail');

Route::get('/faq', [faq_controller::class, 'index'])->name('faq');

Route::get('/user-profile', [user_profile_controller::class, 'index'])->name('user-profile');