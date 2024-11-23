<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Public routes (no authentication required)
Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/search', [IndexController::class, 'search'])->name('search');
Route::get('/list/{type}', [IndexController::class, 'list'])->name('list');
Route::get('/artist/{slug}', [ArtistController::class, 'show'])->name('artists.show');
Route::get('/band/{slug}', [BandController::class, 'show'])->name('bands.show');
Route::get('/album/{slug}', [AlbumController::class, 'show'])->name('albums.show');

// Protected routes (require authentication)
Route::middleware(['auth'])->group(function () {
    // Create, update, delete operations for resources
    Route::resource('artists', ArtistController::class)->except(['show']);
    Route::resource('bands', BandController::class)->except(['show']);
    Route::resource('albums', AlbumController::class)->except(['show']);

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Form routes
    Route::get('/forms/{type}/{mode}/{id?}', [FormController::class, 'getForm'])->name('forms.get');
});

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
});

Route::post('logout', [LoginController::class, 'logout'])->name('logout');
