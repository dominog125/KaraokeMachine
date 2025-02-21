<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\UsersLibrary\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthManager extends Controller
{
    //
    public function login()
    {
        return view('login');
    }

    public function registration()
    {
        return view('registration');
    }

    public function registrationPost(Request $request)
    {
        try {
            $request->validate(
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users',
                    'password' => [
                        'required',
                        'string',
                        'min:6', // Minimalna długość 6 znaków
                        'regex:/[A-Z]/', // Musi zawierać dużą literę
                        'regex:/[a-z]/', // Musi zawierać małą literę
                        'regex:/[0-9]/', // Musi zawierać cyfrę
                        'regex:/[@$!%*?&]/' // Musi zawierać znak specjalny
                    ],
                ]
            );

            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->password);
            $user = User::create($data);

            if (!$user) {
                return redirect()->route('registration')->with('error', 'Registration failed');
            } else {
                Auth::login($user);
                return redirect()->route('home', ['name' => $user->name])->with('success', 'Registration success');
            }
        } catch (\Exception $e) {
            return redirect()->route('registration')->with('error', 'Registration failed');
        }
    }


    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');


        $user = User::where('email', $request->email)->first();

        if ($user && $user->is_banned) {
            return redirect()->route('login')->with('error', 'Your account is banned.');
        }

        if (Auth::attempt($credentials)) {
            $userName = Auth::user()->name;
            return redirect()->route('home', ['name' => $userName]);
        }
        return redirect()->route('login')->with('error', 'Wrong email or password');

    }

    public function home()
    {
        $user = Auth::user();
        $songsLikes = Song::orderBy('Likes', 'desc')->limit(3)->get();
        $songsNew = Song::orderBy('ID', 'asc')->limit(3)->get();

        return view('home', [
            'user' => $user,
            'songsLikes' => $songsLikes,
            'songsNew' => $songsNew,
        ]);
    }
    // Facebook

    public function redirectToFacebookLogin()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    public function handleFacebookLoginCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->stateless()->user();

            $user = User::where('email', $facebookUser->getEmail())->first();

            if ($user) {
                if ($user->is_banned) {
                    return redirect()->route('login')->with('error', 'Your account is banned.');
                }
                Auth::login($user);
                return redirect()->route('home', ['name' => $facebookUser->name]);
            } else {
                $newUser = User::create([
                    'name' => $facebookUser->name,
                    'email' => $facebookUser->email,
                    'facebook_id' => $facebookUser->id,
                    'password' => Hash::make('123456dummy'),
                ]);

                return redirect()->route('login');
            }
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Error while logging in, try later.');
        }
    }

    public function showChangePasswordForm()
    {
        return view('change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => [
                        'required',
                        'confirmed',
                        'string',
                        'min:6', // Minimalna długość 6 znaków
                        'regex:/[A-Z]/', // Musi zawierać dużą literę
                        'regex:/[a-z]/', // Musi zawierać małą literę
                        'regex:/[0-9]/', // Musi zawierać cyfrę
                        'regex:/[@$!%*?&]/' // Musi zawierać znak specjalny
                    ],
        ]);

        $user = Auth::user();

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('home', ['name' => $user->name])
            ->with('success', 'The password has been successfully changed');
    }

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out.');
    }

}

