<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     */
    public function redirectToGoogle()
    {

        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     */
    public function handleGoogleCallback(Request $request) // <-- TAMBAHKAN Request $request
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('google_id', $googleUser->id)->first();

            if ($user) {
                Auth::login($user);
                $request->session()->regenerate(); // <-- PERBAIKAN KRITIS
                return redirect()->route('dashboard');
            } else {
                $newUser = User::create([
                    'name'      => $googleUser->name,
                    'email'     => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password'  => Hash::make(Str::random(24)),
                ]);

                Auth::login($newUser);
                $request->session()->regenerate(); // <-- PERBAIKAN KRITIS
                return redirect()->route('dashboard');
            }

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Terjadi kesalahan saat login dengan Google.');
        }
    }
}
