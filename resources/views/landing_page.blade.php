@extends('layout')

@section('title', 'Home')

@section('content')
<div class="relative flex mb-auto items-center justify-center h-screen bg-transparent py-4 sm:pt-0">
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

        <!-- Additional Content -->
        <div class="text-center mt-10">
            <h2 class="text-3xl text-white">You want some more?</h2>
            <p class="text-lg text-gray-300 mt-2">In case you love movies like {{ $data['title'] ?? 'this one' }}</p>

            <!-- Recommended Movies -->
            <div class="mt-5 flex overflow-x-scroll space-x-4 ">
                @foreach($recommendations as $movie)
                <div class="flex-none w-80 bg-gray-800 rounded-xl shadow-lg h-full">
                    <img src="https://www.themoviedb.org/t/p/w220_and_h330_face{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" class="w-full h-full object-cover rounded">
                    <div class="p-4">
                        <h3 class="text-lg text-white mt-2">{{ $movie['title'] }}</h3>
                        <p class="text-sm text-gray-400">({{ date('Y', strtotime($movie['release_date'])) }})</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
             <p class="text-center text-gray-500 dark:text-gray-400">No movie data available.</p>
        @endif

    </div>
</div>
@endsection
