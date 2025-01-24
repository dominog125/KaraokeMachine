@extends('include.layoutAdminPanel')
@section('title', 'User List')

@section('content')
    <div class="bg-white dark:bg-gray-800 p-6 shadow-md rounded-md">
        <h1 class="text-2xl font-bold mb-6">User List</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- User Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full border-separate border-spacing-0 table-auto">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700">
                        <th class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">ID</th>
                        <th class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">Name</th>
                        <th class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">Email</th>
                        <th class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">Account Status</th>
                        <th class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="border-b dark:border-gray-600">
                            <td class="p-4 text-gray-800 dark:text-gray-200">{{ $user->id }}</td>
                            <td class="p-4 text-gray-800 dark:text-gray-200">{{ $user->name }}</td>
                            <td class="p-4 text-gray-800 dark:text-gray-200">{{ $user->email }}</td>
                            <td class="p-4">
                                @if($user->is_banned)
                                    <span class="text-red-600 font-medium">Banned</span>
                                @else
                                    <span class="text-green-600 font-medium">Active</span>
                                @endif
                            </td>
                            <td class="p-4">
                                <!-- Ban Button -->
                                @if(!$user->is_banned && !$user->is_admin)
                                    <form 
                                        action="{{ route('admin.user.ban', $user->id) }}" 
                                        method="POST" 
                                        style="display:inline-block;">
                                        @csrf
                                        <button 
                                            type="submit" 
                                            onclick="return confirm('Are you sure you want to ban this user?')" 
                                            class="bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded-md">
                                            Ban
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Back Button -->
        <a 
            href="{{ route('admin.dashboard') }}" 
            class="inline-block text-blue-600 hover:text-blue-700 mt-6">
            Back to Admin Dashboard
        </a>
    </div>
@endsection
