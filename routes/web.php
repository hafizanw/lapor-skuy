<?php

use App\Http\Controllers\faq_controller;
use App\Http\Controllers\lihat_aduan_anda_controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ComplaintsController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\kirim_aduan_controller;
use App\Http\Controllers\Lihat_aduan_detail_controller;
use App\Http\Controllers\lihat_aduan_umum_controller;
use App\Http\Controllers\user_profile_controller;


// Route untuk halaman utama tanpa login
Route::get('/', function () {
    return view('home');
});

// Route Kirim Aduan
Route::get('/kirim-aduan', function () {
    return view('kirim_aduan.kirim_aduan', [
        'titlePage' => 'Kirim Aduan'
    ]);
})->name('kirim-aduan');

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


    Route::post('/aduan-umum', [lihat_aduan_umum_controller::class, 'store'])->name('aduan-umum');
    
    Route::get('/aduan-umum', [lihat_aduan_umum_controller::class, 'index'])->name('aduan-umum');

    Route::get('/aduan-anda', [lihat_aduan_anda_controller::class, 'index'])->name('aduan-anda');

    Route::post('/aduan-detail', [lihat_aduan_detail_controller::class, 'store'])->name('aduan-detail');

    Route::get('/aduan-detail/{complaint_id}', [lihat_aduan_detail_controller::class, 'index'])->name('aduan-detail');

    Route::get('/user-profile', [user_profile_controller::class, 'index'])->name('user-profile');

    Route::post('/user-profile', [user_profile_controller::class, 'store'])->name('user-profile');

  Route::get('/kirim-aduan-umum', function () {
        return view('kirim_aduan.kirim_aduan_umum',
            [
                'titlePage' => 'Kirim Aduan Umum'
            ]);
    })->name('kirim-aduan-umum');
    Route::post('/kirim-aduan-umum', [kirim_aduan_controller::class, 'store'])->name('kirim-aduan-umum.store');
    
    Route::get('/kirim-aduan-privat', function () {
        return view('kirim_aduan.kirim_aduan_privat',
        [
            'titlePage' => 'Kirim Aduan Privat'
        ]);
    })->name('kirim-aduan-privat');
    Route::post('/kirim-aduan-privat', [kirim_aduan_controller::class, 'store'])->name('kirim-aduan-privat.store');
  
});


Route::get('/faq', [faq_controller::class, 'index'])->name('faq');
Route::get('/about', function () {return view('about');});
Route::get('/panduan', function () {return view('panduan');});

    


