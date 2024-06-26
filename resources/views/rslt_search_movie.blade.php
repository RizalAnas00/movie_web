@extends('layout')

@section('title', 'Search Results')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Search Results</h1>
    
    @if(session('error'))
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if(count($movies) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($movies as $movie)
                <div class="bg-gray-800 p-4 rounded shadow">
                    <img src="https://www.themoviedb.org/t/p/w220_and_h330_face{{ $movie['poster_path'] }}" alt="Poster" class="rounded ">
                    <h2 class="text-lg font-bold mb-2">{{ $movie['title'] }}</h2>
                    <p class="text-gray-400">{{ $movie['release_date'] }}</p>
                    <p>{{ $movie['overview'] }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p>No movies found for "{{ request()->input('title') }}".</p>
    @endif
@endsection
