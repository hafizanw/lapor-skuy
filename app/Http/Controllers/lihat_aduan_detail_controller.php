<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;


class Lihat_aduan_detail_controller extends Controller
{
    public function store(Request $request) {

        $validated = $request->validate([
            'Description' => 'required',
            'created_at' => 'required',
            'updated_at' => 'required',
        ]);

        // Mengambil user id
        // $userId = auth()->id();

        Comment::create([
            'Complaint_ID' => 1,
            'User_ID' => 1,
            'Description' => $validated['Description'],
            'created_at' => $validated['created_at'],
            'updated_at' => $validated['updated_at'],
        ]);
    }

    public function index() {
        return view('lihat_aduan.lihat_aduan_detail', [
            'comments' => Comment::all(),
            'titlePage' => 'Detail Aduan'
        ]);
    }
}
