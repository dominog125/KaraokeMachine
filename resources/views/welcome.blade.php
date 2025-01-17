@extends('include/layout')
@section('title','Welcome 🐒')
@section('body')
    <!-- Nawigacja -->
    <x-navbar />

    <!-- Główna zawartość -->
    <div class="flex-1 flex items-center justify-center py-16 relative">
        <!-- Główna sekcja -->
        <div class="bg-white p-8 shadow-2xl flex-col rounded-lg grid grid-cols-1 md:grid-cols-2 gap-6 w-[70%]">
            <!-- Lewa sekcja -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-4 text-center">About Us</h2>
            </div>

            <!-- Prawa sekcja -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-bold mb-4 text-center">Search & Discover Your Favrouite Tracks</h2>
                <x-karaokesearch />
                <x-song_card />
                <x-song_card />
                <x-song_card />
                <x-song_card />
            </div>

            <!-- Stopka -->
            <footer class="p-6 rounded-lg shadow-md col-span-full md:grid-cols-1 py-8 text-center text-sm bg-gray-100 dark:bg-gray-800 dark:text-gray-400 mt-4">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})

                    <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-red-600 ring-1 ring-gray-400 font-black transition-all duration-300 hover:text-white hover:ring-red-600 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Log in
                    </a>
                    <a href="{{ route('registration') }}" class="rounded-md px-3 py-2 text-red-600 ring-1 ring-gray-400 font-black transition-all duration-300 hover:text-white hover:ring-red-600 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Register
                    </a>

            </footer>  
        </div>
    </div>
@endsection
