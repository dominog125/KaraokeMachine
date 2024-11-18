<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome1');
});
Route::get('/login', [\App\Http\Controllers\AuthManager::class, 'login'])->name('login');
Route::get('/registration', function () {
    return view('registration');
});
