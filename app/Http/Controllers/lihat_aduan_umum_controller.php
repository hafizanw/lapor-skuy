<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class lihat_aduan_umum_controller extends Controller
{
    public function store(Request $request) {

    }

    public function index() {
        $datas = DB::select('CALL select_complaint_user_vote()');
        $data = $datas[0];

        $userId = Auth::id();
        $profile = DB::select('CALL select_user(?)', [$userId])[0];

        return view('lihat_aduan.lihat_aduan_umum', [
            'data' => $data,
            'datas' => $datas,
            'titlePage' => 'Lihat Aduan',
            'username' => $profile->name,
            'profile_picture' => $profile->profile_picture 
            ? ('profile_uploads/'. $profile->profile_picture) 
            : 'profile_uploads/profile_default.png'
        ]);
    }
}