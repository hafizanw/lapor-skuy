<?php

use App\Http\Controllers\faq_controller;
use App\Http\Controllers\lihat_aduan_anda_controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ComplaintsController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

use App\Http\Controllers\Lihat_aduan_detail_controller;
use App\Http\Controllers\lihat_aduan_umum_controller;
use App\Http\Controllers\user_profile_controller;


// Route untuk halaman utama tanpa login
Route::get('/', function () {
    return view('home');
});

// Route Kirim Aduan
Route::get('/kirim-aduan', function () {
    return view('kirim_aduan.kirim_aduan');
})->name('kirim-aduan');

Route::get('/kirim-aduan-umum', function () {
    return view('kirim_aduan.kirim_aduan_umum');
});

Route::get('/kirim-aduan-privat', function () {
    return view('kirim_aduan.kirim_aduan_privat');
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

Route::get('/aduan-umum', [lihat_aduan_umum_controller::class, 'index'])->name('aduan-umum');

Route::get('/aduan-anda', [lihat_aduan_anda_controller::class, 'index'])->name('aduan-anda');

Route::post('/aduan-detail', [Lihat_aduan_detail_controller::class, 'store'])->name('aduan-detail');

Route::get('/aduan-detail', [Lihat_aduan_detail_controller::class, 'index'])->name('aduan-detail');

Route::get('/faq', [faq_controller::class, 'index'])->name('faq');

Route::get('/user-profile', [user_profile_controller::class, 'index'])->name('user-profile');

Route::get('/aduan-detail', function () {
    return view('lihat_aduan_detail');
});

Route::get('/user-profile', function () {
    return view('user_profile');
});

// Membuat route untuk ComplaintsController dengan beberapa rute
Route::resource('complaints', ComplaintsController::class);

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

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    Route::get('/aduan-anda', function () {
        return view('lihat_aduan.lihat_aduan_anda');
    })->name('aduan-anda');
    Route::get('/user-profile', function () {
        return view('user_profile');
    })->name('user-profile');
});

Route::get('/aduan-umum', function () {return view('lihat_aduan.lihat_aduan_umum');});
Route::get('/about', function () {return view('about');});
Route::get('/panduan', function () {return view('panduan');});
Route::get('/aduan-detail', function () {return view('lihat_aduan.lihat_aduan_detail');});

