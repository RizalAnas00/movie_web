<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Detail</title>
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

            <!-- Additional Content -->
            <div class="relative w-full">

                <!-- Scroll Buttons -->
                <button class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full z-10 focus:outline-none slideLeft">
                    <img src="{{ asset('images/left.svg') }}" alt="Arrow Left" class="w-6 h-6">
                </button>

                <div class="pt-4 flex overflow-x-auto gap-5 no-scrollbar w-full scroll-smooth" id="recommendation-list">
                    @foreach($recommendations as $movie)
                    <div class="flex-none w-96 h-56 bg-gray-800 rounded-xl shadow-lg relative overflow-hidden">
                        <img src="https://www.themoviedb.org/t/p/w500{{ $movie['backdrop_path'] }}" alt="{{ $movie['title'] }}" class="w-full h-full object-cover rounded">
                        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/80 to-transparent p-4 text-center backdrop-blur-sm pointer-events-none">
                            <h3 class="text-lg text-white font-bold">{{ $movie['title'] }}</h3>
                            <p class="text-sm text-gray-400">({{ date('Y', strtotime($movie['release_date'])) }})</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <button class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full z-10 focus:outline-none slideRight">
                    <img src="{{ asset('images/right.svg') }}" alt="Arrow Right" class="w-6 h-6">
                </button>
            </div>
            @else
                <p class="text-center text-gray-500 dark:text-gray-400">No movie data available.</p>
            @endif
        </div>
    </div>
</main>

@include('footer')

<!-- Button Logic Scroll -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const rightButtons = document.querySelectorAll('.slideRight');
        const leftButtons = document.querySelectorAll('.slideLeft');
        const recommendationList = document.getElementById('recommendation-list');

        rightButtons.forEach(button => {
            button.addEventListener('click', () => {
                recommendationList.scrollBy({
                    left: 800, // Adjust the value based on your needs
                    behavior: 'smooth'
                });
            });
        });

        leftButtons.forEach(button => {
            button.addEventListener('click', () => {
                recommendationList.scrollBy({
                    left: -800, // Adjust the value based on your needs
                    behavior: 'smooth'
                });
            });
        });
    });
</script>
</body>
</html>
