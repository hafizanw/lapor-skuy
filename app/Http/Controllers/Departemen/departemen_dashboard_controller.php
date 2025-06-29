<?php

namespace App\Http\Controllers\Departemen;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class departemen_dashboard_controller extends Controller
{
    public function index()
    {
        return view('departemen.departemen_dashboard', [
            'titlePage' => 'Dashboard',
        ]);
    }
}