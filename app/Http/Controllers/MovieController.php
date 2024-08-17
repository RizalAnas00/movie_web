<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{

    public function detail($id)
    {
        $movie = Http::get(config('services.tmdb.endpoint') . 'movie/' . $id . '?api_key=' . config('services.tmdb.api'))->json();

        // Get the genres
        $genresResponse = Http::asJson()->get(config('services.tmdb.endpoint') . 'genre/movie/list', [
            'api_key' => config('services.tmdb.api'),
        ]);
        
        $genres = $genresResponse->successful() ? $genresResponse->json()['genres'] : [];
        
        // Get the director
        $creditsResponse = Http::asJson()->get(config('services.tmdb.endpoint') . 'movie/' . $movie['id'] . '/credits?api_key=' . config('services.tmdb.api'));
        $creditsData = $creditsResponse->json();
        
        $director = collect($creditsData['crew'])->firstWhere('job', 'Director');

        //get the age rating
        $ageRatingResponse = Http::asJson()->get(config('services.tmdb.endpoint') . 'movie/' . $movie['id'] . '/release_dates?api_key=' . config('services.tmdb.api'));
        $ageRating = $ageRatingResponse->json();

        $ratings = $ageRating['results'];
        $ratingForCountry = collect($ratings)
        ->firstWhere('iso_3166_1', 'US')['release_dates'][0]['certification'] ?? 'Not Available';
        
        // Base URL for images
        $baseImageUrl = 'https://image.tmdb.org/t/p/w500/';
        
        return view('detail', compact('movie', 'genres', 'director', 'baseImageUrl', 'ratingForCountry'));
        
    }
}
