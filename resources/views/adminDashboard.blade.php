@extends('components.layouts.master')

@section('title', 'Home')

@section('content')
 

  @if (session('success'))
  <div id="success-alert" class="fixed top-5 right-5 z-50 bg-green-100 text-green-800 px-5 py-4 rounded shadow-md flex items-center justify-between w-80">
    <span>{{ session('success') }}</span>
    <button onclick="document.getElementById('success-alert').remove()" class="text-green-700 hover:text-green-900 font-bold ml-4">&times;</button>
  </div>

  <script>
    setTimeout(() => {
      const alert = document.getElementById('success-alert');
      if (alert) alert.remove();
    }, 5000);
  </script>
@endif

@if ($errors->any())
  @foreach ($errors->all() as $error)
    <div id="error-alert-{{ $loop->index }}" class="fixed top-[{{ 5 + ($loop->index * 60) }}px] right-5 z-50 bg-red-100 text-red-800 px-4 py-2 rounded shadow-md flex items-center justify-between w-80 mb-2">
      <span>{{ $error }}</span>
      <button onclick="document.getElementById('error-alert-{{ $loop->index }}').remove()" class="text-red-700 hover:text-red-900 font-bold ml-4">&times;</button>
    </div>

    <script>
      setTimeout(() => {
        const alert = document.getElementById('error-alert-{{ $loop->index }}');
        if (alert) alert.remove();
      }, 5000);
    </script>
  @endforeach
@endif


