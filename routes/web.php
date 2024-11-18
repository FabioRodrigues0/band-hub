<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

// -------- Home ---------
Route::get('/', [IndexController::class,'index'])->name('index');
