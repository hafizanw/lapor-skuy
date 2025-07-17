<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class user_profile_controller extends Controller
{
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'nullable',
            'email' => 'nullable',
            'phone_number' => 'nullable|numeric',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:10240'
        ]);

        $userId = Auth::id();

        $datas = DB::select('CALL select_user(?)', [$userId]);
        $data = $datas[0];

        $name = $request->filled('name') ? $validated['name'] : $data->name;

        $email = $request->filled('email') ? $validated['email'] : $data->email;

        $phone_number = $request->filled('phone_number') ? $validated['phone_number'] : $data->phone_number;

        if($request->hasFile('profile_picture')) {
            $profile_picture = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('profile_uploads'), $profile_picture);
        } else {
            $profile_picture = $data->profile_picture;
        }

        DB::statement('CALL update_user(?, ?, ?, ?, ?)', [
            $userId,
            $name,
            $email,
            $phone_number,
            $profile_picture
        ]);

        return redirect()->back();
    }

    public function index() {
        $userId = Auth::id();
        $datas = DB::select('CALL select_user(?)', [$userId]);
        $data = $datas[0];
        return view('user_profile', [
            'data' => $data,
            'titlePage' => 'Profile',
            'displayLogo' => 'd-none d-md-inline',
            'username' => $data->name,
            'profile_picture' => $data->profile_picture 
            ? ('profile_uploads/'. $data->profile_picture) 
            : 'profile_uploads/profile_default.png'
        ]);
    }
}
