<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function index()
    {
        return view('layouts.login');
    }
    public function logout()
    {
        return redirect('/')->with('message', 'You have been logged out!');
    }

    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'nim'      => ['required', 'int', 'min:12', Rule::unique('users', 'nim')],
            'password' => ['required'],
        ]);
        $loginFields = [
            'nim'      => $request->nim,
            'password' => $request->password,
        ];
        if (Auth::attempt($loginFields)) {
            return "login success";
        } else {
            return redirect('/login')->route('auth')->withErrors('Login failed! Please check your NIM and password.');
        }
    }
}
