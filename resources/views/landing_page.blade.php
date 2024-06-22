@extends('layout')

@section('title', 'Home')

@section('content')
<div class="relative flex items-center justify-center h-screen bg-transparent py-4 sm:pt-0">
    <div class="max-w-full mx-auto p-7 h-full w-full">

        <!-- Movie Card -->
        @if(isset($data))
        <div class="relative bg-transparent overflow-hidden shadow sm:rounded-lg h-full w-full">
            <img src="https://www.themoviedb.org/t/p/w1280{{ $data['backdrop_path'] ?? '' }}" alt="Poster" class="absolute top-0 left-0 w-full h-full object-cover">
            <div class="absolute bottom-0 left-0 h-3/6 w-full bg-gradient-to-t from-[#D65A31] to-transparent p-7 text-center">
                <h2 class="lg:text-3xl sm:text-xl text-white font-bold lg:mt-20 max-sm:mt-36">{{ $data['title'] ?? 'Title not available' }}</h2>
                <h1 class="lg:text-2xl sm:text-lg text-white font-md mt-2">({{ isset($data['release_date']) ? date('Y', strtotime($data['release_date'])) : 'N/A' }})</h1>
                <h3 class="lg:text-xl sm:text-md text-white font-semibold mt-2">Directed by: {{ $director }}</h3>
                <p class="leading-6 m-3 text-gray-300 max-lg:text-wrap lg:overflow-hidden max-sm:truncate">{{ $data['overview'] ?? 'Overview not available' }}</p>
            </div>
        </div>
        @else
             <p class="text-center text-gray-500 dark:text-gray-400">No movie data available.</p>
        @endif

    </div>
</div>
@endsection
