<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

Route::get('/', function () {
    return view('welcome');
});
Route::get('adminpanel', function () {
    return view('adminpanel');
});

//Zwykła rejestracja
Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');

//Zwykłe logowanie
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

// Logowanie przez Facebooka
Route::get('/login/facebook', [AuthManager::class, 'redirectToFacebookLogin'])->name('login.facebook');
Route::get('/login/facebook/callback', [AuthManager::class, 'handleFacebookLoginCallback'])->name('login.facebook.callback');

//Zmiana hasła
Route::get('/set-password/{id}', [AuthManager::class, 'showSetPasswordForm'])->name('set-password');
Route::post('/set-password/{id}', [AuthManager::class, 'setPassword'])->name('set-password.post');

//Widok po zalogowaniu
Route::get('/home/{name}', [AuthManager::class, 'home'])->name('home');
