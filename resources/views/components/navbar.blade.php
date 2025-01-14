<nav class="mx-5 mt-10 flex flex-1 justify-end bg-white text-black p-4 shadow-md font-sans antialiased dark:bg-black dark:text-white/50 rounded-lg">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="/" class="text-2xl font-bold text-black hover:text-gray-300">
            Sing It Out!
        </a>
        
        <!-- Menu dla dużych ekranów -->
        <ul class="hidden md:flex space-x-6">
            <li><a href="/" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">Home</a></li>
            <li><a href="/about" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">About</a></li>
            <li><a href="/services" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">Services</a></li>
            <li><a href="/contact" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">Contact</a></li>
            <li>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home/{name}') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Profil
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </li>
        </ul>

        <!-- Przycisk do otwierania menu mobilnego -->
        <button id="mobile-menu-button" class="md:hidden text-gray-300 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </div>

    <!-- Menu mobilne -->
    <div id="mobile-menu" class="hidden md:hidden bg-gray-700 text-white">
        <ul class="space-y-2 p-4">
            <li><a href="/" class="block hover:text-gray-300">Home</a></li>
            <li><a href="/about" class="block hover:text-gray-300">About</a></li>
            <li><a href="/services" class="block hover:text-gray-300">Services</a></li>
            <li><a href="/contact" class="block hover:text-gray-300">Contact</a></li>
        </ul>
    </div>
</nav>

