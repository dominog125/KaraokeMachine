<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\LyricsController;
use App\Http\Controllers\RequestController;




Route::get('/', function () {return view('welcome');})->name('welcome');
Route::get('/', [SongController::class, 'searchTop5'])->name('welcome');

//Wyszukiwarka piosenek

Route::get('/searchbar', [SongController::class, 'search'])->name('searchbar');
Route::get('/search', [SongController::class, 'search'])->name('song.search');

//piosenka
Route::get('/song/{id}', [SongController::class, 'showSong']);
Route::get('/song/{id}', [SongController::class, 'showSong'])->name('song.show');

//lyrics changerequest

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
    Route::get('/requests/create/{song_id}', [RequestController::class, 'create'])->name('requests.create');
    Route::post('/requests', [RequestController::class, 'store'])->name('requests.store');
    Route::get('/change-password', [AuthManager::class, 'showChangePasswordForm'])->name('show-change-password');
    Route::post('/change-password', [AuthManager::class, 'changePassword'])->name('change-password');
});

//Widok po zalogowaniu
Route::get('/home/{name}', [AuthManager::class, 'home'])->name('home');

//Wylogowanie się z konta
Route::post('/logout', [AuthManager::class, 'logout'])->name('logout');


//Operacje administratora
Route::middleware(['auth','isAdmin'])->group(function()   {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/admin/users', UserController::class);
    Route::post('/admin/user/{user}/ban', [AdminController::class, 'banUser'])->name('admin.user.ban');
    Route::resource('/admin/songs', SongController::class);

    Route::get('/admin/songs/{song}', [SongController::class, 'show'])->name('admin.songs.show');
    Route::resource('/admin/categories', CategoryController::class);
    Route::resource('/admin/authors', AuthorController::class);
    Route::post('/admin/changes/{proposal}/{action}', [AdminController::class, 'handleChange']);

    Route::post('/lyrics/store', [LyricsController::class, 'storeFromShow'])->name('lyrics.storeFromShow');
    Route::put('/lyrics/update/{lyrics}', [LyricsController::class, 'updateFromShow'])->name('lyrics.updateFromShow');
    Route::delete('/lyrics/destroy/{lyrics}', [LyricsController::class, 'destroyFromShow'])->name('lyrics.destroyFromShow');
});


