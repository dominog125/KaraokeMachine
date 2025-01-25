@extends('include.layoutAdminPanel')
@section('title', 'Edit Song')
@section('content')
    <div class="bg-white dark:bg-gray-800 p-6 shadow-md rounded-md">

        <!-- Error Handling -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-md mb-6">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Edit Song Form -->
        <form action="{{ route('songs.update', $song->ID) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Song Name Field -->
            <div class="space-y-4 mb-6">
                <label for="Title" class="block text-lg font-semibold text-gray-700 dark:text-gray-300">Title</label>
                <input 
                    type="text" 
                    name="Title" 
                    id="Title" 
                    class="w-full border border-gray-300 dark:border-gray-700 rounded-md p-3 focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 dark:text-gray-100" 
                    value="{{ old('Title') }}"
                    required
                >
            </div>
            <!-- Author's ID Field -->
            <div class="space-y-4 mb-6">
                <label for="Author" class="block text-lg font-semibold text-gray-700 dark:text-gray-300">Author's ID</label>
                <input 
                    type="number" 
                    name="Author" 
                    id="Author"
                     class="w-full border border-gray-300 dark:border-gray-700 rounded-md p-3 focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 dark:text-gray-100" 
                    value="{{ old('Author') }}"
                    required
                >
            </div>
            <!-- Categories ID Field -->
            <div class="space-y-4 mb-6">
                <label for="Category" class="block text-lg font-semibold text-gray-700 dark:text-gray-300">Category's ID</label>
                <input 
                    type="number" 
                    name="Category"
                    id="Category" 
                    class="w-full border border-gray-300 dark:border-gray-700 rounded-md p-3 focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 dark:text-gray-100" 
                    value="{{ old('Category') }}"
                    required
                >
            </div>
            <!-- Likes Field -->
            <div class="space-y-4 mb-6">
                <label for="Likes" class="block text-lg font-semibold text-gray-700 dark:text-gray-300">Likes</label>
                <input 
                    type="number" 
                    name="Likes"
                    id="Likes" 
                    class="w-full border border-gray-300 dark:border-gray-700 rounded-md p-3 focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 dark:text-gray-100" 
                    value="{{ old('Likes') }}"
                    required
                >
            </div>
            <!-- YT code Field -->
            <div class="space-y-4 mb-6">
                <label for="Ytlink" class="block text-lg font-semibold text-gray-700 dark:text-gray-300">Youtube Link (Video Identifier)</label>
                <input 
                    type="text" 
                    name="Ytlink" 
                    id="Ytlink" 
                    class="w-full border border-gray-300 dark:border-gray-700 rounded-md p-3 focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 dark:text-gray-100" 
                    value="{{ old('Ytlink') }}"
                    required
                >
            </div>
            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md transition duration-300">
                Save Changes
            </button>
        </form>
        <!-- Back to Author List -->
        <a 
            href="{{ route('songs.index') }}" 
            class="inline-block mt-6 text-blue-600 hover:text-blue-700">
            Back to Song List
        </a>
    </div>
@endsection

