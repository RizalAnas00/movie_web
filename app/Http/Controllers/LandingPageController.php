<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LandingPageController extends Controller
{
    public function show()
    {
        return view("landing_page");
    }

    public function searchMovie(Request $request)
    {
        $title = $request->input('title');

        if (empty($title)) {
            return redirect()->route('landing_page')->with('error', 'Please enter a movie title.');
        }

        // Fetch movies from TMDB API based on search query
        $response = Http::asJson()
            ->get(config('services.tmdb.endpoint') . 'search/movie', [
                'api_key' => config('services.tmdb.api'),
                'query' => $title,
            ]);

        if ($response->failed()) {
            return redirect()->route('landing_page')->with('error', 'Failed to fetch movie data.');
        }

        $movies = $response->json()['results'];

        return view('rslt_search_movie', compact('movies'));
    }

    public function showRandomMovie()
    {
        // Fetch movies with a rating above 7
        $response = Http::asJson()
            ->get(config('services.tmdb.endpoint') . 'discover/movie', [
                'api_key' => config('services.tmdb.api'),
                'vote_average.gte' => 4,
                'vote_count.gte' => 200,
                'sort_by' => 'vote_count.desc'
            ]);

        if ($response->failed()) {
            return redirect()->route('landing_page')->with('error', 'Failed to fetch movie data.');
        }

        $movies = $response->json()['results'];

        // Filter movies that have posters
        $moviesWithPosters = array_filter($movies, function ($movie) {
            return isset($movie['poster_path']) && !empty($movie['poster_path']);
        });

        if (count($moviesWithPosters) > 0) {
            // Select a random movie from the filtered list
            $data = $moviesWithPosters[array_rand($moviesWithPosters)];

            // Fetch movie credits
            $creditsResponse = Http::asJson()->get(config('services.tmdb.endpoint') . 'movie/' . $data['id'] . '/credits?api_key=' . config('services.tmdb.api'));
            $creditsData = $creditsResponse->json();

            // Filter the director
            $director = collect($creditsData['crew'])->firstWhere('job', 'Director');

            // Fetch recommended movies based on genres
            $genreIds = implode(',', $data['genre_ids']);

            $recommendationsResponse = Http::asJson()->get(config('services.tmdb.endpoint') . 'discover/movie', [
                'api_key' => config('services.tmdb.api'),
                'with_genres' => $genreIds,
                'vote_average.gte' => 4,
                'vote_count.gte' => 200,
                'sort_by' => 'vote_count.desc',
                'page' => 1
            ]);

            $recommendations = $recommendationsResponse->json()['results'];

            return view('landing_page', [
                'data' => $data,
                'director' => $director ? $director['name'] : 'Director not available',
                'recommendations' => $recommendations
            ]);
        } else {
            return redirect()->route('landing_page')->with('error', 'No high-rated movies with posters found.');
        }
    }
}
