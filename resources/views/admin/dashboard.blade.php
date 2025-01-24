@extends('include.layout')
{{-- Uwaga: zwykle zapisujemy „kropką” (@extends('include.layout')),
     ale slash też może zadziałać --}}

@section('title', 'Admin Panel')
@section('body')
    <div class="min-h-screen bg-gray-100">
        <!-- Header Section -->
        <header class="bg-white shadow-md py-4 px-6">
            <h1 class="text-2xl font-bold text-gray-800">Admin Panel</h1>
            <p class="text-gray-600">Welcome to the admin panel! Here you can manage users, songs, categories, authors, and more.</p>
        </header>


        <!-- Main Content Section -->
        <main class="container mx-auto py-8 px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Users -->
                <a href="{{ route('users.index') }}" class="group block p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <h2 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600">Manage Users</h2>
                    <p class="text-gray-600">Add, edit, and delete user accounts.</p>
                </a>

                <!-- Songs -->
                <a href="{{ route('songs.index') }}" class="group block p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <h2 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600">Manage Songs</h2>
                    <p class="text-gray-600">View and edit song information.</p>
                </a>

                <!-- Categories -->
                <a href="{{ route('categories.index') }}" class="group block p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <h2 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600">Manage Categories</h2>
                    <p class="text-gray-600">Organize and update categories.</p>
                </a>

                <!-- Authors -->
                <a href="{{ route('authors.index') }}" class="group block p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300">
                    <h2 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600">Manage Authors</h2>
                    <p class="text-gray-600">View and edit author details.</p>
                </a>
            </div>
        </main>

        <!-- Footer Section -->
        <footer class="bg-gray-200 py-4 mt-6 text-center text-sm text-gray-600">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) | Admin Panel
        </footer>

    </div>

