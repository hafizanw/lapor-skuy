<?php

namespace App\Http\Controllers\Departemen;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class departemen_list_aduan_controller extends Controller
{
    public function index(Request $request) { 
        $searchKeyword = $request->input('searchKeyword', '');
        $filterType = $request->input('filterType', '');
        $datas = DB::select('CALL select_complaint_user_vote(?, ?, ?)',[
            $searchKeyword,
            $filterType,
            0
        ]);
        $data = $datas[0];

        return view('departemen.departemen_list_aduan', [
            'data' => $data,
            'datas' => $datas,
            'titlePage' => 'Aduan',
        ]);
    }
}