@extends('include/layout')
@section('title', 'Change Password')
@section('body')
    <div class="flex items-center justify-center min-h-screen">
        <div class="container max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-center text-2xl font-bold mb-6 text-gray-800">Change Password</h2>

            <!-- Display Success or Error Messages -->
            @if (session('error'))
                <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Change Password Form -->
            <form action="{{ route('change-password') }}" method="POST" class="space-y-4">
                @csrf

                <!-- New Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="w-full border border-gray-300 rounded-md p-2 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Type Your new password"
                        required
                    >
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        id="password_confirmation" 
                        class="w-full border border-gray-300 rounded-md p-2 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Confirm new password"
                        required
                    >
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300"
                >
                    Change Password
                </button>
            </form>
        </div>
    </div>
@endsection
