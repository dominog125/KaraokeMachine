<?php

namespace App\Http\Controllers;

use App\Models\UsersLibrary\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Wyświetla listę wszystkich użytkowników.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
}