<h4 class="text-2xl font-bold text-gray-200 dark:text-white mb-4">Admin Dashboard</h4> 
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
    <!-- Stats Section -->
    <div class=" rounded-xl  bg-gray-800 p-4 dark:border-neutral-700">
      <div class="w-full bg-gray-800">
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-4">
          <!-- Total Users -->
          <div class="bg-gray-900 hover:bg-gray-500 dark:bg-neutral-800 p-6 rounded-xl shadow-md flex flex-col items-center text-center">
            <div class="flex items-center space-x-2">
              <i class="fas fa-users text-blue-500 text-2xl"></i>
              <div class="text-m font-bold text-gray-200 dark:text-white">{{ $user }}</div>
            </div>
            <div class="text-sm text-gray-200 dark:text-gray-300 mt-2">Total User</div>
          </div>

          <!-- Total Movies -->
          <div class="bg-gray-900 hover:bg-gray-500 dark:bg-neutral-800 p-4 rounded-xl shadow-md flex flex-col items-center text-center">
            <div class="flex items-center space-x-2">
              <i class="fas fa-video text-red-500 text-2xl"></i>
              <div class="text-m font-bold text-gray-200 dark:text-white">{{ $data }}</div>
            </div>
            <div class="text-sm text-gray-200 dark:text-gray-300 mt-2">Total Movie Count</div>
          </div>

          <!-- Total Cast -->
          <div class="bg-gray-900 hover:bg-gray-500 dark:bg-neutral-800 p-4 rounded-xl shadow-md flex flex-col items-center text-center">
            <div class="flex items-center space-x-2">
              <i class="fas fa-theater-masks text-green-500 text-2xl"></i>
              <div class="text-m font-bold text-gray-200 dark:text-white">{{ $actor }}</div>
            </div>
            <div class="text-sm text-gray-200 dark:text-gray-300 mt-2">Total Cast Count</div>
          </div>

          <!-- Total Categories -->
          <div class="bg-gray-900 hover:bg-gray-500 dark:bg-neutral-800 p-4 rounded-xl shadow-md flex flex-col items-center text-center">
            <div class="flex items-center space-x-2">
              <i class="fas fa-tags text-purple-500 text-2xl"></i>
              <div class="text-m font-bold text-gray-200 dark:text-white">{{ $category }}</div>
            </div>
            <div class="text-sm text-gray-200 dark:text-gray-300 mt-2">Total Category</div>
          </div>

          <div class="bg-gray-900 hover:bg-gray-500 dark:bg-neutral-800 p-4  rounded-xl shadow-md flex flex-col items-center text-center">
            <div class="flex items-center space-x-2">
              <i class="	fas fa-edit text-blue-500 text-2xl"></i>
              <div class="text-m font-bold text-gray-200 dark:text-white">{{ $admin }}</div>
            </div>
            <div class="text-sm text-gray-200 dark:text-gray-300 mt-2">Total Dataentry </div>
          </div>

          <!-- Total Revenue -->
          <div class="bg-gray-900   hover:bg-gray-500 dark:bg-neutral-800 p-4 rounded-xl shadow-md  flex flex-col items-center text-center">
            <div class="flex items-center space-x-2">
              <i class="	fas fa-user-shield text-yellow-500 text-2xl"></i>
              <div class="text-m font-bold text-gray-200 dark:text-white">{{$superAdmin}}</div>
            </div>
            <div class="text-sm text-gray-200 dark:text-gray-300 mt-2">Super Adminlist</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Cast Form -->
    <div class=" rounded-xl  p-4 bg-gray-800 dark:border-neutral-700">
      <h2 class="text-center font-bold mb-4 text-gray-200">Cast Data Creation</h2>
      <form action="{{ route('cast.store') }}" method="POST" class="space-y-4">
        @csrf
        <input name="name" type="text" required placeholder="Cast Name"
            class="w-full border border-gray-600 bg-gray-900 text-white p-3 my-5 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        <input name="image" type="text" required placeholder="Cast Image"
            class="w-full border border-gray-600 bg-gray-900 text-white p-3 my-5 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        <button type="submit"
            class="w-full bg-blue-600   :bg-blue-700 text-white font-semibold py-3 rounded-lg transition duration-200">
            Create Cast
        </button>
      </form>
    </div>

    <!-- Type Form -->
    <div class=" rounded-xl bg-gray-800 border-neutral-200 p-4 dark:border-neutral-700">
      <h2 class="text-center font-bold mb-4 m-5 text-gray-200">Movie Type Creation</h2>
      <form action="{{ route('type.store') }}" method="POST" class="space-y-4">
        @csrf
        <input name="name" type="text" required placeholder="Categories Name"
            class="w-full border border-gray-600 bg-gray-900 text-white p-3 my-5 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" />

        
        <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition duration-200">
            Create Type
        </button>
      </form>
    </div>
  </div>

  <br />

  <!-- Movie Form -->
  <div class=" rounded-xl bg-gray-900 border-neutral-700 p-0 dark:border-neutral-700">
  
    <div class="border rounded-xl bg-gray-800 border-neutral-700 p-10 dark:border-neutral-700 max-w-2xl mx-auto">
    <h2 class="text-center text-2xl font-bold text-white mb-6"> Movie Data Creation</h2>

    <form action="{{ route('movies.store') }}" method="POST" class="space-y-5">
        @csrf

        <input name="title" type="text" required placeholder="Title"
            class="w-full border border-gray-600 bg-gray-900 text-white p-3 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" />

        <input name="image" type="text" required placeholder="Image URL"
            class="w-full border border-gray-600 bg-gray-900 text-white p-3 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" />

        <input name="description" type="text" required placeholder="Description"
            class="w-full border border-gray-600 bg-gray-900 text-white p-3 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" />

        <input name="watch" type="text" required placeholder="Watch Link"
            class="w-full border border-gray-600 bg-gray-900 text-white p-3 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" />

        <div class="grid grid-cols-2 gap-4">
            <input name="runtime" type="text" required placeholder="Runtime"
                class="w-full border border-gray-600 bg-gray-900 text-white p-3 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" />

            <input name="release_year" type="text" required placeholder="Release Year"
                class="w-full border border-gray-600 bg-gray-900 text-white p-3 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
@php
  $selectedActors = old('actors', []);
@endphp

