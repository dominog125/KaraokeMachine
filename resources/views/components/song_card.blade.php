
<div class="w-11/12 mx-auto">

    <a href="{{ route('song.show',[ $id ]) }}"
       class="flex items-center bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-transform duration-300 overflow-hidden transform hover:scale-105 hover:border-gray-300">

        <!-- Obrazek -->
        <img
            src="{{ asset('images/song.png') }}"
            alt="Song Cover"
            class="w-32 h-32 object-cover rounded-l-lg"
        >
        <!-- Treść -->
        <div class="p-4 flex-1">
            <h2 class="text-lg font-bold text-gray-800 mb-1">
            
                {{ $title ?? 'title'}}
            </h2>

            <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                Category:{{ $category ?? 'category'}}
            </p>

            <span class="inline-block text-gray-500 text-xs uppercase font-semibold tracking-wide">
                Author:{{ $author ?? 'author' }}
            </span>
        </div>
    </a>
</div>
