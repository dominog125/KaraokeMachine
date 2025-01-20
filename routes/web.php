<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
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
Route::middleware('auth')->group(function () {
    Route::get('/change-password', [AuthManager::class, 'showChangePasswordForm'])->name('show-change-password');
    Route::post('/change-password', [AuthManager::class, 'changePassword'])->name('change-password');
});

//Widok po zalogowaniu
Route::get('/home/{name}', [AuthManager::class, 'home'])->name('home');

//Wylogowanie się z konta
Route::post('/logout', [AuthManager::class, 'logout'])->name('logout');


//Operacje administratora
Route::middleware(['auth','isAdmin'])->group(function()   {
    Route::get('/admin', [AdminController::class, 'dashboard']);
    Route::resource('/admin/users', UserController::class);
    Route::post('/admin/user/{user}/ban', [AdminController::class, 'banUser'])->name('admin.user.ban');
    Route::resource('/admin/songs', SongController::class);
    Route::resource('/admin/categories', CategoryController::class);
    Route::resource('/admin/authors', AuthorController::class);
    Route::post('/admin/changes/{proposal}/{action}', [AdminController::class, 'handleChange']);
});
