<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller
{
    //
    public function login()
    {
        return view('login');
    }

    public function registration(){
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

}


