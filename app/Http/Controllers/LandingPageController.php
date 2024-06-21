<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LandingPageController extends Controller
{
    public function show(){
        return view("landing_page");
    }

    public function demo(){
        $tmdb_id = 436270; //Black Adam (2022) Movie TMDB ID
        $data = Http::asJson()
            ->get(config('services.tmdb.endpoint').'movie/'.$tmdb_id. '?api_key='.config('services.tmdb.api'));
            
        return view('landing_page',compact('data'));
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
}