<?php

namespace App\Http\Controllers\Departemen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerpusController extends Controller
{
    public function index()
    {
        return view('departemen.perpus');
    }
}
