<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BandController;
use App\Http\Controllers\Api\AlbumController;
use App\Http\Controllers\Api\ArtistController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Band routes
    Route::post('/band', [BandController::class, 'store'])->middleware('can:create,App\Models\Band');
    Route::put('/band/{band}', [BandController::class, 'update']);
    Route::delete('/band/{band}', [BandController::class, 'destroy']);

    // Album routes
    Route::post('/album', [AlbumController::class, 'store'])->middleware('can:create,App\Models\Album');
    Route::put('/album/{album}', [AlbumController::class, 'update']);
    Route::delete('/album/{album}', [AlbumController::class, 'destroy']);

    // Artist routes
    Route::post('/artist', [ArtistController::class, 'store'])->middleware('can:create,App\Models\Artist');
    Route::put('/artist/{artist}', [ArtistController::class, 'update']);
    Route::delete('/artist/{artist}', [ArtistController::class, 'destroy']);
});
