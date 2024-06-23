<?php

use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

// Search
Route::post('/', [LandingPageController::class,'searchMovie']);
Route::get('/searchMovie', [LandingPageController::class, 'searchMovie'])->name('movie.search');

// Landing page
Route::get('/', [LandingPageController::class, 'index'])->name('landing.page');

