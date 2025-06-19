<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\faq_controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\kirim_aduan_controller;
use App\Http\Controllers\user_profile_controller;
use App\Http\Controllers\lihat_aduan_anda_controller;
use App\Http\Controllers\lihat_aduan_umum_controller;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\dashboard_controller;
use App\Http\Controllers\home_controller;
use App\Http\Controllers\Lihat_aduan_detail_controller;


// Route untuk halaman utama tanpa login
Route::get('/', [home_controller::class, 'index']);

// Grup Rute Autentikasi
Route::get('/login', [UserController::class, 'index']);
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Rute Fungsional untuk Lupa Password
Route::get('/email', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');
Route::post('/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');
Route::get('/reset/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('password.reset');
Route::post('/reset', [ResetPasswordController::class, 'reset'])
    ->name('password.update');


// Route untuk halaman utama after login
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [dashboard_controller::class, 'index'])->name('dashboard');

    Route::post('/aduan-umum', [lihat_aduan_umum_controller::class, 'store'])->name('aduan-umum');
    
    Route::get('/aduan-umum', [lihat_aduan_umum_controller::class, 'index'])->name('aduan-umum');

    Route::get('/aduan-anda', [lihat_aduan_anda_controller::class, 'index'])->name('aduan-anda');

    Route::post('/aduan-detail', [lihat_aduan_detail_controller::class, 'store'])->name('aduan-detail');

    Route::get('/aduan-detail/{complaint_id}', [lihat_aduan_detail_controller::class, 'index'])->name('aduan-detail');

    Route::get('/user-profile', [user_profile_controller::class, 'index'])->name('user-profile');

    Route::post('/user-profile', [user_profile_controller::class, 'store'])->name('user-profile');

    Route::get('/kirim-aduan', [kirim_aduan_controller::class, 'index'])->name('kirim-aduan');
    
    Route::get('/kirim-aduan-umum', [kirim_aduan_controller::class, 'index_umum'])->name('kirim-aduan-umum');

    Route::post('/kirim-aduan-umum', [kirim_aduan_controller::class, 'store'])->name('kirim-aduan-umum.store');
    
    Route::get('/kirim-aduan-privat', [kirim_aduan_controller::class, 'index_privat'])->name('kirim-aduan-privat');

    Route::post('/kirim-aduan-privat', [kirim_aduan_controller::class, 'store'])->name('kirim-aduan-privat.store');

  
});

Route::get('/faq', [faq_controller::class, 'index'])->name('faq');
Route::get('/about', function () {return view('about');});
Route::get('/panduan', function () {return view('panduan');});

    


