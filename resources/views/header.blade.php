<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MovieList')</title>
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno:wght@500&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-[#222831] text-white">
    <header class="bg-[#464A52] p-2 top-0 w-full shadow-[black] shadow-sm sticky z-50">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div class="flex items-center">
                <h1 class="text-2xl lg:text-4xl font-semibold font-museo">MovieList</h1>
                <img src="{{ asset('images/logo1.svg') }}" alt="Logo" class="ml-2 w-6 lg:w-8">
            </div>
            <div class="flex md:order-2">
                <div class="relative hidden md:block">
                    <form action="{{ route('movie.search') }}" method="GET" class="flex items-center w-full relative">
                        <input type="text" name="title" class="block max-w-full p-2 pr-16 md:pr-72 lg:pr-96 text-sm font-bold text-black border border-gray-900 shadow-[#222831] shadow-inner rounded-lg bg-[#D65A31] focus:ring-blue-500 focus:border-blue-500 placeholder-black placeholder:opacity-35" placeholder="Find Movies By Title...">
                        <div class="absolute inset-y-0 right-3 flex items-center pl-3 pointer-events-none">
                            <img src="{{ asset('images/searchlogo.svg') }}" class="size-7 text-gray-500 dark:text-gray-400">
                        </div>
                    </form>
                </div>

                <!--IF THE SCREEN IS TIGHT / getting smaller-->
                <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false" onclick="toggleNavbarSearch()">
                    <span class="sr-only">Main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>

                <script>
                    function toggleNavbarSearch() {
                        const navbarSearch = document.getElementById('navbar-search');
                        navbarSearch.classList.toggle('hidden');
                        navbarSearch.classList.toggle('block');
                    }
                </script>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
                <div class="relative mt-3 md:hidden">
                    <!--search-bar-->
                    <form action="{{ route('movie.search') }}" method="GET" class="flex items-center w-full">
                        <input type="text" name="title" class="block w-full p-2 pl-4 text-sm text-gray-900 border border-gray-300 rounded-l-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
                        <button type="submit" class="p-2 bg-gray-300 rounded-r-lg border border-gray-300 dark:bg-gray-600 dark:border-gray-600">
                            <img src="{{ asset('images/searchlogo.svg') }}">
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    