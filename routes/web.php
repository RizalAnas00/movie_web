<?php

use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'demo']);

//search
Route::post('/', [LandingPageController::class,'searchMovie']);
Route::get('/searchMovie', [LandingPageController::class, 'searchMovie'])->name('movie.search');

//landingpage
Route::get('/', [LandingPageController::class, 'showRandomMovie'])->name('landing.page');
