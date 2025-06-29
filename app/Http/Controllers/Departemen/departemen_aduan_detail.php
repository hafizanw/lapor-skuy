<?php

namespace App\Http\Controllers\Departemen;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class departemen_aduan_detail extends Controller {
    public function index(Request $request) {
        $datas = DB::select('CALL select_complaint_comment_user_vote(?)', [$request->complaint_id]);
        $data = $datas[0];

        // $userId = Auth::id();
        $userId = 1;
        $profile = DB::select('CALL select_user(?)', [$userId])[0];

        return view('departemen.departemen_aduan_detail', [
            'datas' => $datas,
            'data' => $data,
            'titlePage' => 'Detail Aduan',
            'username' => $profile->name,
            'profile_picture' => $profile->profile_picture 
            ? ('profile_uploads/'. $profile->profile_picture) 
            : 'profile_uploads/profile_default.png'
        ]);
    }
}