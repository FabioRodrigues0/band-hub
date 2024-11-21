<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

// -------- Home ---------
Route::get('/', [IndexController::class,'index'])->name('index');
Route::get('/list/{table}', [IndexController::class, 'list'])->name('list');

// -------- Bands --------
Route::get('/bands/create', [BandController::class,'create'])->name('bands.create');
Route::post('/bands/{new}', [BandController::class,'store'])->name('bands.new');
Route::post('/bands/{band}', [BandController::class,'store'])->name('bands.update');
Route::get('/bands/{id}', [BandController::class,'destroy'])->name('bands.delete');

Route::get('/album/details/{slug}', [AlbumController::class,'show'])->name('albums.show');
Route::get('/bands/details/{slug}', [BandController::class,'show'])->name('bands.show');
Route::get('/artist/details/{slug}', [ArtistController::class,'show'])->name('artist.show');


