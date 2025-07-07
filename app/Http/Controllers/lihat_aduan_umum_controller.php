<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class lihat_aduan_umum_controller extends Controller
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

        return redirect()->route('aduan-umum');
    }

    public function index(Request $request) {
        
        $user = Auth::user();
        $searchKeyword = $request->input('searchKeyword', '');
        $filterType = $request->input('filterType', '');

        $datas = DB::select('CALL select_cser_omplaint_uvote(?, ?, ?)',[
            $searchKeyword,
            $filterType,
            0
        ]);
        $data = $datas[0];

        // Tambahkan pengecekan keamanan untuk memastikan profil ditemukan
        if (empty($profileResult)) {
            // Anda bisa mengarahkan ke halaman login atau menampilkan error
            // jika pengguna tidak terautentikasi atau datanya tidak ada
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
        $profile = $profileResult[0];

        // Variabel 'data' tidak lagi dikirim karena tidak aman.
        // View akan langsung menggunakan 'datas'.
        return view('lihat_aduan.lihat_aduan_umum', [
            'datas'           => $datas,
            'titlePage'       => 'Lihat Aduan',
            'username'        => $profile->name,
            'profile_picture' => $profile->profile_picture
            ? ('profile_uploads/' . $profile->profile_picture)
            : 'profile_uploads/profile_default.png',
        ]);
    }
}
