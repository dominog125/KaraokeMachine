@extends('include/layout')
@section('title','Home 🐒')
@section('body')
    <x-navbar />

    <div class="flex-1 flex top-[30px] items-center justify-center py-16 relative">
        <!-- Główna sekcja -->
        <div class="bg-white p-8 shadow-2xl flex-col rounded-lg grid grid-cols-1 md:grid-cols-1 gap-6 w-[70%] ">


            @if (count($results) > 0)
                <ul>
                    @foreach ($results as $result)

                        <x-song_card :id="$result->ID" :title="$result->Title" :category="$result->category_name" :author="$result->author_name" />
                    @endforeach
                </ul>

            @else
                <p>No results found.</p>
            @endif

            <!-- Stopka -->
            <footer class="p-6 rounded-lg shadow-md col-span-full md:grid-cols-1 py-8 text-center text-sm bg-gray-100 dark:bg-gray-800 dark:text-gray-400 mt-4">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </footer>
        </div>
    </div>




@endsection
