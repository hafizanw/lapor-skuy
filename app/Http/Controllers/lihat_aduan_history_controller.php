<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class lihat_aduan_history_controller extends Controller
{
    public function index(Request $request) {
        
        $userId = Auth::id();
        $searchKeyword = $request->input('searchKeyword', '');
        $filterType = $request->input('filterType', '');

        $datas = DB::select('CALL select_complaint_history(?, ?, ?)',[
            $searchKeyword,
            $filterType,
            0
        ]);
        $data = $datas[0] ?? null;

        $profile = DB::select('CALL select_user(?)', [$userId])[0];
      
        return view('lihat_aduan.lihat_aduan_history', [
            'data' => $data,
            'datas' => $datas,
            'titlePage' => 'Lihat Aduan',
            'displayLogo' => 'd-none d-md-inline',
            'username' => $profile->name,
            'profile_picture' => $profile->profile_picture 
            ? ('profile_uploads/'. $profile->profile_picture) 
            : 'profile_uploads/profile_default.png'
        ]);
    }

    public function historyDetail(Request $request)
    {
        $datas = DB::select('CALL select_complaint_history_detail(?)', [$request->complaint_id]);
        $data = $datas[0];


        $complaint_data = DB::select('CALL select_users_history(?)', [$request->complaint_id])[0];

        $userId = Auth::id();
        $profile = DB::select('CALL select_user(?)', [$userId])[0];

        return view('lihat_aduan.lihat_aduan_history_detail', [
            'datas' => $datas,
            'data' => $data,
            'complaint_data' => $complaint_data,
            'titlePage' => 'Detail Aduan',
            'displayLogo' => 'd-none d-md-inline',
            'username' => $profile->name,
            'profile_picture' => $profile->profile_picture 
            ? ('profile_uploads/'. $profile->profile_picture) 
            : 'profile_uploads/profile_default.png'
        ]);
    }
}
