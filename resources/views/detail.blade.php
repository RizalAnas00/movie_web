<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $movie['title'].' - MovieList' ?? 'Detail Movie - MovieList' }}</title>
    <meta name="description" content="Dive into the world of {{ $movie['title'] }} with our movie detail page. Find out about the plot, cast, and more.">
    <meta name="keywords" content="movie, detail, {{ $movie['title'] }}, genres, cast, plot">

    @vite('resources/css/app.css')
    <style>
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('{{ $baseImageUrl . $movie['backdrop_path'] }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            filter: blur(6px);
            z-index: -1; /* Ensure the background is behind all other content */
        }

        body {
            position: relative;
            min-height: 100vh;
            background-color: rgb(0, 0, 0); /* Optional: black overlay with 80% opacity */
        }

        .content-container {
            z-index: 10; /* Ensure content is above the blurred background */
            position: relative;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">

    @include('header')
    
    @if(session('error'))
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="content-container container mx-auto p-8">
        <div class="p-6 rounded-lg shadow-xl shadow-black/50 backdrop-blur-xl bg-[#32353b]/50">
            <!-- Konten detail film -->
            <div class="flex flex-col md:flex-row md:items-start md:justify-center">
                <!-- Movie Title (Displayed above the poster on smaller screens) -->
                <h1 class="text-4xl font-bold mb-4 text-white text-center md:hidden">
                    {{ $movie['title'] ?? 'N/A' }}
                </h1>
    
                <!-- Movie Poster -->
                <div class="w-full md:w-1/3 text-center mb-6 md:mb-0">
                    <img src="{{ $baseImageUrl . $movie['poster_path'] }}" alt="Movie Poster" class="rounded-lg shadow-lg mx-auto">
                    <!-- Movie Tagline -->
                    <p class="text-center text-gray-200 mt-6">{{ $movie['tagline'] ?? 'N/A' }}</p>
                </div>
    
                <!-- Movie Details -->
                <div class="w-full md:w-2/3 md:pl-8 flex flex-col justify-center text-center md:text-left">
                <!-- Movie Title (Displayed only on larger screens) -->
                <h1 class="text-4xl font-bold mb-4 text-white hidden md:block text-center">
                    {{ $movie['title'] ?? 'N/A' }}
                </h1>

                <p class="text-gray-400 mb-2 text-sm sm:text-base md:text-lg text-center">
                    {{ implode(', ', array_column($movie['genres'], 'name')) ?? 'N/A'}}
                </p>
                <p class="text-gray-400 mb-2 text-sm sm:text-base md:text-lg text-center">
                    Directed by <span class="text-gray-200 font-semibold">{{ $director['name'] ?? 'N/A'}}</span>
                </p>
                <p class="text-gray-400 mb-8 text-sm sm:text-base md:text-lg text-center">
                    Content Rating: <span class="text-gray-200 font-extralight">{{ $ratingForCountry ?? 'N/A'}}</span>
                </p>

                    <div class="mb-8">
                        <span class="text-gray-300 line-clamp-4 sm:line-clamp-none">
                            "{{ $movie['overview'] }}"
                        </span>
                    </div>
    
                    <!-- Producer -->
                    <div class="flex flex-col sm:flex-row mb-2">
                        <span class="font-semibold text-white">Producer :</span>
                        <span class="text-gray-300 sm:ml-2">{{ $producer['name'] ?? 'N/A'}}</span>
                    </div>
    
                    <!-- Cinematographer -->
                    <div class="flex flex-col sm:flex-row mb-2">
                        <span class="font-semibold text-white">Cinematographer :</span>
                        <span class="text-gray-300 sm:ml-2">{{ $cinematographer['name'] ?? 'N/A'}}</span>
                    </div>
    
                    <!-- Release Date -->
                    <div class="flex flex-col sm:flex-row mb-2">
                        <span class="font-semibold text-white">Release Date :</span>
                        <span class="text-gray-300 sm:ml-2">{{ $movie['release_date'] ?? 'N/A'}}</span>
                    </div>
                    
                    <!-- Production Companies List -->
                    <div class="flex flex-col sm:flex-row md:flex-col mb-2">
                        <span class="font-semibold text-white">Production Companies :</span>
                        <span class="text-gray-300 mt-2 sm:mt-0 sm:ml-1">
                            @if(!empty($movie['production_companies']))
                                {{ implode(' , ',array_column($movie['production_companies'], 'name')) }}
                            @else
                                N/A
                            @endif
                        </span>
                    </div>
    
                    <!-- Budget -->
                    <div class="flex flex-col sm:flex-row mb-2">
                        <span class="font-semibold text-white">Budget :</span>
                        <span class="text-gray-300 sm:ml-2">${{ number_format($movie['budget'], 0, ',', '.') ?? 'N/A'}}</span>
                    </div>
    
                    <!-- Revenue -->
                    <div class="flex flex-col sm:flex-row mb-2">
                        <span class="font-semibold text-white">Revenue :</span>
                        <span class="text-gray-300 sm:ml-2">${{ number_format($movie['revenue'], 0, ',', '.') ?? 'N/A'}}</span>
                    </div>
    
                    <!-- Runtime -->
                    <div class="flex flex-col sm:flex-row mb-2">
                        <span class="font-semibold text-white">Runtime :</span>
                        <span class="text-gray-300 sm:ml-2">{{ $movie['runtime'] ?? 'N/A'}} Minutes</span>
                    </div>
    
                    <!-- Status -->
                    <div class="flex flex-col sm:flex-row mb-2">
                        <span class="font-semibold text-white">Status :</span>
                        <span class="text-gray-300 sm:ml-2">{{ $movie['status'] ?? 'N/A'}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('footer')
    
</body>
</html>
