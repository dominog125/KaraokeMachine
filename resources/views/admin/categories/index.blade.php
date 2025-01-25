@extends('include.layoutAdminPanel')
@section('title', 'Category List')
@section('content')
    <div class="bg-white dark:bg-gray-800 p-6 shadow-md rounded-md">

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-md mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Add New Category Button -->
        <a 
            href="{{ route('categories.create') }}" 
            class="inline-block bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md mb-6">
            Add New Category
        </a>

        <!-- Categories Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full border-separate border-spacing-0 table-auto">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700">
                        <th class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">ID</th>
                        <th class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">Category Name</th>
                        <th class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $cat)
                        <tr class="border-b dark:border-gray-600">
                            <td class="p-4 text-gray-800 dark:text-gray-200">{{ $cat->ID }}</td>
                            <td class="p-4">
                                <a 
                                    href="{{ route('categories.show', $cat->ID) }}"
                                    class="text-blue-600 hover:text-blue-700">
                                    {{ $cat->Category }}
                                </a>
                            </td>
                            <td class="p-4">
                                <a 
                                    href="{{ route('categories.edit', $cat->ID) }}" 
                                    class="text-yellow-600 hover:text-yellow-700 mr-2">
                                    Edit
                                </a>
                                |
                                <form action="{{ route('categories.destroy', $cat->ID) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        onclick="return confirm('Are you sure you want to delete this author?')" 
                                        class="text-red-600 hover:text-red-700 ml-2">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
@endsection
