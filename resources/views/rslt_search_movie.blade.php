<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seacrh Movie</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen bg-gradient-to-br from-gray-800 to-[#464A52] relative ">
    <div class="w-full h-full inset-0 bg-inherit to-transparent backdrop-blur-xl -z-1">

    @include('header')

    <h1 class="text-3xl lg:text-2xl md:text-lg ml-6 text-start text-white font-bold my-4 ">Search Results . . .</h1>
    
    @if(session('error'))
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if(count($movies) > 0)
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mx-6 mb-6">
            @foreach($movies as $movie)
                <a href="{{ route('movie.detail', $movie['id']) }}">
                    
                    <div class="bg-gray-800 p-3 rounded shadow flex flex-col items-center border border-transparent hover:border-[#D65A31] hover:border-2 h-full">
                        @if($movie['poster_path'])
                            <img src="https://www.themoviedb.org/t/p/w220_and_h330_face{{ $movie['poster_path'] }}" alt="Poster" class="rounded mb-4">
                        @else
                            <img src="https://via.placeholder.com/220x330?text=No+Image" alt="No Poster" class="rounded mb-4">
                        @endif
                        <h2 class="font-bold mb-2 text-center text-gray-200 lg:text-xl md:text-base sm:text-base">{{ $movie['title'] }}</h2>
                        <p class="text-gray-300 font-semibold mb-1 text-center">{{ $movie['release_date'] }}</p>
                        <p class="text-center mx-2 hidden text-gray-400 mb-3 lg:line-clamp-6 md:line-clamp-2 sm:hidden">{{ $movie['overview'] }}</p>
                    </div>                    
                    
                </a>
            @endforeach
        </div>
    @else
        <p>No movies found for "{{ request()->input('title') }}".</p>
    @endif

    @include('footer')
</div>
</body>
</html>
