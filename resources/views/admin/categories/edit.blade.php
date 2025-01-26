@extends('include.layoutAdminPanel')
@section('title', 'Edit Category')
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

        <!-- Edit Category Form -->
        <form action="{{ route('categories.update', $category->ID) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Category Name Field -->
            <div class="space-y-4 mb-6">
                <label for="Category" class="block text-lg font-semibold text-gray-700 dark:text-gray-300">Category Name:</label>
                <input 
                    type="text" 
                    name="Category" 
                    id="Category" 
                    class="w-full border border-gray-300 dark:border-gray-700 rounded-md p-3 focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 dark:text-gray-100" 
                    value="{{ old('Category', $category->Category) }}"
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

        <!-- Back to Category List -->
        <a 
            href="{{ route('categories.index') }}" 
            class="inline-block mt-6 text-blue-600 hover:text-blue-700">
            Back to Categories List
        </a>
    </div>
@endsection

