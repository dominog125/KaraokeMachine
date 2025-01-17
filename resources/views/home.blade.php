@extends('include/layout')
@section('title', 'Home 🐒')
@section('body')
    <x-navbar />
    <div class="flex-1 flex items-center justify-center py-16 relative">
        <div class="bg-white p-8 shadow-2xl rounded-lg w-[85%]">
            <!-- User Profile Header -->
            <div class="flex items-center gap-6 mb-8">
                <img src="{{ $user->avatar ?? '/images/default-avatar.png' }}" 
                     alt="User Avatar" 
                     class="w-40 h-40 rounded-full border-2 border-gray-300 shadow-lg">
                <div>
                    <h1 class="text-2xl font-bold">Welcome, {{ $user->name ?? 'Guest' }}!</h1>
                    <p class="text-gray-600">Last Login: {{ $user->last_login ?? 'Never' }}</p>
                </div>
            </div>

            <!-- Quick Navigation -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="block p-6 bg-gray-100 rounded-lg shadow-md text-center">
                    <h2 class="text-lg font-semibold">Sing it Out Your Favourite Tracks!</h2>
                    <p class="text-sm text-gray-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    <x-song_card />
                    <x-song_card />
                    <x-song_card />
                </div>
                <div class="block p-6 bg-gray-100 rounded-lg shadow-md text-center">
                    <h2 class="text-lg font-semibold">Sing it Out Your Recent Tracks!</h2>
                    <p class="text-sm text-gray-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    <x-song_card />
                    <x-song_card />
                    <x-song_card />
                </div>
                <div class="block p-6 bg-gray-100 rounded-lg shadow-md text-center">
                    <h2 class="text-lg font-semibold">Sing it Out Our Most Popular Tracks!</h2>
                    <p class="text-sm text-gray-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    <x-song_card />
                    <x-song_card />
                    <x-song_card />
                </div>
            </div>

            <!-- Footer -->
            <footer class="mt-8 text-center text-sm text-gray-500">
                <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
            </footer>
        </div>
    </div>
@endsection
