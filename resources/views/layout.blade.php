<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MovieList')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-900 text-white">
    <header class="bg-gray-800 p-4 flex justify-between items-center">
        <nav>
            <ul class="flex space-x-4">
                <li>
                    <form action="{{ route('movie.search') }}" method="GET">
                        <input type="text" name="title" placeholder="Find Movies By Title" class="border border-gray-600 rounded px-2 py-1">
                    </form>                    
                </li>
            </ul>
        </nav>
        <h1 class="text-xl font-bold text-left">MovieList</h1>
    </header>
    
    <main class="container mx-auto p-4">
        @yield('content')
    </main>
    
    <footer class="bg-gray-800 p-4 mt-8">
        <div class="text-center">
            <p>Get In Touch</p>
            <div class="flex justify-center space-x-4 my-2">
                <a href="#" class="hover:text-gray-400">FB</a>
                <a href="#" class="hover:text-gray-400">IG</a>
                <a href="#" class="hover:text-gray-400">TW</a>
                <a href="#" class="hover:text-gray-400">IN</a>
            </div>
            <p>&copy; 2024 MovieList</p>
        </div>
    </footer>
</body>
</html>
