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
use App\Http\Controllers\lihat_aduan_detail_controller;
use App\Http\Controllers\lihat_aduan_umum_controller;
use App\Http\Controllers\lihat_aduan_history_controller;
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

    Route::get('/aduan-history', [lihat_aduan_history_controller::class, 'index'])->name('aduan-history');

    Route::get('/aduan-history-detail', [lihat_aduan_history_controller::class, 'historyDetail'])->name('aduan-history-detail');

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



// Route untuk masing-masing departemen
use App\Http\Controllers\Departemen\DAAKController;
use App\Http\Controllers\Departemen\SarprasController;
use App\Http\Controllers\Departemen\KemahasiswaanController;
use App\Http\Controllers\Departemen\PerpusController;
use App\Http\Controllers\Departemen\PengajaranController;
use App\Http\Controllers\Departemen\KeamananController;
use App\Http\Controllers\Departemen\UPTLabController;

Route::get('/departemen/daak/aduan', [DAAKController::class, 'index'])->name('daak-aduan');
Route::get('/departemen/daak/history-aduan', [DAAKController::class, 'index'])->name('daak-history-aduan');
Route::get('/departemen/daak/selesaikan-aduan', [DAAKController::class, 'selesaikanAduan'])->name('daak-selesaikan-aduan');
Route::post('/departemen/daak/selesaikan-aduan', [DAAKController::class, 'store'])->name('daak-selesaikan-aduan');

Route::get('/departemen/kemahasiswaan/aduan', [KemahasiswaanController::class, 'index'])->name('kemahasiswaan-aduan');
Route::get('/departemen/kemahasiswaan/history-aduan', [KemahasiswaanController::class, 'index'])->name('kemahasiswaan-history-aduan');
Route::get('/departemen/kemahasiswaan/selesaikan-aduan', [KemahasiswaanController::class, 'selesaikanAduan'])->name('kemahasiswaan-selesaikan-aduan');
Route::post('/departemen/kemahasiswaan/selesaikan-aduan', [KemahasiswaanController::class, 'store'])->name('kemahasiswaan-selesaikan-aduan');

Route::get('/departemen/sarpras/aduan', [SarprasController::class, 'index'])->name('sarpras-aduan');
Route::get('/departemen/sarpras/history-aduan', [SarprasController::class, 'index'])->name('sarpras-history-aduan');
Route::get('/departemen/sarpras/selesaikan-aduan', [SarprasController::class, 'selesaikanAduan'])->name('sarpras-selesaikan-aduan');
Route::post('/departemen/sarpras/selesaikan-aduan', [SarprasController::class, 'store'])->name('sarpras-selesaikan-aduan');

Route::get('/departemen/pengajaran/aduan', [PengajaranController::class, 'index'])->name('pengajaran-aduan');
Route::get('/departemen/pengajaran/history-aduan', [PengajaranController::class, 'index'])->name('pengajaran-history-aduan');
Route::get('/departemen/pengajaran/selesaikan-aduan', [PengajaranController::class, 'selesaikanAduan'])->name('pengajaran-selesaikan-aduan');
Route::post('/departemen/pengajaran/selesaikan-aduan', [PengajaranController::class, 'store'])->name('pengajaran-selesaikan-aduan');

Route::get('/departemen/perpus/aduan', [PerpusController::class, 'index'])->name('perpus-aduan');
Route::get('/departemen/perpus/history-aduan', [PerpusController::class, 'index'])->name('perpus-history-aduan');
Route::get('/departemen/perpus/selesaikan-aduan', [PerpusController::class, 'selesaikanAduan'])->name('perpus-selesaikan-aduan');
Route::post('/departemen/perpus/selesaikan-aduan', [PerpusController::class, 'store'])->name('perpus-selesaikan-aduan');

Route::get('/departemen/keamanan/aduan', [KeamananController::class, 'index'])->name('keamanan-aduan');
Route::get('/departemen/keamanan/history-aduan', [KeamananController::class, 'index'])->name('keamanan-history-aduan');
Route::get('/departemen/keamanan/selesaikan-aduan', [KeamananController::class, 'selesaikanAduan'])->name('keamanan-selesaikan-aduan');
Route::post('/departemen/keamanan/selesaikan-aduan', [KeamananController::class, 'store'])->name('keamanan-selesaikan-aduan');

Route::get('/departemen/uptlab/aduan', [UPTLabController::class, 'index'])->name('uptlab-aduan');
Route::get('/departemen/uptlab/history-aduan', [UPTLabController::class, 'index'])->name('uptlab-history-aduan');
Route::get('/departemen/uptlab/selesaikan-aduan', [UPTLabController::class, 'selesaikanAduan'])->name('uptlab-selesaikan-aduan');
Route::post('/departemen/uptlab/selesaikan-aduan', [UPTLabController::class, 'store'])->name('uptlab-selesaikan-aduan');





Route::get('/departemen/sarpras', [SarprasController::class, 'index'])->name('departemen.sarpras');
Route::get('/departemen/kemahasiswaan', [KemahasiswaanController::class, 'index'])->name('departemen.kemahasiswaan');
Route::get('/departemen/perpus', [PerpusController::class, 'index'])->name('departemen.perpus');
Route::get('/departemen/pengajaran', [PengajaranController::class, 'index'])->name('departemen.pengajaran');
Route::get('/departemen/keamanan', [KeamananController::class, 'index'])->name('departemen.keamanan');
Route::get('/departemen/uptlab', [UPTLabController::class, 'index'])->name('departemen.uptlab');