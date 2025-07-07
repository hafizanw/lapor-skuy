<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class lihat_aduan_anda_controller extends Controller
{
    public function store(Request $request) {
        // VOTE
        $user = Auth::user();
        $complaintId = $request->input('complaint_id');
        $voteType = $request->input('vote_type');


        // Cek apakah user sudah pernah vote
        $votes = DB::select('CALL update_insert_select_vote(?, ?, ?, ?)', [
            $user->id,
            $complaintId,
            null,
            "SELECT"
        ]);

        // Jika ada vote sebelumnya
        if ($votes && count($votes) > 0) {
            $vote = $votes[0];
        
            if ($vote->vote_type == $voteType) {
                return back()->with('message', 'Kamu sudah memberikan vote ini sebelumnya.');
            }

            DB::statement('CALL update_insert_select_vote(?, ?, ?, ?)', [
                $user->id,
                $complaintId,
                $voteType,
                "UPDATE"
            ]);
        } else {
            DB::statement('CALL update_insert_select_vote(?, ?, ?, ?)', [
                $user->id,
                $complaintId,
                $voteType,
                "INSERT"
            ]);
        }

        return redirect()->route('aduan-anda');
    }

    public function index(Request $request) {
        $user = Auth::user();
        $userId = Auth::id();
        $searchKeyword = $request->input('searchKeyword', '');
        $filterType = $request->input('filterType', '');
        $datas = DB::select('CALL select_complaint_user_vote(?, ?, ?)',[
            $searchKeyword,
            $filterType,
            $userId
        ]);
        $data = $datas[0] ?? null;

        $profile = DB::select('CALL select_user(?)', [$userId])[0];
        return view('lihat_aduan.lihat_aduan_anda', [
            'data' => $data,
            'datas' => $datas,
            'titlePage' => 'Aduan Anda',
            'displayLogo' => 'd-none d-md-inline',
            'username' => $profile->name,
            'profile_picture' => $profile->profile_picture 
            ? ('profile_uploads/'. $profile->profile_picture) 
            : 'profile_uploads/profile_default.png'
        ]);
    }
}
