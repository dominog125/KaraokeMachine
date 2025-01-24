@extends('include.layoutAdminPanel')

@section('title', 'Author Details')

@section('content')
    <div class="bg-white dark:bg-gray-800 p-6 shadow-md rounded-md">
        <h1 class="text-2xl font-bold mb-6">Author Details</h1>

        <!-- Author Details -->
        <div class="space-y-4">
            <p class="text-lg">
                <strong class="font-semibold text-gray-700 dark:text-gray-300">ID:</strong> 
                <span class="text-gray-900 dark:text-gray-100">{{ $category->ID }}</span>
            </p>
            <p class="text-lg">
                <strong class="font-semibold text-gray-700 dark:text-gray-300">Name:</strong> 
                <span class="text-gray-900 dark:text-gray-100">{{ $category->Category }}</span>
            </p>
        </div>

        <!-- Back to Author List -->
        <a 
            href="{{ route('categories.index') }}" 
            class="inline-block mt-6 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition duration-300">
            Back to Category List
        </a>
    </div>
@endsection
