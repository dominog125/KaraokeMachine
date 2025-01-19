<?php

namespace App\Http\Controllers;

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

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',


        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if (!$user) {
            return redirect()->route('registration')->with('error', 'Registration failed');
        }

        return redirect()->route('login')->with('success', 'Registration success');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',

        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $userName = Auth::user()->name;
            return redirect()->route('home', ['name' => $userName]);
        }
        return redirect()->route('login')->with('error', 'Wrong email or password');

    }

    public function home($name)
    {
        return view('home', ['name' => $name]);
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
                Auth::login($user);
                return redirect()->route('home', ['name' => $facebookUser->name]);
            } else {
                $newUser = User::create([
                    'name' => $facebookUser->name,
                    'email' => $facebookUser->email,
                    'facebook_id' => $facebookUser->id,
                    'password' => Hash::make('123456dummy'),
                ]);

                return redirect()->route('set-password', ['id' => $newUser->id]);
            }
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Błąd podczas logowania, spróbuj później.');
        }
    }

    public function showSetPasswordForm($id)
    {
        $user = User::find($id);

        if (!$user ) {
            return redirect()->route('login')->with('error', 'Nieprawidłowe konto.');
        }

        return view('set-password', compact('user'));
    }

    public function setPassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user = User::find($id);

        if (!$user) {
            return redirect()->route('login')->with('error', 'Nieprawidłowe konto.');
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('home', ['name' => $user->name])->with('success', 'Hasło zostało pomyślnie ustawione. Możesz się teraz zalogować.');
    }

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Zostałeś wylogowany.');
    }

}

