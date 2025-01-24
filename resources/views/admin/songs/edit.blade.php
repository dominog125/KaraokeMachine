@extends('include.layoutAdminPanel')

@section('title', 'Edit Song')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-xl font-semibold mb-4">Add a New Song</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-md mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('songs.update', $song->ID) }}" class="space-y-4 bg-white p-6 shadow-md rounded-md">
            @csrf
            @method('PUT')
            <div>
                <label for="Title" class="block text-sm font-medium">Title</label>
                <input 
                    type="text" 
                    name="Title" 
                    id="Title" 
                    value="{{ old('Title') }}"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"  >
            </div>

            <div>
                <label for="Author" class="block text-sm font-medium">Author's ID</label>
                <input 
                    type="number" 
                    name="Author" 
                    id="Author" 
                    value="{{ old('Author') }}"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"  >
            </div>

            <div>
                <label for="Category" class="block text-sm font-medium">Category's ID</label>
                <input 
                    type="number" 
                    name="Category"
                    id="Category" 
                    value="{{ old('Category') }}"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"  >
            </div>

            <div>
                <label for="Likes" class="block text-sm font-medium">Likes</label>
                <input 
                   type="number" 
                   name="Likes" 
                   id="Likes" 
                   value="{{ old('Likes') }}"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"  >
            </div>

            <div>
                <label for="Ytlink" class="block text-sm font-medium">Link do Youtube(Podaj Identyfikator filmu):</label>
                <input 
                    type="text" 
                    name="Ytlink" 
                    id="Ytlink" 
                    value="{{ old('Ytlink') }}"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"  >
            </div>

            <button 
                type="submit" 
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition duration-300">
                Save
            </button>
        </form>
    </div>

