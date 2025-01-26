@extends('include.layout')
@section('title', 'Karaoke Search 🎤')
@section('body')

    <x-navbar/>

<div class="flex-1 flex items-center justify-center py-16 relative">
    <!-- Main Section -->
    <div class="bg-white p-8 shadow-2xl flex-col rounded-lg grid grid-cols-1 md:grid-cols-1 gap-6 w-[70%] dark:bg-gray-800 dark:text-gray-100">

        <!-- Search Bar -->
        <div class=" w-11/12 mx-auto mb-6">
            <form action="{{ route('song.search') }}" method="GET" class="flex items-center space-x-2">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Search Karaoke" 
                    class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200"
                >
                <select 
                    name="filter" 
                    class="px-4 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200"
                >
                    <option value="title">Title</option>
                    <option value="author">Author</option>
                    <option value="category">Category</option>
                    <option value="lyrics">Lyrics</option>
                </select>
                <button 
                    type="submit" 
                    class="
                        group
                        bg-white
                        dark:bg-gray-700
                        hover:bg-[linear-gradient(319deg,#ffcccc_0%,#ff66cc_50%,#cc0066_100%)]
                        shadow-md
                        hover:shadow-lg
                        rounded-full
                        px-4
                        py-2
                        text-gray-800
                        dark:text-gray-200
                        hover:text-white
                        hover:scale-105
                        ring-1
                        ring-gray-300
                        dark:ring-gray-600
                        font-bold
                        block
                        text-center
                        transition-all
                        duration-300"
                >
                    <span class="
                        bg-[linear-gradient(319deg,#ffcccc_0%,#ff66cc_50%,#cc0066_100%)]
                        bg-clip-text text-transparent 
                        group-hover:text-white 
                        dark:group-hover:text-gray-700
                        transition-all 
                        duration-500"
                    >
                    Search
                    </span>   
                </button>
            </form>
        </div>

        @if ($results->count() > 0)
            <ul class="space-y-4">
                @foreach ($results as $result)
                    <li>
                        <x-song_card
                            :id="$result->ID"
                            :title="$result->Title"
                            :category="$result->category"
                            :author="$result->author"
                        />
                    </li>
                @endforeach
            </ul>

            <!-- Pagination Links -->
            <div class="max-w-md mx-auto mt-4">
                {{ $results->links() }}
            </div>
        @else
            <p class="text-center text-gray-600 dark:text-gray-300">No results found. Try searching for a different song.</p>
        @endif

        <!-- Footer -->
        <x-footer/>
    </div>
</div>