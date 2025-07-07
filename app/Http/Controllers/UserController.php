<?php
namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        return view('login');
    }
    public function logout(Request $request)
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        } elseif (Auth::guard('department')->check()) {
            Auth::guard('department')->logout();
        }
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('message', 'Anda telah berhasil logout!');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'identifier' => 'required|string',
            'password'   => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $identifier = $request->input('identifier');
        $password   = $request->input('password');
        $department = Department::where('name', $identifier)->first();
        $user       = User::where('nim', $identifier)->first();

        $user = User::where('nim', $identifier)->first();
        if ($user) {if (Auth::guard('web')->attempt(['nim' => $identifier, 'password' => $password])) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('message', 'Anda telah berhasil login!');
        }}

        if ($department) {
            if (Auth::guard('department')->attempt(['name' => $identifier, 'password' => $password])) {
                $request->session()->regenerate();
                return redirect()->route('department.dashboard')->with('message', 'Login Departemen berhasil!');
            } else {
                return back()->withErrors([
                    'password' => 'Password salah.',
                ])->withInput();
            }
        }

        if (! $user && ! $department) {
            return back()->withErrors([
                'identifier' => 'NIM/NIDN tidak terdaftar.',
            ])->withInput($request->only('identifier'));
        }
        return back()->withErrors([
            'password_error' => 'Password salah. Apakah Anda <a href="' . route('password.request') . '" class="alert-link">lupa password</a>?',
        ])->withInput($request->only('identifier'));
    }
}
