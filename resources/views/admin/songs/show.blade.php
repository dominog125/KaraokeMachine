@extends('include.layoutAdminPanel')
@section('title', 'Song Details')
@section('content')
    <div class="bg-white dark:bg-gray-800 p-6 shadow-md rounded-md">
        <a 
            href="{{ route('songs.index') }}" 
            class="inline-block text-blue-600 hover:text-blue-700 mb-4">
            Back to Song List
        </a>

        <h1 class="text-2xl font-bold mb-6">Song Details</h1>

        <!-- Song Details -->
        <div class="mb-6">
            <p><strong class="font-medium">ID:</strong> {{ $song->ID }}</p>
            <p><strong class="font-medium">Title:</strong> {{ $song->Title }}</p>
            <p><strong class="font-medium">Author (ID):</strong> {{ $song->Author }}</p>
            <p><strong class="font-medium">Category (ID):</strong> {{ $song->Category }}</p>
            <p><strong class="font-medium">Likes:</strong> {{ $song->Likes }}</p>
        </div>

        <!-- Add New Lyric Row -->
        <h3 class="text-xl font-semibold mb-4">Add New Lyric Row</h3>
        <form method="POST" action="{{ route('lyrics.storeFromShow') }}" class="mb-6">
            @csrf
            <input type="hidden" name="IDSong" value="{{ $song->ID }}">
            <div class="mb-4">
                <label class="block font-medium mb-1">Lyric Text:</label>
                <input 
                    type="text" 
                    name="RowTe" 
                    required 
                    class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white">
            </div>
            <div class="mb-4">
                <label class="block font-medium mb-1">Time:</label>
                <input 
                    type="text" 
                    name="TimeTe" 
                    required 
                    class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white">
            </div>
            <button 
                type="submit" 
                class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md">
                Add Lyric
            </button>
        </form>

        <!-- Lyrics Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full border-separate border-spacing-0 table-auto">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700">
                        <th class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">ID</th>
                        <th class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">IDSong</th>
                        <th class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">Text</th>
                        <th class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">Time</th>
                        <th class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lyrics as $lyric)
                        <tr class="border-b dark:border-gray-600">
                            <td class="p-4 text-gray-800 dark:text-gray-200">{{ $lyric->ID }}</td>
                            <td class="p-4 text-gray-800 dark:text-gray-200">{{ $lyric->IDSong }}</td>
                            <td class="p-4">
                                <form method="POST" action="{{ route('lyrics.updateFromShow', $lyric->ID) }}" class="flex items-center space-x-2">
                                    @csrf
                                    @method('PUT')
                                    <input 
                                        type="text" 
                                        name="RowTe" 
                                        value="{{ $lyric->RowTe }}" 
                                        required 
                                        class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white">
                                    <input 
                                        type="text" 
                                        name="TimeTe" 
                                        value="{{ $lyric->TimeTe }}" 
                                        required 
                                        class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-white">
                                    <button 
                                        type="submit" 
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded-md">
                                        Save
                                    </button>
                                </form>
                            </td>
                            <td class="p-4">
                                <form 
                                    method="POST" 
                                    action="{{ route('lyrics.destroyFromShow', $lyric->ID) }}" 
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        onclick="return confirm('Are you sure you want to delete this lyric?')" 
                                        class="bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded-md">
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
