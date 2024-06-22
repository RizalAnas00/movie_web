@extends('layout')

@section('title', 'Home')

@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-transparent sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

         <!-- Main Movie Card -->
         @if(isset($data))
         <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg p-7">
             <div class="flex items-center">
                 <div class="w-3/12">
                     <img src="https://www.themoviedb.org/t/p/w220_and_h330_face{{ $data['poster_path'] ?? '' }}" alt="Poster" class="rounded">
                 </div>
                 <div class="w-9/12 ml-5">
                     <h2 class="text-2xl text-gray-900 dark:text-gray-100 font-semibold mb-2">{{ $data['title'] ?? 'Title not available' }} </h2>
                     <h1 class="text-2xl text-gray-900 dark:text-gray-100 font-semibold ">({{ isset($data['release_date']) ? date('Y', strtotime($data['release_date'])) : 'N/A' }})</h1>
                     <p class="leading-6 mt-4 text-gray-500 dark:text-gray-300">{{ $data['overview'] ?? 'Overview not available' }}</p>
                 </div>
             </div>
         </div>
         @else
         <p class="text-center text-gray-500 dark:text-gray-400">No movie data available.</p>
         @endif
         <!-- Main Movie Card -->

         <!-- Main Movie List Recommendation -->
         
         <!-- Main Movie List Recommendation -->

    </div>
</div>
@endsection
