@extends('components.layouts.master')

@section('title')
    {{ $data->title }}
@endsection


@section('content')



<!-- Movie Info Section -->
<div class="lg:flex lg:items-center lg:space-x-12">
    <!-- 🎥 Poster -->
    <div class="flex-shrink-0 mb-8 lg:mb-0 flex justify-center">
        <img class="w-64 h-96 object-cover rounded-lg shadow-lg border border-gray-700" src="{{ $data->image }}" alt="Movie Poster">
    </div>

    <!-- 📝 Movie Details -->
    <div class="lg:flex-1">
        <h2 class="text-3xl font-bold text-white mb-4">{{ $data->title }}</h2>

       <!-- 🎬 Meta Info: Release Year + Runtime -->
<div class="flex flex-wrap gap-2 mb-2">
    <span class="inline-flex items-center px-3 py-1 rounded text-xs font-medium bg-yellow-300 text-gray-800">
        <span class="h-2 w-2 rounded-full bg-blue-500 mr-1.5"></span> {{ $data->release_year }}
    </span>
    <span class="inline-flex items-center px-3 py-1 rounded text-xs font-medium bg-yellow-300 text-gray-800">
        <span class="h-2 w-2 rounded-full bg-blue-500 mr-1.5"></span> {{ $data->runtime }}
    </span>
</div>

<!-- 📂 Categories -->
<div class="flex flex-wrap gap-2 mb-4">
    @foreach ($data->categories as $category)
        <span class="inline-flex items-center px-3 py-1 rounded text-xs font-medium bg-red-400 text-zinc-900">
            {{ $category->name }}
        </span>
    @endforeach
</div>


        <p class="text-gray-300 mb-6 leading-relaxed">
            <span class="font-semibold text-white">Synopsis:</span> {{ $data->description }}
        </p>

        <!-- 🎬 Action Buttons -->
        <div class="space-x-4">
            <a href="{{ route('movies.play', $data->id) }}" target="_blank"
               class="inline-block bg-amber-600 hover:bg-amber-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-200 ease-in-out">
               Watch Now
            </a>
            <a href="#"
               class="inline-block bg-sky-600 hover:bg-sky-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-200 ease-in-out">
               Download
            </a>
        </div>
    </div>
</div>

<!-- 👥 Cast Section -->
<div class="mt-10">
    <h2 class="text-2xl font-semibold text-white m-4">Cast Members</h2>
    <div class=" m-8 overflow-x-auto">
        <div class="flex space-x-4 pb-2">
            @foreach ($data->actors as $cast)
                <div class="relative group min-w-[140px] bg-gray-800 rounded-xl overflow-hidden shadow-md flex-shrink-0 border border-gray-700 transition-all duration-300 hover:shadow-[0_0_20px_rgba(99,102,241,0.5)]">
                    <!-- Image -->
                    <img src="{{ $cast->image }}"
                         alt="{{ $cast->name }}"
                         class="w-full h-40 object-cover group-hover:scale-105 group-hover:brightness-75 transition-transform duration-300 ease-in-out">

                    <!-- Overlay -->
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black via-transparent to-transparent px-2 py-2 opacity-0 group-hover:opacity-100 transition duration-300">
                        <h3 class="text-sm m-2 mb-3 text-white font-semibold truncate">{{ $cast->name }}</h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</div>

</div>



@endsection
