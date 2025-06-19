<?php
namespace App\Http\Controllers;

class home_controller extends Controller
{
    public function index()
    {
        return view('home', [
            'titlePage' => 'Home',
        ]);
    }
}
