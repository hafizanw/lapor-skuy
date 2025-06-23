<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class lihat_aduan_detail_controller extends Controller
{
    public function store(Request $request) {

        $validated = $request->validate([
            'complaint_id' => 'required',
            'description' => 'required',
            'created_at' => 'required',
            'updated_at' => 'required',
        ]);

        // Mengambil user id
        $userId = Auth::id();

        DB::statement('CALL insert_comment(?, ?, ?)', [
            $validated['complaint_id'],
            $userId,
            $validated['description']
        ]);
    }

    public function index(Request $request) {
        $datas = DB::select('CALL select_complaint_comment_user_vote(?)', [$request->complaint_id]);
        $data = $datas[0];

        $userId = Auth::id();
        $profile = DB::select('CALL select_user(?)', [$userId])[0];

        return view('lihat_aduan.lihat_aduan_detail', [
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
