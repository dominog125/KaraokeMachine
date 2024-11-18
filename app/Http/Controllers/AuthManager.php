<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
