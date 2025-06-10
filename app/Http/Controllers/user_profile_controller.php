<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class user_profile_controller extends Controller
{
    public function index() {
        return view('user_profile', [
            'titlePage' => 'Profile'
        ]);
    }
}
