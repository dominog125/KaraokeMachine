@extends('include.layoutAdminPanel')

@section('title', 'Edit Author')

@section('content')
    <div class="bg-white dark:bg-gray-800 p-6 shadow-md rounded-md">
        <h1 class="text-2xl font-bold mb-6">Edit Author</h1>

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

        <!-- Edit Author Form -->
        <form action="{{ route('authors.update', $author->ID) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Author Name Field -->
            <div class="space-y-4 mb-6">
                <label for="Author" class="block text-lg font-semibold text-gray-700 dark:text-gray-300">Author Name:</label>
                <input 
                    type="text" 
                    name="Author" 
                    id="Author" 
                    class="w-full border border-gray-300 dark:border-gray-700 rounded-md p-3 focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 dark:text-gray-100" 
                    value="{{ old('Author', $author->Author) }}"
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
            href="{{ route('authors.index') }}" 
            class="inline-block mt-6 text-blue-600 hover:text-blue-700">
            Back to Author List
        </a>
    </div>
@endsection

