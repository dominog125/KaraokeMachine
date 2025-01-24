@extends('include.layoutAdminPanel')

@section('title', 'Add Category')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-xl font-semibold mb-4">Add a New Category</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-md mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST" class="space-y-4 bg-white p-6 shadow-md rounded-md">
            @csrf
            <div>
                <label for="Category" class="block text-sm font-medium">Category Name</label>
                <input 
                    type="text" 
                    name="Category" 
                    id="Category" 
                    value="{{ old('Category') }}"
                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200"
                >
            </div>
            <button 
                type="submit" 
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition duration-300">
                Save
            </button>
        </form>

        <a href="{{ route('categories.index') }}" class="inline-block mt-4 text-blue-500 hover:underline">
            Back to Cattegory List
        </a>
    </div>
@endsection