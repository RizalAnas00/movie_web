<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieList</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen bg-gray-900 relative">

    @include('header')

    <!-- Background with gradient and blur -->
    <div class="absolute inset-0 bg-gradient-to-b from-[#d65a3183] to-transparent backdrop-blur-xl -z-10"></div>
    
    <main class="flex-grow p-4">
        <div class="relative items-center justify-center bg-transparent py-4 sm:pt-0">
            <div class="max-w-full flex-grow mx-auto p-7 w-full min-h-screen">
    
                <!-- Movie Card -->
                @if(isset($data))
                <div class="relative bg-transparent overflow-hidden shadow sm:rounded-lg lg:rounded-2xl w-full h-auto">
                    <img src="https://www.themoviedb.org/t/p/w1280{{ $data['backdrop_path'] ?? '' }}" alt="Poster" class="w-full h-auto object-cover">
                    <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-[#D65A31] to-transparent p-7 text-center">
                        <h2 class="lg:text-3xl sm:text-xl text-white font-bold lg:mt-20 max-sm:mt-36">{{ $data['title'] ?? 'Title not available' }}</h2>
                        <h1 class="lg:text-2xl sm:text-lg text-white font-md mt-2">({{ isset($data['release_date']) ? date('Y', strtotime($data['release_date'])) : 'N/A' }})</h1>
                        <h3 class="lg:text-xl sm:text-md text-white font-semibold mt-2">Directed by: {{ $director }}</h3>
                        <p class="leading-6 m-3 text-gray-300 max-lg:text-wrap lg:overflow-hidden max-sm:truncate">{{ $data['overview'] ?? 'Overview not available' }}</p>
                    </div>
                </div>
    
                <div>
                    <h1 class="text-white text-2xl lg:text-4xl font-bold font-mono text-center pt-20">You Want Some More?</h1>
                    <h2 class="text-white text-lg lg:text-2xl font-normal font-mono text-left pb-4 pt-12">In case you love movies like<span class="font-bold text-xl lg:text-3xl text-[#D65A31]"> {{ $data['title'] ?? 'Title not available' }} </span> </h2>
                </div>
    
                <!-- container rekomendasi -->
                <div class="relative w-full">
    
                    <!-- Scroll Button -->
                    <button class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full z-10 focus:outline-none slideLeft">
                        <img src="{{ asset('images/left.svg') }}" alt="Arrow Left" class="w-6 h-6">
                    </button>
                    <!-- Scroll Button -->
    
                    {{-- recommendation-list --}}
                    <div class="py-4 px-2 flex overflow-x-auto gap-5 no-scrollbar w-full scroll-smooth" id="recommendation-list">
                        @foreach($recommendations as $movie)
                        <a href="{{ route('movie.detail', $movie['id']) }}">
                        <div class="flex-none w-96 h-56 bg-gray-800 rounded-xl shadow-lg relative overflow-hidden outline-none outline-4 hover:outline-[#D65A31]">
                            <img src="https://www.themoviedb.org/t/p/w500{{ $movie['backdrop_path'] }}" alt="{{ $movie['title'] }}" class="w-full h-full object-cover rounded">
                            <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/80 to-transparent p-4 text-left backdrop-blur-sm pointer-events-none">
                                <h3 class="text-md text-white font-bold truncate">{{ $movie['title'] }}</h3>
                                <p class="text-sm text-gray-400">({{ date('Y', strtotime($movie['release_date'])) }})</p>
                            </div>
                        </a>
                        </div>
                        @endforeach
                    </div>
                    {{-- recommendation-list --}}
    
                    <!-- Scroll Button -->
                    <button class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full z-10 focus:outline-none slideRight">
                        <img src="{{ asset('images/right.svg') }}" alt="Arrow Right" class="w-6 h-6">
                    </button>
                    <!-- Scroll Button -->
                </div>
                @else
                    <p class="text-center text-gray-500 dark:text-gray-400">No movie data available.</p>
                @endif
    
                <div>
                    <h2 class="text-white text-lg lg:text-2xl font-normal font-mono text-left pb-4 pt-8">All Genres</h2>
                </div>
    
                <!-- Container Genres -->
                <div class="relative w-full">
                    <!-- Scroll Buttons -->
                    <button class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full z-10 focus:outline-none slideLeftGenre">
                        <img src="{{ asset('images/left.svg') }}" alt="Arrow Left" class="w-6 h-6">
                    </button>
                    <!-- Scroll Buttons -->
                
                    {{-- Genre List --}}
                    <div class="py-6 px-2 flex overflow-x-auto gap-5 no-scrollbar w-full scroll-smooth" id="genre-list">
                        @if(isset($genres) && count($genres) > 0)
                            @foreach($genres as $genre)
                                <a href="{{ route('movie.genre', $genre['id']) }}">
                                    <div class="flex-none bg-[#D65A31] w-40 h-16 flex items-center justify-center rounded-lg text-center font-museo text-white hover:bg-[#D65A31] outline-none hover:outline-white">
                                        <h3 class="text-xl ">{{ $genre['name'] }}</h3>
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <p class="text-white">No genres available.</p>
                        @endif
                    </div>
                    {{-- Genre List --}}
                
                    <!-- Scroll Buttons -->
                    <button class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full z-10 focus:outline-none slideRightGenre">
                        <img src="{{ asset('images/right.svg') }}" alt="Arrow Right" class="w-6 h-6">
                    </button>
                    <!-- Scroll Buttons -->
                </div>
    
                <div>
                    <h2 class="text-white text-lg lg:text-2xl font-normal font-mono text-left pb-4 pt-8">This Year Box Office</h2>
                </div>

                <!-- container rekomendasi tahun ini  -->
                <div class="relative w-full">
    
                    <!-- Scroll Button -->
                    <button class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full z-10 focus:outline-none slideLeftThisYear">
                        <img src="{{ asset('images/left.svg') }}" alt="Arrow Left" class="w-6 h-6">
                    </button>
                    <!-- Scroll Button -->
    
                    {{-- recommendation-list --}}
                    <div class="py-4 px-2 flex overflow-x-auto gap-5 no-scrollbar w-full scroll-smooth" id="thisyear-list">
                        @foreach($movieThisYear as $movie)
                        <a href="{{ route('movie.detail', $movie['id']) }}">
                        <div class="flex-none w-96 h-56 bg-gray-800 rounded-xl shadow-lg relative overflow-hidden outline-none outline-4 hover:outline-[#D65A31]">
                            <img src="https://www.themoviedb.org/t/p/w500{{ $movie['backdrop_path'] }}" alt="{{ $movie['title'] }}" class="w-full h-full object-cover rounded">
                            <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/80 to-transparent p-4 text-left backdrop-blur-sm pointer-events-none">
                                <h3 class="text-lg text-white font-bold">{{ $movie['title'] }}</h3>
                                <p class="text-sm text-gray-400">({{ date('Y', strtotime($movie['release_date'])) }})</p>
                            </div>
                        </div>
                        </a>
                        @endforeach
                    </div>
                    {{-- recommendation-list --}}
    
                    <!-- Scroll Button -->
                    <button class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full z-10 focus:outline-none slideRightThisYear">
                        <img src="{{ asset('images/right.svg') }}" alt="Arrow Right" class="w-6 h-6">
                    </button>
                    <!-- Scroll Button -->
                </div>

            </div>
        </div>
    </main>
    
    @include('footer')

<!-- Button Logic Scroll -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const scrollConfigurations = [
            {
                leftButtonClass: '.slideLeft',
                rightButtonClass: '.slideRight',
                listId: 'recommendation-list',
            },
            {
                leftButtonClass: '.slideLeftThisYear',
                rightButtonClass: '.slideRightThisYear',
                listId: 'thisyear-list',
            },
            {
                leftButtonClass: '.slideLeftGenre',
                rightButtonClass: '.slideRightGenre',
                listId: 'genre-list',
            }
        ];

        scrollConfigurations.forEach(config => {
            const rightButtons = document.querySelectorAll(config.rightButtonClass);
            const leftButtons = document.querySelectorAll(config.leftButtonClass);
            const list = document.getElementById(config.listId);

            rightButtons.forEach(button => {
                button.addEventListener('click', () => {
                    list.scrollBy({
                        left: 800, // Adjust the value based on your needs
                        behavior: 'smooth'
                    });
                });
            });

            leftButtons.forEach(button => {
                button.addEventListener('click', () => {
                    list.scrollBy({
                        left: -800, // Adjust the value based on your needs
                        behavior: 'smooth'
                    });
                });
            });
        });
    });
</script>

</body>
</html>
