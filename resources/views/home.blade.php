@extends('include/layout')
@section('title', 'Home 🎤')
@section('body')
    <x-navbar />

@endsection
    <div class="flex-1 flex items-center justify-center py-16 relative">
        <div class="bg-white p-8 shadow-2xl rounded-lg w-[85%]">
            <!-- User Profile Header -->
            <div class="flex items-center gap-8 mb-8">
                <img src="{{ $user->avatar ?? asset('images/profile.png') }}" 
                     alt="User Avatar" 
                     class="w-40 h-40 rounded-full border-2 border-gray-300 shadow-lg">
                <div>
                    <h1 class="text-2xl font-bold">Welcome, {{ $user->name ?? 'Guest' }}!</h1>
                    <p class="text-gray-600 mb-2" >Last Login: {{ $user->last_login ?? 'today' }}</p>
                    @if (Route::has('login'))
                        @auth
                            <a class="
                            bg-[linear-gradient(319deg,_#ff4d4d_0%,_#ff0066_37%,_#ff6699_100%)]
                            hover:bg-[linear-gradient(319deg,_#ff6f6f_0%,_#ff3380_37%,_#ff85a3_100%)]
                            hover:scale-105
                            text-white shadow-md rounded-md px-4 py-2 font-black transition-all duration-500" href="{{ url('/change-password') }}">
                                Change Password
                            </a>
                        @else
                        @endauth
                    @endif

                </div>
            </div>


            <!-- Quick Navigation -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="block p-6 bg-gray-100 rounded-lg shadow-md text-center">
                    <h2 class="text-lg font-semibold">Sing it Out Your Favourite Tracks!</h2>
                    <p class="text-sm text-gray-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>

                    <x-song_card :id="1" :title="1" :category="1" :author="1" />
                    <x-song_card :id="1" :title="1" :category="1" :author="1" />
                    <x-song_card :id="1" :title="1" :category="1" :author="1" />


                </div>
                <div class="block p-6 bg-gray-100 rounded-lg shadow-md text-center">
                    <h2 class="text-lg font-semibold">Sing it Out Your Recent Tracks!</h2>
                    <p class="text-sm text-gray-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>

                    <x-song_card :id="1" :title="1" :category="1" :author="1" />
                    <x-song_card :id="1" :title="1" :category="1" :author="1" />
                    <x-song_card :id="1" :title="1" :category="1" :author="1" />

                </div>
                <div class="block p-6 bg-gray-100 rounded-lg shadow-md text-center">
                    <h2 class="text-lg font-semibold">Sing it Out Our Most Popular Tracks!</h2>
                    <p class="text-sm text-gray-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>

                    <x-song_card :id="1" :title="1" :category="1" :author="1" />
                    <x-song_card :id="1" :title="1" :category="1" :author="1" />
                    <x-song_card :id="1" :title="1" :category="1" :author="1" />


                </div>
            </div>

            <!-- Footer -->
            <x-footer/>       
        </div>
    </div>
    