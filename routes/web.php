<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\GoogleLoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\dashboard_controller;
use App\Http\Controllers\Departemen\departemen_aduan_detail;
use App\Http\Controllers\Departemen\departemen_dashboard_controller;
use App\Http\Controllers\Departemen\departemen_list_aduan_controller;
use App\Http\Controllers\Departemen\departemen_list_history_controller;
use App\Http\Controllers\Departemen\departemen_selesaikan_aduan;
use App\Http\Controllers\faq_controller;
use App\Http\Controllers\home_controller;
use App\Http\Controllers\kirim_aduan_controller;
use App\Http\Controllers\lihat_aduan_anda_controller;
use App\Http\Controllers\Lihat_aduan_detail_controller;
use App\Http\Controllers\lihat_aduan_umum_controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\user_profile_controller;
use Illuminate\Support\Facades\Route;

// Route untuk halaman utama tanpa login
Route::get('/', [home_controller::class, 'index'])->name('home');

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

// Rute mengarahkan pengguna ke halaman autentikasi Google
Route::get('/auth/google/redirect', [GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
// Rute menangani callback dari Google setelah autentikasi
Route::get('/auth/google/callback', [GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');

// Route untuk halaman utama after login
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [dashboard_controller::class, 'index'])->name('dashboard');

    Route::get('/aduan-umum', [lihat_aduan_umum_controller::class, 'index'])->name('aduan-umum');
    Route::post('/aduan-umum', [lihat_aduan_umum_controller::class, 'store'])->name('aduan-umum');

    Route::post('/aduan-anda', [lihat_aduan_anda_controller::class, 'store'])->name('aduan-anda');

    Route::get('/aduan-anda', [lihat_aduan_anda_controller::class, 'index'])->name('aduan-anda');

    Route::post('/aduan-detail', [lihat_aduan_detail_controller::class, 'store'])->name('aduan-detail');

    Route::get('/aduan-detail', [lihat_aduan_detail_controller::class, 'index'])->name('aduan-detail');

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

// Departemen
Route::get('/departemen-dashboard', [departemen_dashboard_controller::class, 'index'])->name('departemen-dashboard');

Route::get('/departemen-list-aduan', [departemen_list_aduan_controller::class, 'index'])->name('departemen-list-aduan');

Route::get('/departemen-list-history', [departemen_list_history_controller::class, 'index'])->name('departemen-list-history');

Route::get('/departemen-aduan-detail', [departemen_aduan_detail::class, 'index'])->name('departemen-aduan-detail');

Route::get('/departemen-selesaikan-aduan', [departemen_selesaikan_aduan::class, 'index'])->name('departemen-selesaikan-aduan');