<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome1');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/registration', function () {
    return view('registration');
});