<div x-data="actorSelect()" class="relative">
  <label class="block mb-2 text-sm font-medium text-white">Select Casts</label>

  <!-- Selected tags -->
  <div @click="toggle" class="flex flex-wrap gap-2 items-center bg-gray-900 p-3 rounded-lg border border-gray-600 cursor-pointer min-h-[56px]">
    <template x-for="(actor, index) in selected" :key="actor.id">
      <div class="flex items-center bg-gray-600 px-1 py-1 rounded-full text-sm text-white space-x-2">
        <img :src="actor.image" class="w-7 h-7 rounded-full">
        <span x-text="actor.name"></span>
        <button type="button" @click.stop="remove(index)" class="ml-5 text-lg text-gray-300 hover:text-red-400">&times;</button>
        <input type="hidden" name="actors[]" :value="actor.id">
      </div>
    </template>
    <span class="text-gray-400 text-sm" x-show="selected.length === 0">Click to select actors</span>
  </div>

  <!-- Dropdown -->
  <div x-show="open" @click.away="open = false" class="absolute z-10 mt-2 w-full bg-gray-800 border border-gray-600 rounded-lg shadow-lg max-h-60 overflow-y-auto">
    <!-- Search -->
    <div class="p-2 border-b border-gray-600">
      <input
        type="text"
        x-model="search"
        placeholder="Search actors..."
        class="w-full p-2 bg-gray-700 text-white rounded-md placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
      />
    </div>

    <!-- Filtered Results -->
    <template x-for="actor in filteredActors" :key="actor.id">
      <div @click="select(actor)"
        class="flex items-center gap-3 px-4 py-2 hover:bg-gray-700 cursor-pointer text-white text-sm">
        <img :src="actor.image" alt="" class="w-8 h-8 rounded-full object-cover">
        <span x-text="actor.name"></span>
      </div>
    </template>

    <!-- Empty State -->
    <div x-show="filteredActors.length === 0" class="text-center py-4 text-gray-400 text-sm">
      No matching actors found.
    </div>
  </div>
</div>

<script>
  function actorSelect() {
    return {
      open: false,
      search: '',
      selected: [],
      allActors: @json($castData->map(fn($a) => [
        'id' => $a->id,
        'name' => $a->name,
        'image' => $a->image
      ])),
      toggle() {
        this.open = !this.open;
      },
      select(actor) {
        if (!this.selected.find(a => a.id === actor.id)) {
          this.selected.push(actor);
        }
      },
      remove(index) {
        this.selected.splice(index, 1);
      },
      get filteredActors() {
        if (!this.search) return this.allActors;
        return this.allActors.filter(actor =>
          actor.name.toLowerCase().includes(this.search.toLowerCase())
        );
      }
    }
  }
</script>


@php
  $selectedCategories = old('categories', []);
@endphp

<div x-data="categorySelect()" class="relative mt-6">
  <label class="block mb-2 text-sm font-medium text-white">Select Categories</label>

  <!-- Selected tags -->
  <div @click="toggle" class="flex flex-wrap gap-2 items-center bg-gray-900 p-3 rounded-lg border border-gray-600 cursor-pointer min-h-[56px]">
    <template x-for="(category, index) in selected" :key="category.id">
      <div class="flex items-center bg-gray-600 px-3 py-1 rounded-full text-sm text-white space-x-2">
        <span x-text="category.name"></span>
        <button type="button" @click.stop="remove(index)" class="ml-1 text-lg text-gray-300 hover:text-red-400">&times;</button>
        <input type="hidden" name="categories[]" :value="category.id">
      </div>
    </template>
    <span class="text-gray-400 text-sm" x-show="selected.length === 0">Click to select categories</span>
  </div>

  <!-- Dropdown -->
  <div x-show="open" @click.away="open = false"
       class="absolute z-10 mt-2 w-full bg-gray-800 border border-gray-600 rounded-lg shadow-lg max-h-60 overflow-y-auto">

    <!-- Search Input -->
    <div class="p-2 border-b border-gray-600">
      <input
        type="text"
        x-model="search"
        placeholder="Search categories..."
        class="w-full p-2 bg-gray-700 text-white rounded-md placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
      />
    </div>

    <!-- Filtered Results -->
    <template x-for="category in filteredCategories" :key="category.id">
      <div @click="select(category)"
           class="px-4 py-2 hover:bg-gray-700 cursor-pointer text-white text-sm">
        <span x-text="category.name"></span>
      </div>
    </template>

    <!-- Empty State -->
    <div x-show="filteredCategories.length === 0"
         class="text-center py-4 text-gray-400 text-sm">
      No matching categories found.
    </div>
  </div>
