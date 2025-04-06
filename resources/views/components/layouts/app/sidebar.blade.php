<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen overflow-hidden">

    <!-- Mobile menu button -->
    <div class="lg:hidden p-4 bg-white shadow z-50 relative">
        <button id="menu-btn" class="text-gray-800">
            <span class="material-icons text-3xl">menu</span>
        </button>
    </div>

    <!-- Overlay for mobile/tablet -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden lg:hidden"></div>

    <!-- Layout Wrapper -->
    <div class="flex h-[calc(100vh-64px)] lg:h-full">

        <!-- Sidebar -->
        <aside id="sidebar"
            class="bg-gray-800 text-white w-64 fixed lg:relative h-full transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-40">
            <div class="h-full flex flex-col">
                <div class="p-6 text-2xl font-bold border-b border-gray-700">MyApp</div>
                <nav class="flex-1 flex flex-col space-y-2 px-4 mt-4 overflow-y-auto">
                <script src="https://unpkg.com/alpinejs" defer></script>

<div x-data="{ open: false }" class="relative inline-block text-left w-full">
    <!-- Clickable User Block -->
    <button @click="open = !open" class="flex items-center gap-2 px-4 py-3 w-full border-b border-gray-200 dark:border-gray-700 text-left hover:bg-gray-400 dark:hover:bg-gray-800 transition">
        <span class="relative flex h-10 w-10 shrink-0 overflow-hidden rounded-lg">
            <span class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                {{ auth()->user()->initials() }}
            </span>
        </span>
        <div class="flex-1">
            <div class="font-semibold truncate">{{ auth()->user()->name }}</div>
            <div class="text-xs truncate text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}</div>
        </div>
        <span class="material-icons text-gray-500 transition-transform duration-300" :class="open ? 'rotate-180' : ''">expand_more</span>
    </button>

    <!-- Dropdown Content -->
    <div x-show="open" @click.outside="open = false" x-transition
         class="absolute left-0 mt-1 w-full bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-md shadow-lg z-50 p-4 space-y-3">
        <div class=" text-gray-700 dark:text-gray-300">
            <a href="{{ route('settings.profile') }}" class="flex items-center gap-2 hover:text-blue-200 transition">
                <span class="material-icons text-base">settings</span> Profile Settings
            </a>
        </div>
        <HR></HR>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center gap-2 text-red-600 hover:text-red-200 transition">
                <span class="material-icons text-base">logout</span> Log Out
            </button>
        </form>
    </div>
</div>

@if (auth()->user()->role == 'admin')
    <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 rounded hover:bg-gray-700 text-white">
        <span class="material-icons mr-3">dashboard</span>
        Home Page
    </a>
@endif


<a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 rounded hover:bg-gray-700 text-white">
    <span class="material-icons mr-3">person</span>
    Profile
</a>

<!-- Logout Button -->


                </nav>
                
               
                
<div class="w-64 bg-white dark:bg-gray-800 text-gray-800 dark:text-white rounded shadow-lg overflow-hidden text-sm">
    
    <!-- User Info -->
    

    <!-- Separator -->
    <div class="border-t border-gray-200 dark:border-gray-700 my-1"></div>


            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-4 bg-zinc-300 sm:p-6 transition-all duration-300 overflow-y-auto h-screen">
            @yield('content')
             {{ $slot }}
        </main>

    </div>

    <!-- Sidebar Toggle Script -->
    <script>
        const menuBtn = document.getElementById('menu-btn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        // Toggle sidebar
        menuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        // Close on overlay click
        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });

        // Auto close on nav link click (mobile/tablet only)
        document.querySelectorAll('#sidebar a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 1024) {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>
