@extends('include/layout')
@section('title', 'Karaoke Search 🎤')
@section('body')

    <x-navbar/>



    <div class="flex-1 flex top-[30px] items-center justify-center py-16 relative">
        <!-- Główna sekcja -->
        <div class="bg-white p-8 shadow-2xl flex-col rounded-lg grid grid-cols-1 md:grid-cols-1 gap-6 w-[70%] ">

            <div class="max-w-md mx-auto">
                <form action="{{ route('song.search') }}" method="GET">
                    <input type="text" name="search" placeholder="Search Songs">
                    <select name="filter">
                        <option value="title">Title</option>
                        <option value="author">Author</option>
                        <option value="category">Category</option>
                        <option value="lyrics">Lyrics</option>
                    </select>
                    <button type="submit">Search</button>
                </form>

            </div>


<x-navbar />

<div class="flex-1 flex top-[30px] items-center justify-center py-16 relative">
    <!-- Main Section -->
    <div class="bg-white p-8 shadow-2xl flex-col rounded-lg grid grid-cols-1 md:grid-cols-1 gap-6 w-[70%] dark:bg-gray-900 dark:text-gray-100">

        <!-- Search Bar -->
        <div class="max-w-md mx-auto mb-6">
            <form action="{{ route('song.search') }}" method="GET" class="flex items-center space-x-2">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Search Karaoke" 
                    class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200"
                >
                <button 
                    type="submit" 
                    class="
                        bg-[linear-gradient(319deg,_#ff4d4d_0%,_#ff0066_37%,_#ff6699_100%)]
                        bg-bg-custom-gradient
                        group 
                        hover:bg-[linear-gradient(319deg,_#ff6f6f_0%,_#ff3380_37%,_#ff85a3_100%)] 
                        shadow-md 
                        rounded-full 
                        px-4 
                        py-2 
                        text-white 
                        font-bold 
                        transition-all 
                        duration-300"
                >
                    Search
                </button>
            </form>
        </div>


            @if ($results->count() > 0)
                <ul>
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


                <!-- Linki paginacji -->
                <div class="pagination">
                    {{ $results->links() }}
                </div>

            @else
                <p class="text-center text-gray-600 dark:text-gray-300">No results found. Try searching for a different song.</p>
            @endif

        </div>


        <!-- Results Pagination -->
        <div class="max-w-md mx-auto mt-4">
            {{ $results->links() }}
        </div>

        <!-- Footer -->
        <footer class="p-6 rounded-lg shadow-md text-center text-sm bg-gray-100 dark:bg-gray-800 dark:text-gray-400 mt-4">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </footer>
    </div>
</div>

@endsection