</div>

<script>
  function categorySelect() {
    return {
      open: false,
      search: '',
      selected: [],
      allCategories: @json($categoryData->map(fn($c) => [
        'id' => $c->id,
        'name' => $c->name
      ])),
      toggle() {
        this.open = !this.open;
      },
      select(category) {
        if (!this.selected.find(c => c.id === category.id)) {
          this.selected.push(category);
        }
      },
      remove(index) {
        this.selected.splice(index, 1);
      },
      get filteredCategories() {
        if (!this.search) return this.allCategories;
        return this.allCategories.filter(category =>
          category.name.toLowerCase().includes(this.search.toLowerCase())
        );
      }
    }
  }
</script>

        <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition duration-200">
            Create Movie
        </button>
    </form>
</div>

  </div>

     <div class="border rounded-xl bg-gray-800 border-neutral-700 p-6 mt-6">
    <h2 class="text-center text-white text-lg font-semibold mb-4">Category List</h2>
    <div class="w-full overflow-x-auto">
        <table class="min-w-full bg-gray-800 border border-gray-300 dark:border-neutral-700 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-900 dark:bg-neutral-800 text-gray-200 dark:text-gray-300">
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Role</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Created actorSelect</th>
                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
        </table>
        <div class="max-h-96 overflow-y-auto">
            <table class="min-w-full">
                <tbody>
                    @foreach ($userList as $item)
                        <tr class="bg-gray-900 border-b border-gray-200 dark:border-neutral-700">
                            <td class="px-4 py-3 text-gray-200 dark:text-gray-100">{{ $item->name }}</td>
                            <td class="px-4 py-3 text-gray-200 dark:text-gray-100">{{ $item->role }}</td>
                            <td class="px-4 py-3 text-gray-200 dark:text-gray-100">{{ $item->email }}</td>
                            <td class="px-4 py-3 text-gray-200 dark:text-gray-100">{{ $item->created_at }}</td>
                            <td class="px-4 py-3 text-right">
                                    <!-- Just UI buttons, no functionality -->
                                    <button class="flex items-center text-yellow-500 hover:text-yellow-400 space-x-1">
                                        <i class="fas fa-edit"></i>
                                        <span>Edit</span>
                                    </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

  <!-- Movies Table -->
  <div class="grid grid-cols-1 mb-4 lg:grid-cols-3 gap-4">
    <!-- Movie List -->
    <div class="border rounded-xl bg-gray-800 border-neutral-700 p-6 mt-6">
      <h2 class="text-center text-white text-lg font-semibold mb-4">Movies List</h2>
      <div class="w-full overflow-x-auto">
        <table class="min-w-full bg-gray-8 dark:bg-neutral-900 border border-gray-300 dark:border-neutral-700 rounded-lg shadow-md">
          <thead>
            <tr class="bg-gray-900 dark:bg-neutral-800 text-gray-200 dark:text-gray-300">
              <th class="px-4 py-3 text-left">Title</th>
              <th class="px-4 py-3 text-left">Actions</th>
            </tr>
          </thead>
        </table>
        <div class="max-h-96 overflow-y-auto">
          <table class="min-w-full">
            <tbody>
              @foreach ($movie as $item)
                <tr class="border-b border-gray-200 dark:border-neutral-700">
                  <td class="px-4 py-3 text-gray-200 bg-gray-900 dark:text-gray-100">{{ $item->title }}</td>
                  <td class=" bg-gray-900 px-4 py-3 text-right">
                    <div class="flex justify-end space-x-4 items-center">
                    <div x-data="{ editOpen: false, deleteOpen: false }">
    <!-- Trigger Buttons -->
    <div class="flex items-center space-x-4">
        <!-- ✏️ Edit Button -->
        <button @click="editOpen = true"
            class="flex items-center space-x-1 text-yellow-500 hover:text-yellow-400">
            <i class="fas fa-edit"></i>
            <span>Edit</span>
        </button>

        <!-- 🗑️ Delete Button -->
        <button @click="deleteOpen = true"
            class="flex items-center space-x-1 text-red-500 hover:text-red-400">
            <i class="fas fa-trash-alt"></i>
            <span>Delete</span>
        </button>
    </div>

    <!-- ✏️ Edit Movie Modal -->
    <div x-show="editOpen" x-transition class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50" style="display: none;">
        <div @click.away="editOpen = false"
            class="bg-gray-900 text-gray-200 rounded-lg p-6 w-full max-w-xl shadow-lg border border-gray-700">

            <h2 class="text-2xl font-bold mb-4 text-center">Update Movie</h2>

            <form method="POST" action="{{ route('movies.update', $item->id) }}">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="mb-4">
                    <label class="block text-sm text-left text-gray-400 mb-1" for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{ $item->title }}" required
                        class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded text-white">
                </div>

                <!-- Image -->
                <div class="mb-4">
                    <label class="block text-sm text-left text-gray-400 mb-1" for="image">Image URL</label>
                    <input type="url" name="image" id="image" value="{{ $item->image }}"
                        class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded text-white">
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label class="block text-sm text-left text-gray-400 mb-1" for="description">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded text-white">{{ $item->description }}</textarea>
                </div>

                <!-- Watch Link -->
                <div class="mb-4">
                    <label class="block text-sm text-left text-gray-400 mb-1" for="watch">Watch Link</label>
                    <input type="text" name="watch" id="watch" value="{{ $item->watch }}"
                        class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded text-white">
                </div>

                <!-- Runtime -->
                <div class="mb-4">
                    <label class="block text-sm text-left text-gray-400 mb-1" for="runtime">Runtime (minutes)</label>
                    <input type="text" name="runtime" id="runtime" value="{{ $item->runtime }}"
                        class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded text-white">
                </div>

                <!-- Release Year -->
                <div class="mb-4">
                    <label class="block text-sm text-left text-gray-400 mb-1" for="release_year">Release Year</label>
                    <input type="text" name="release_year" id="release_year" value="{{ $item->release_year }}"
                        class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded text-white">
                </div>

                <!-- Actions -->
                <div class="flex justify-end gap-2 mt-6">
                    <button type="button" @click="editOpen = false"
                        class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded">
                        Cancel
                    </button>
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- 🗑️ Delete Movie Modal -->
    <div x-show="deleteOpen" x-transition class="fixed inset-0 bg-gray-900 bg-opacity-60 flex items-center justify-center z-50" style="display: none;">
        <div @click.away="deleteOpen = false"
            class="bg-gray-800 text-white p-6 rounded-lg shadow-lg border border-gray-700 w-full max-w-sm">

            <h2 class="text-xl font-bold mb-4">Delete Movie</h2>
            <p class="text-gray-300 mb-6">Are you sure you want to delete <span class="font-semibold text-white">{{ $item->title }}</span>?</p>

            <form method="POST" action="{{ route('movies.destroy', $item->id) }}">
                @csrf
                @method('DELETE')

                <div class="flex justify-end gap-2">
                    <button type="button" @click="deleteOpen = false"
                        class="bg-gray-600 hover:bg-gray-500 text-white px-4 py-2 rounded">
                        Cancel
                    </button>
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                        Delete
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

                      
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Cast List -->
    <div class="border rounded-xl bg-gray-800 border-neutral-700 p-6 mt-6">
      <h2 class="text-center text-white text-lg font-semibold mb-4">Cast List</h2>
      <div class="w-full overflow-x-auto">
        <table class="min-w-full bg-gray-8 dark:bg-neutral-900 border border-gray-300 dark:border-neutral-700 rounded-lg shadow-md">
          <thead>
            <tr class="bg-gray-900 dark:bg-neutral-800 text-gray-200 dark:text-gray-300">
              <th class="px-4 py-3 text-left">Name</th>
              <th class="px-4 py-3 text-left">Actions</th>
            </tr>
          </thead>
        </table>
        <div class="max-h-96 overflow-y-auto">
          <table class="min-w-full">
            <tbody>
            @foreach ($castData as $item)
  <tr class="bg-gray-900 border-b border-gray-200 dark:border-neutral-700">
    <td class="px-4 py-3 text-gray-200 dark:text-gray-100 flex items-center space-x-3">
      @if ($item->image)
        <img src="{{ $item->image }}" alt="{{ $item->name }}" class="w-10 h-10 rounded-full object-cover">
      @else
        <div class="w-10 h-10 rounded-full bg-gray-500 flex items-center justify-center text-white text-sm">N/A</div>
      @endif
      <span>{{ $item->name }}</span>
    </td>
    <td class="bg-gray-900 px-4 py-3 text-right">
      <div class="flex justify-end space-x-4 items-center">

      <div x-data="{ editOpen: false, deleteOpen: false }">
    <!-- Trigger Buttons -->
    <div class="flex items-center space-x-4">
        <!-- ✏️ Edit Button -->
        <button @click="editOpen = true"
            class="flex items-center space-x-1 text-yellow-500 hover:text-yellow-400">
            <i class="fas fa-edit"></i>
            <span>Edit</span>
        </button>

        <!-- 🗑️ Delete Button -->
        <button @click="deleteOpen = true"
            class="flex items-center space-x-1 text-red-500 hover:text-red-400">
            <i class="fas fa-trash-alt"></i>
            <span>Delete</span>
        </button>
    </div>

    <!-- ✏️ Edit Modal -->
    <div x-show="editOpen" x-transition class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50" style="display: none;">
        <div @click.away="editOpen = false"
            class="bg-gray-900 text-gray-200 rounded-lg p-6 w-full max-w-md shadow-lg border border-gray-700">

            <h2 class="text-2xl text-left  font-bold mb-4">Update Cast Data</h2>

            <form method="POST" action="{{ route('casts.update', $item->id) }}">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mb-4">
                    <label class="block text-sm text-left text-gray-400 mb-1" for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $item->name }}" required
                        class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500 text-white">
                </div>

                <!-- Image URL -->
                <div class="mb-4">
                    <label class="block text-sm text-left text-gray-400 mb-1" for="image_url">Image URL</label>
                    <input type="url" name="image_url" id="image_url" value="{{ $item->image }}"
                        class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500 text-white">
                </div>

                <!-- Actions -->
                <div class="flex justify-end gap-2 mt-6">
                    <button type="button" @click="editOpen = false"
                        class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded transition">
                        Cancel
                    </button>
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded transition">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- 🗑️ Delete Confirmation Modal -->
    <div x-show="deleteOpen" x-transition class="fixed inset-0 bg-gray-900 bg-opacity-60 flex items-center justify-center z-50" style="display: none;">
        <div @click.away="deleteOpen = false"
            class="bg-gray-800 text-white p-6 rounded-lg shadow-lg border border-gray-700 w-full max-w-sm">

            <h2 class="text-xl text-left font-bold mb-4">Delete Cast</h2>
            <p class="text-gray-300 text-left  mb-6">Are you sure you want to delete <span class="font-semibold text-white">{{ $item->name }}</span>?</p>

            <form method="POST" action="{{ route('casts.destroy', $item->id) }}">
                @csrf
                @method('DELETE')

                <div class="flex justify-end gap-2">
                    <button type="button" @click="deleteOpen = false"
                        class="bg-gray-600 hover:bg-gray-500 text-white px-4 py-2 rounded transition">
                        Cancel
                    </button>
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded transition">
                        Delete
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

        
      </div>
    </td>
  </tr>
@endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Category List -->
    <div class="border rounded-xl bg-gray-800 border-neutral-700 p-6 mt-6">
      <h2 class="text-center text-white text-lg font-semibold mb-4">Category List</h2>
      <div class="w-full overflow-x-auto">
        <table class="min-w-full bg-gray-8 dark:bg-neutral-900 border border-gray-300 dark:border-neutral-700 rounded-lg shadow-md">
          <thead>
            <tr class="bg-gray-900 dark:bg-neutral-800 text-gray-200 dark:text-gray-300">
              <th class="px-4 py-3 text-left">Name</th>
              <th class="px-4 py-3 text-left">Actions</th>
            </tr>
          </thead>
        </table>
        <div class="max-h-96 overflow-y-auto">
          <table class="min-w-full">
            <tbody>
              @foreach ($categoryData as $item)
                <tr class="bg-gray-900 border-b border-gray-200 dark:border-neutral-700">
                  <td class="px-4 py-3 text-gray-200 dark:text-gray-100">{{ $item->name }}</td>
                  <td class="px-4 py-3 text-right">
                    <div class="flex justify-end space-x-4 items-center">


        

                    <div x-data="{ editOpen: false, deleteOpen: false }">

<!-- Trigger Buttons -->
<div class="flex items-center space-x-4">
    <!-- Edit Button -->
    <button @click="editOpen = true" class="flex items-center text-yellow-500 hover:text-yellow-400 space-x-1">
        <i class="fas fa-edit"></i>
        <span>Edit</span>
    </button>

    <!-- Delete Button -->
    <button @click="deleteOpen = true" class="flex items-center text-red-500 hover:text-red-400 space-x-1">
        <i class="fas fa-trash-alt"></i>
        <span>Delete</span>
    </button>
