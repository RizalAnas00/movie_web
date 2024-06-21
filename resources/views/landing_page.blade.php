@extends('layout')

@section('title', 'Home')

@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="flex items-center p-4 w-[920px]">
                <div class="w-3/12">
                    <img src="https://www.themoviedb.org/t/p/w220_and_h330_face{{ $data['poster_path'] }}" alt="Poster" class="rounded ">
                </div>
                <div class="w-9/12">
                    <div class="ml-5">
                        <h2 class="text-2xl text-gray-900 font-semibold mb-2">{{ $data['title'] }} ({{ date('Y',strtotime($data['release_date'])) }})</h2>
                        <div class="mb-1 flex mb-4 sm:flex-nowrap flex-wrap">
                            @if(count($data['genres']) > 0)
                                @php
                                    $num_of_items = count($data['genres']);
                                    $num_count = 0;
                                @endphp
                                @foreach ($data['genres'] as $singleGenre)
                                    <span class="text-sm">
                                        {{ $singleGenre['name'] }}
                                    </span>
                                    @php
                                        $num_count = $num_count + 1;
                                        if ($num_count < $num_of_items) {
                                            echo '<span class="mx-2 flex items-center">•</span>';
                                        }
                                    @endphp
                                @endforeach
                            @endif
                        </div>
                        <div class="flex items-center space-x-2 tracking-wide pb-1">
                            <h1 class="text-gray-500">Release Date</h1>
                            <p class="leading-6 text-sm">{{ $data['release_date'] }}</p>
                        </div>
                        <div class="flex items-center space-x-2 tracking-wide pb-1">
                            <h1 class="text-gray-500">Rating</h1>
                            <p class="leading-6 text-sm">{{ $data['vote_average'] }}</p>
                        </div>
                        <div class="flex items-center space-x-2 tracking-wide pb-1">
                            <h1 class="text-gray-500">Duration</h1>
                            <p class="leading-6 text-sm">{{ $data['runtime'] }} min</p>
                        </div>
                        <p class="leading-6 mt-5 text-gray-500">{{ $data['overview'] }}</p>
                    </div>
                </div>


            </div>
        </div>

        <div class="text-center text-sm text-gray-500 sm:text-center my-5">
            Tutorial By 
            <a href="https://laraveltuts.com" class="ml-1 underline">
                LaravelTuts.com
            </a>
        </div>
    </div>
</div>
@endsection
           
