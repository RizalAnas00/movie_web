<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

// Search
Route::get('/', [LandingPageController::class, 'index'])->name('landing.page');

Route::group(['prefix' => 'movie'], function () {

    Route::get('/searchMovie', [LandingPageController::class, 'searchMovie'])->name('movie.search');
    Route::get('/detail/{id}', [MovieController::class, 'detail'])->name('movie.detail');
    Route::get('/genre/{id}', [MovieController::class, 'byGenre'])->name('movie.genre');
});


