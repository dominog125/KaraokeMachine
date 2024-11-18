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

Route::get('/registration', [\App\Http\Controllers\AuthManager::class , 'registration'])->name('registration');


}
