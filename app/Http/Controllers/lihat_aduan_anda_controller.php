<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class lihat_aduan_anda_controller extends Controller
{
    public function index() {
        return view('lihat_aduan.lihat_aduan_anda', [
            'titlePage' => 'Aduan Anda'
        ]);
    }
}
