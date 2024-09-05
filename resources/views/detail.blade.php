<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Movie</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen bg-gray-900 relative">

    @include('header')
    
    @if(session('error'))
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="container mx-auto p-8">
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
            <div class="flex">
                <!-- Movie Poster -->
                <div class="w-1/3 center">
                    <img src="{{ $baseImageUrl . $movie['poster_path'] }}" alt="Movie Poster" class="rounded-lg shadow-lg">
                    <!-- Movie Tagline -->
                    <p class="text-center text-gray-200 mt-6">{{ $movie['tagline']?? 'N/A' }}</p>
                </div>
                
                <!-- Movie Details -->
                <div class="w-2/3 pl-8 flex flex-col justify-center items-center text-center">
                    <h1 class="text-4xl font-bold mb-4 text-white">{{ $movie['title'] ?? 'N/A' }}</h1>
                    <p class="text-gray-400 mb-2">
                        {{ implode(', ', array_column($movie['genres'], 'name')) ?? 'N/A'}}
                    </p>
                    <p class="text-gray-400 mb-2 text-sm">Directed by <span class="text-gray-200 font-semibold text-lg">{{ $director['name'] ?? 'N/A'}}</span></p>
                    <p class="text-gray-400 mb-8 text-sm">Content Rating : <span class="text-gray-200 font-extralight text-lg">{{ $ratingForCountry ?? 'N/A'}}</span></p>
                    <div class="flex w-full mb-2">
                        <span class="text-gray-300 mb-8 ml-2 text-left">
                            "{{ $movie['overview'] }}"
                        </span>
                    </div>

                    <!-- Producer -->
                    <div class="flex w-full mb-2">
                        <span class="font-semibold text-white">Producer : </span>
                        <span class=" text-gray-400 ml-2">{{ $producer['name'] ?? 'N/A'}}</span>
                    </div>

                    <!-- Runtime -->
                    <div class="flex w-full mb-2">
                        <span class="font-semibold text-white">Cinematographer : </span>
                        <span class=" text-gray-400 ml-2">{{ $cinematographer['name'] ?? 'N/A'}}</span>
                    </div>

                    <!-- Release Date -->
                    <div class="flex w-full mb-2">
                        <span class="font-semibold text-white">Release Date :</span>
                        <span class="text-gray-400 ml-2">{{ $movie['release_date'] ?? 'N/A'}}</span>
                    </div>
                    
                    <!-- Production Companies List -->
                    <div class="flex w-full mb-2">
                        <div class="whitespace-nowrap text-left">
                            <h1 class="font-semibold text-white">Production Companies :</h1>
                        </div>
                        <div class="text-gray-400 text-left ml-1">
                            @if(!empty($movie['production_companies']))
                                <span>
                                    {{ implode(' , ' , array_column($movie['production_companies'], 'name')) }}
                                </span>
                            @else
                                <span>N/A</span>
                            @endif

                        </div>
                    </div>
    
                    <!-- Budget -->
                    <div class="flex w-full mb-2">
                        <span class="font-semibold text-white">Budget :</span>
                        <span class="text-gray-400 ml-2">${{ number_format($movie['budget'], 0, ',', '.') ?? 'N/A'}}</span>
                    </div>
    
                    <!-- Revenue -->
                    <div class="flex w-full mb-2">
                        <span class="font-semibold text-white">Revenue :</span>
                        <span class="text-gray-400 ml-2">${{ number_format($movie['revenue'], 0, ',', '.') ?? 'N/A'}}</span>
                    </div>
    
                    <!-- Runtime -->
                    <div class="flex w-full mb-2">
                        <span class="font-semibold text-white">Runtime : </span>
                        <span class=" text-gray-400 ml-2">{{ $movie['runtime'] ?? 'N/A'}} Minutes</span>
                    </div>

                    <!-- Status -->
                    <div class="flex w-full mb-2">
                        <span class="font-semibold text-white">Status : </span>
                        <span class=" text-gray-400 ml-2">{{ $movie['status'] ?? 'N/A'}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('footer')
    
</body>
</html>
