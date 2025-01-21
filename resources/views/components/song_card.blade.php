
<div class="max-w-md mx-auto">

    <a href="{{ route('song.show',[ $id ]) }}"
       class="flex items-center bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden transform hover:scale-105 hover:border-gray-300">

        <!-- Obrazek -->
        <img
            src="https://picsum.photos/120/120"
            alt="Song Cover"
            class="w-32 h-32 object-cover rounded-l-lg"

        >

        <!-- Treść -->
        <div class="p-4 flex-1">
            <h2 class="text-lg font-bold text-gray-800 mb-1">
                Title:{{ $title }}
            </h2>

            <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                Category:{{ $category }}
            </p>

            <span class="inline-block text-gray-500 text-xs uppercase font-semibold tracking-wide">
                Author:{{ $author }}
            </span>
        </div>
    </a>
</div>
