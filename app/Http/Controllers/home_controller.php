<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class home_controller extends Controller
{
    public function index()
    {
        return view('home', [
            'titlePage' => 'Home'
        ]);
    }
}
