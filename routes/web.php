<?php

use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

// Search
Route::post('/search', [LandingPageController::class, 'searchMovie'])->name('movie.search');
Route::get('/searchMovie', [LandingPageController::class, 'searchMovie'])->name('movie.search.get');

// Landing page
Route::get('/', [LandingPageController::class, 'index'])->name('landing.page');

