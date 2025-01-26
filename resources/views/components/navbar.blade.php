<nav class="fixed top-0 left-[15%] right-[15%] z-50 flex justify-end bg-white text-black p-3  shadow-md font-sans antialiased dark:bg-gray-900 dark:text-white/50 rounded-b-lg">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="/" class="text-2xl font-black text-black hover:scale-105 transition-all duration-300 dark:text-white ">
            Sing It Out!
        </a>

        <!-- Menu dla dużych ekranów -->
        <ul class="hidden lg:flex space-x-6">
            <li><x-nav-link href="{{ route('welcome') }}">Home</x-nav-link></li>
            <li><x-nav-link href="{{ route('searchbar') }}">Search</x-nav-link></li>
            @if (Route::has('login'))
                @auth
                <li>
                    <x-nav-link href="{{ url('/home/{name}') }}">Profil</x-nav-link>
                </li>
                @if(auth()->user()->is_admin)
                    <li>
                        <x-nav-link href="{{ route('admin.dashboard') }}">Admin Panel</x-nav-link>
                    </li>
                @endif
                <li>
                    <x-nav-link>
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit">Log Out</button>
                        </form>
                    </x-nav-link>
                </li>
                @else
                <li><x-nav-link href="{{ route('login') }}">Log in</x-nav-link></li>
                @if (Route::has('login'))
                <li><x-nav-link href="{{ route('registration') }}">Register</x-nav-link></li>
                @endif
                @endauth
            @endif
        </ul>

        <!-- Mobile Menu  -->
        <button id="mobile-menu-button" class="lg:hidden py-3 text-gray-300 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>

        <ul id="mobile-menu" class="hidden absolute top-full left-0 w-full bg-white text-black shadow-md dark:bg-black dark:text-white/50 rounded-b-lg">
            <li class="border-b border-gray-200 dark:border-gray-700">
                <x-nav-link href="{{ route('welcome') }}">Home</x-nav-link>
            </li>
            <li class="border-b border-gray-200 dark:border-gray-700">
                <x-nav-link href="{{ route('searchbar') }}">Search</x-nav-link>
            </li>
            @if (Route::has('login'))
                @auth
                <li class="border-b border-gray-200 dark:border-gray-700">
                    <x-nav-link href="{{ url('/home/{name}') }}">Profil</x-nav-link>
                </li>
                @if(auth()->user()->is_admin)
                    <li class="border-b border-gray-200 dark:border-gray-700">
                        <x-nav-link href="{{ route('admin.dashboard') }}">Admin Dashboard</x-nav-link>
                    </li>
                @endif
                <li class="border-b border-gray-200 dark:border-gray-700">
                    <x-nav-link>
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit">Wyloguj</button>
                        </form>
                    </x-nav-link>
                </li>
                @else
                <li class="border-b border-gray-200 dark:border-gray-700">
                    <x-nav-link href="{{ route('login') }}">Log in</x-nav-link>
                </li>
                @if (Route::has('login'))
                <li class="border-b border-gray-200 dark:border-gray-700">
                    <x-nav-link href="{{ route('registration') }}">Register</x-nav-link>
                </li>
                @endif
                @endauth
            @endif
        </ul>
    </div>

<script>
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden'); // Przełącza widoczność menu mobilnego
    });
</script>
</nav>
