<?php

namespace App\Http\Controllers\Departemen;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class departemen_selesaikan_aduan extends Controller {
    public function index(Request $request) {
        // $datas = DB::select('CALL select_complaint_comment_user_vote(?)', [$request->complaint_id]);
        $datas = DB::select('CALL select_complaint_comment_user_vote(?)', [1]);
        
        $data = $datas[0];

        // $userId = Auth::id();
        $userId = 1;
        $profile = DB::select('CALL select_user(?)', [$userId])[0];

        return view('departemen.departemen_selesaikan_aduan', [
            'datas' => $datas,
            'data' => $data,
            'titlePage' => 'Feedback',
            'username' => $profile->name,
            'profile_picture' => $profile->profile_picture 
            ? ('profile_uploads/'. $profile->profile_picture) 
            : 'profile_uploads/profile_default.png'
        ]);
    }
}