@extends('components.layouts.master')

@section('title', 'Home')

@section('content')
    <h1 class="text-2xl mb-2 text-sky-100 font-bold">Home </h1>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
        @foreach ($data as $movie)
            <a href="{{ route('movies.show', $movie->id) }}" class="link">
                <div class="max-w-sm">
                    <div class="relative group overflow-hidden rounded-lg shadow-lg">
                    <img
                        class="w-full h-full object-cover transform group-hover:scale-110 transition-all duration-300"
                        src="{{ $movie['image'] }}"
                        alt="Movie Image"
                    / >
                           <div
                            class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-80 text-white opacity-0 group-hover:opacity-100 transition-all duration-300"
                        >
                            <h3 class="text-lg font-semibold m-8">{{ $movie['title'] }}</h3>
                            <button class="text-2xl"></button>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
