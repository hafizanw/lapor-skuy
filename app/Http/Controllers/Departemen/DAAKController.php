<?php

namespace App\Http\Controllers\Departemen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DAAKController extends Controller
{
    public function index(Request $request)
    {
        $searchKeyword = $request->input('searchKeyword', '');
        $filterType = $request->input('filterType', '');

        $datas = DB::select('CALL select_complaint_user_vote_departemen(?, ?, ?)',[
            $searchKeyword,
            $filterType,
            2
        ]);
        $data = $datas[0] ?? null;

        return view('departemen.DAAK.daak_list_aduan', [
            'data' => $data,
            'datas' => $datas,
            'titlePage' => 'Lihat Aduan',
            'displayLogo' => 'd-none d-md-inline',
        ]);
    }

    public function selesaikanAduan(Request $request)
    {
        $datas = DB::select('CALL select_complaint_comment_user_vote_departemen(?)', [$request->complaint_id]);
        $data = $datas[0];

        $complaint_data = DB::select('CALL select_users_name_departemen(?)', [$request->complaint_id])[0];

        return view('departemen.DAAK.daak_selesaikan_aduan', [
            'datas' => $datas,
            'data' => $data,
            'complaint_data' => $complaint_data,
            'titlePage' => 'Detail Aduan',
            'displayLogo' => 'd-none d-md-inline',
        ]);
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'complaint_id' => 'required',
            'feedback_content' => 'required|string',
            'feedback_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if($request->hasFile('feedback_image')) {
            $feedback_image = time() . '.' . $request->feedback_image->extension();
            $request->feedback_image->move(public_path('profile_uploads'), $feedback_image);
        } else {
            $feedback_image = null;
        }

        DB::statement('CALL insert_feedback(?, ?, ?)', [
            $validated['complaint_id'],
            $validated['feedback_content'],
            $feedback_image
        ]);
    }
}
