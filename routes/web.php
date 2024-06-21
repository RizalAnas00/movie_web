<?php

use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'demo'])->name('landing.page');

//search
Route::post('/', [LandingPageController::class,'searchMovie']);
Route::get('/searchMovie', [LandingPageController::class, 'searchMovie'])->name('movie.search');
