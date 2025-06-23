<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class dashboard_controller extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $profile = DB::select('CALL select_user(?)', [$userId])[0];
        $datas = DB::select('CALL select_complaint_user()');
        $data = $datas[0];

        return view('dashboard', [
            'data' => $data,
            'datas' => $datas,
            'titlePage' => 'Dashboard',
            'username' => $profile->name,
            'profile_picture' => $profile->profile_picture 
                ? ('profile_uploads/'. $profile->profile_picture) 
                : 'profile_uploads/profile_default.png'
        ]);
    }
}
