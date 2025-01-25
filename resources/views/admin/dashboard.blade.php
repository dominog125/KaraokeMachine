@extends('include.layout')

@section('title', 'Admin Dashboard')

@section('body')

<x-navbar />

<!-- Main Section -->
<div class="bg-gray-100 dark:bg-gray-900 min-h-screen py-20">
    <div class="container mx-auto px-6">
        <!-- Page Title -->
        <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-200 mb-8 text-center">Admin Dashboard</h1>

        <!-- Responsive Blocks -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Manage Authors -->
            <a href="{{ route('authors.index') }}" class="block bg-gray-200 dark:bg-gray-800 text-center p-6 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 dark:hover:bg-gray-700 hover:scale-105 transition">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Manage Authors</h2>
                <p class="mt-2 text-gray-600 dark:text-gray-400">View and update author information.</p>
            </a>

            <!-- Manage Categories -->
            <a href="{{ route('categories.index') }}" class="block bg-gray-200 dark:bg-gray-800 text-center p-6 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 dark:hover:bg-gray-700 hover:scale-105 transition">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Manage Categories</h2>
                <p class="mt-2 text-gray-600 dark:text-gray-400">Organize content by categories.</p>
            </a>

            <!-- Manage Songs -->
            <a href="{{ route('songs.index') }}" class="block bg-gray-200 dark:bg-gray-800 text-center p-6 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 dark:hover:bg-gray-700 hover:scale-105 transition">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Manage Songs</h2>
                <p class="mt-2 text-gray-600 dark:text-gray-400">Add, edit, and manage song details.</p>
            </a>
            <!-- Manage Users -->
            <a href="{{ route('admin.requests.index') }}" class="block bg-gray-200 dark:bg-gray-800 text-center p-6 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 dark:hover:bg-gray-700 hover:scale-105 transition">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Manage Song Requests</h2>
                <p class="mt-2 text-gray-600 dark:text-gray-400">View and handle song requests.</p>
            </a>
            <!-- Manage Users -->
            <a href="{{ route('users.index') }}" class="block bg-gray-200 dark:bg-gray-800 text-center p-6 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 dark:hover:bg-gray-700 hover:scale-105 transition">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Manage Users</h2>
                <p class="mt-2 text-gray-600 dark:text-gray-400">Oversee user accounts and permissions.</p>
            </a>

        </div>
    </div>
</div>

@endsection
