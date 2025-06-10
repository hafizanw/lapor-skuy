<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class faq_controller extends Controller
{
    public function index() {
        return view('faq.faq', [
            'titlePage' => 'FAQ'
        ]);
    }
}
