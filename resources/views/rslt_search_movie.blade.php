<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Movie</title>
    @vite('resources/css/app.css')
    <style>
        /* Ensure full height for html and body */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* Background with large color circles */
        body {
            background: radial-gradient(circle at 20% 20%, #D65A31, transparent 20%),
                        radial-gradient(circle at 80% 30%, #ad2f0c, transparent 25%),
                        radial-gradient(circle at 40% 40%, #454e5c, transparent 30%),
                        radial-gradient(circle at 50% 80%, #ff7e4b, transparent 30%),
                        radial-gradient(circle at 30% 70%, #464A52, transparent 20%),
                        radial-gradient(circle at 70% 60%, #6B7280, transparent 25%);
            background-color: #464A52; /* Fallback background color */
            background-size: cover;
            background-position: center;
            background-repeat: repeat;
            min-height: 100%;
            overflow-x: hidden;
        }

        /* Container for the content to ensure it doesn't break */
        .content-container {
            backdrop-filter: blur(15px);
            background-color: rgba(70, 74, 82, 0.8); /* Semi-transparent gray */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            margin: 20px auto;
            max-width: 1200px;
            width: 90%;
            overflow: hidden;
        }
    </style>
</head>
<body>

    {{-- <div class="content-container"> --}}
        @include('header')

        <h1 class="text-3xl lg:text-2xl md:text-lg ml-6 text-start text-white font-bold my-4">Search Results . . .</h1>

        @if(session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if(count($movies) > 0)
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-4 gap-y-7 mx-6 mb-6">
                @foreach($movies as $movie)
                    <a href="{{ route('movie.detail', $movie['id']) }}">
                        <div class="bg-[#1c1d1f]/70 p-3 backdrop-blur-xl rounded flex flex-col items-center shadow-[#161617]/80 shadow-lg transition-all duration-300 ease-in-out border-2 border-transparent hover:border-[#D65A31] hover:border-opacity-80 hover:shadow-[#D65A31] hover:shadow-lg hover:backdrop-blur-sm h-full">
                            @if($movie['poster_path'])
                                <img src="https://www.themoviedb.org/t/p/w220_and_h330_face{{ $movie['poster_path'] }}" alt="Poster" class="rounded mb-4">
                            @else
                                <img src="https://via.placeholder.com/220x330?text=No+Image" alt="No Poster" class="rounded mb-4">
                            @endif
                            <h2 class="font-bold mb-2 text-center text-gray-200 lg:text-xl md:text-base sm:text-base">{{ $movie['title'] }}</h2>
                            <p class="text-gray-300 font-semibold mb-1 text-center">{{ date('Y', strtotime($movie['release_date'])) }}</p>
                            <p class="text-center mx-2 hidden text-gray-400 mb-3 lg:line-clamp-2 md:line-clamp-1 sm:hidden">{{ $movie['overview'] }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <p>No movies found for "{{ request()->input('title') }}".</p>
        @endif

        @include('footer')
    {{-- </div> --}}
    
</body>
</html>
