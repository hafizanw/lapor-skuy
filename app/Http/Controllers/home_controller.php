<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class home_controller extends Controller
{
    public function index()
    {
        $datas = DB::select('CALL select_complaint_user()');
        $data = $datas[0];

        return view('home', [
            'data' => $data,
            'datas' => $datas,
            'titlePage' => 'Home'
        ]);
    }
}
