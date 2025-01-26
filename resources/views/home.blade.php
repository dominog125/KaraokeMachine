@extends('include/layout')
@section('title', 'Home 🎤')
@section('body')
    <x-navbar />

@endsection
    <div class="flex-1 flex items-center justify-center py-16 relative">
        <div class="bg-white dark:bg-gray-800 dark:text-gray-200 p-8 shadow-2xl rounded-lg w-[70%]">
            <!-- User Profile Header -->
            <div class="flex items-center gap-8 mb-8">
                <img src="{{ $user->avatar ?? asset('images/profile.png') }}"
                     alt="User Avatar"
                     class="w-40 h-40 rounded-full border-2 border-gray-300 shadow-lg">
                <div>
                    <h1 class="text-2xl font-bold">Welcome, {{ $user->name ?? 'Guest' }}!</h1>
                    <p class="text-gray-600 mb-2" >Last Login: {{ $user->last_login                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              ?? 'today' }}</p>
                    @if (Route::has('login'))
                        @auth
                            <div class="
                                hover:scale-105 bg-[linear-gradient(319deg,_#ff4d4d_0%,_#ff0066_37%,_#ff6699_100%)]
                                hover:bg-[linear-gradient(319deg,_#ff6f6f_0%,_#ff3380_37%,_#ff85a3_100%)]
                                text-white
                                max-w-fit
                                shadow-md
                                rounded-md
                                px-4
                                py-2
                                font-black
                                transition-all
                                duration-500">
                                <a href="{{ url('/change-password') }}">
                                    Change Password
                                </a>
                            </div>

                        @else
                        @endauth
                    @endif

                </div>
            </div>


            <!-- Quick Navigation -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 ">

                <div class="block p-6 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md text-center">
                    <h2 class="text-lg font-semibold">Sing it Out Our Recent Tracks!</h2>
                    <p class="text-sm text-gray-500"></p>
                    <div class="text-left">

                        @foreach ($songsLikes as $songl)

                                <x-song_card
                                    :id="$songl->ID"
                                    :title="$songl->Title"
                                    :category="$songl->category->Category"
                                    :author="$songl->author->Author"
                                />

                        @endforeach
                    </div>


                </div>
                <div class="block p-6 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md text-center">
                    <h2 class="text-lg font-semibold">Sing it Out Our Most Popular Tracks!</h2>
                    <p class="text-sm text-gray-500"></p>

                    <div class="text-left">


                        @foreach ($songsNew as $songn)

                            <x-song_card
                                :id="$songn->ID"
                                :title="$songn->Title"
                                :category="$songn->category->Category"
                                :author="$songn->author->Author"
                            />

                        @endforeach

                    </div>

                </div>
            </div>

            <!-- Footer -->
            <x-footer/>
        </div>
    </div>
