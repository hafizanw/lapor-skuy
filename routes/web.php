<?php

use Illuminate\Support\Facades\Route;



Route::get('/aduan-umum', function() {
    return view('lihat_aduan_umum');
});

Route::get('/aduan-anda', function() {
    return view('lihat_aduan_anda');
});

Route::get('/aduan-detail', function() {
    return view('lihat_aduan_detail');
});

Route::get('/user-profile', function() {
    return view('user_profile');
});