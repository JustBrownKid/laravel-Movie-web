<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$data->title}}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
<x-layouts.app :title="__()">

  <!-- Movie Detail Container -->
  <div class="max-w-7xl mx-auto px-6 py-12">
    <div class="lg:flex lg:items-center lg:space-x-12">
      <!-- Movie Poster -->
      <div class="flex-shrink-0 mb-8 lg:mb-0 flex justify-center">
        <img class="w-64 h-96 object-cover rounded-lg shadow-lg" src="{{$data->image}}" alt="Movie Poster">
      </div>
      
      <!-- Movie Details -->
      <div class="lg:flex-1">
        <h1 class="text-4xl font-extrabold text-gray-500 mb-4">{{$data->title}}</h1>
        <p class="text-lg text-gray-400">Release Year: {{$data->release_year}} |  Runtime: {{$data->runtime}}</p>
        <p class="text-sm mb-1 text-gray-400">Type:action</p>
        <div class="space-y-4">
          <p class="text-gray-400">
            <span class="font-semibold text-gray-500">Synopsis:</span>
                {{$data->description}}
          </p>
          
          <!-- Rating and Reviews
          <div class="flex items-center space-x-2">
            <span class="text-yellow-400 text-xl">★★★★☆</span>
            <span class="text-gray-300">(120 reviews)</span>
          </div> -->
          
          <!-- Cast -->
          <!-- <div>
            <span class="font-semibold text-white">Cast:</span>
            <ul class="list-disc pl-5 text-gray-300 space-y-2">
              <li>Actor 1</li>
              <li>Actor 2</li>
              <li>Actor 3</li>
            </ul>
          </div> -->
          
          <!-- Call to Action Buttons -->
        </div>
      </div>
    </div>
  </div>

  </x-layouts.app>
</body>
</html>
