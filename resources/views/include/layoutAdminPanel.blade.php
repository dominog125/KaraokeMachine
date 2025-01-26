<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Admin Panel')</title>    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Styles / Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style></style>
    @endif
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-200 dark:bg-gray-800 shadow-md min-h-screen p-4">
            <h2 class="text-xl font-bold mb-4">Admin Panel</h2>
            <nav>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" 
                           class="block px-4 py-2 rounded-md hover:bg-gray-300 dark:hover:bg-gray-700">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('authors.index') }}" 
                           class="block px-4 py-2 rounded-md hover:bg-gray-300 dark:hover:bg-gray-700">
                            Manage Authors
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('categories.index') }}" 
                           class="block px-4 py-2 rounded-md hover:bg-gray-300 dark:hover:bg-gray-700">
                            Manage Categories
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('songs.index') }}" 
                           class="block px-4 py-2 rounded-md hover:bg-gray-300 dark:hover:bg-gray-700">
                            Manage Songs
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.requests.index') }}" 
                           class="block px-4 py-2 rounded-md hover:bg-gray-300 dark:hover:bg-gray-700">
                            Manage Requests
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}" 
                           class="block px-4 py-2 rounded-md hover:bg-gray-300 dark:hover:bg-gray-700">
                            Manage users
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <header class="mb-6">
                <h1 class="text-3xl font-bold">@yield('title')</h1>
            </header>

            <div>
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