</div>

<!-- ✏️ Edit Modal -->
<div x-show="editOpen" x-transition class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50" style="display: none;">
    <div @click.away="editOpen = false"
        class="bg-gray-900 text-gray-200 rounded-lg p-6 w-full max-w-md shadow-lg border border-gray-700">

        <h2 class="text-2xl text-left  font-bold mb-4">Update Category</h2>

        <form method="POST" action="{{ route('type.update', $item->id) }}">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-4">
                <label class="block text-sm text-left text-gray-400 mb-1" for="name_{{ $item->id }}">Name</label>
                <input type="text" name="name" id="name_{{ $item->id }}" value="{{ $item->name }}" required
                    class="w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500 text-white">
            </div>

            <!-- Actions -->
            <div class="flex justify-end gap-2 mt-6">
                <button type="button" @click="editOpen = false"
                    class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded transition">
                    Cancel
                </button>
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded transition">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

<!-- 🗑️ Delete Confirmation Modal -->
<div x-show="deleteOpen" x-transition class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" style="display: none;">
    <div @click.away="deleteOpen = false"
        class="bg-gray-900 text-gray-200 rounded-lg p-6 w-full max-w-sm shadow-lg border border-gray-700">

        <h2 class="text-xl font-bold text-left mb-4">Delete Category</h2>
        <p class="text-gray-400  text-left mb-6">Are you sure you want to delete <span class="font-semibold text-white">{{ $item->name }}</span>?</p>

        <form method="POST" action="{{ route('type.destroy', $item->id) }}">
            @csrf
            @method('DELETE')

            <div class="flex justify-end gap-2">
                <button type="button" @click="deleteOpen = false"
                    class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded transition">
                    Cancel
                </button>
                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded transition">
                    Delete
                </button>
            </div>
        </form>
    </div>
</div>

</div>

                    
                      
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
    </div>
  </div>


  

  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <head>
    <!-- Other head content -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

  <script src="https://unpkg.com/alpinejs" defer></script>

  
@endsection
