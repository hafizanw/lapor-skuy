<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class lihat_aduan_umum_controller extends Controller
{
    public function index() {
        return view('lihat_aduan.lihat_aduan_umum', [
            'titlePage' => 'Lihat Aduan'
        ]);
    }
}
