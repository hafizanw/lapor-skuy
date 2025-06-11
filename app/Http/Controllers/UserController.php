<?php
namespace App\Http\Controllers;

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
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login')->with('message', 'Anda telah berhasil logout!');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nim'      => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $nim_input = $request->input('nim');

        // PERUBAHAN: Cek dulu apakah user dengan NIM_NIDN tersebut ada
        $user = User::where('nim', $nim_input)->first();

        // Jika user tidak ditemukan sama sekali
        if (! $user) {
            return back()->withErrors([
                'nim' => 'NIM/NIDN tidak terdaftar.',
            ])->withInput($request->only('NIM_NIDN'));
        }

        $credentials = [
            'nim'      => $nim_input,
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('message', 'Anda telah berhasil login!');
        }

        // PERUBAHAN: Jika autentikasi gagal, artinya password salah.
        // Berikan pesan error spesifik dengan link "lupa password".
        return back()->withErrors([
            'password_error' => 'Password salah. Apakah Anda <a href="' . route('password.request') . '" class="alert-link">lupa password</a>?',
        ])->withInput($request->only('nim'));
    }
}