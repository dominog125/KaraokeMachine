<nav class="fixed top-0 left-[15%] right-[15%] z-50 flex justify-end bg-white text-black p-4 shadow-md font-sans antialiased dark:bg-black dark:text-white/50 rounded-b-lg">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="/" class="text-2xl font-black text-black hover:text-gray-300">
            Sing It Out!
        </a>

        <!-- Menu dla dużych ekranów -->
        <ul class="hidden md:flex space-x-6">

            <li><x-nav-link href="{{route('welcome')}}">Home</x-nav-link> </li>
            <li><x-nav-link href="{{route('searchbar')}}">Search</x-nav-link></li>

            <li><x-nav-link href="/services">Services</x-nav-link></li>
            <li><x-nav-link  href="/contact">Contact</x-nav-link></li>


                @if (Route::has('login'))
                    @auth
                    <li>
                        <x-nav-link  href="{{ url('/home/{name}') }}">
                            Profil
                        </x-nav-link>
                    </li>
                        @if(auth()->user()->is_admin ) {{-- Sprawdzanie roli użytkownika --}}
                            <li>
                                <x-nav-link href="{{ route('admin.dashboard') }}">
                                    Admin Dashboard
                                </x-nav-link>
                            </li>
                        @endif
                    <li>
                        <x-nav-link>
                            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit">Wyloguj</button>
                            </form>

                        </x-nav-link>
                    </li>

                    @else
                    <li>
                        <x-nav-link href="{{ route('login') }}">
                            Log in
                        </x-nav-link>
                    </li>
                        @if (Route::has('login'))

                        <li>
                            <x-nav-link href="{{ route('registration') }}">
                                Register
                            </x-nav-link>
                        </li>

                        @endif
                    @endauth
                @endif


        </ul>

        <!-- Przycisk do otwierania menu mobilnego -->
        <button id="mobile-menu-button" class="md:hidden text-gray-300 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>


        <!-- Menu mobilne -->
        <div id="mobile-menu" class="hidden md:hidden bg-gray-700 text-white">
            <ul class="space-y-2 p-4">
                <li><a href="/" class="block hover:text-gray-300">Home</a></li>
                <li><a href="/karaokesearch.blade.php" class="block hover:text-gray-300">About</a></li>
                <li><a href="/services" class="block hover:text-gray-300">Services</a></li>
                <li><a href="/contact" class="block hover:text-gray-300">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
