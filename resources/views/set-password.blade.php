@extends('include/layout')
@section('title', 'Change Password')
@section('body')
    <div class="container max-w-md mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-center text-2xl font-bold mb-6 text-gray-800">Set Your Password</h2>

        <!-- Change Password Form -->
        <form action="{{ route('set-password.post', $user->id) }}" method="POST" class="space-y-4">
            @csrf

            <!-- New Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    class="w-full border border-gray-300 rounded-md p-2 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    placeholder="Enter your new password" 
                    required
                >
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    id="password_confirmation" 
                    class="w-full border border-gray-300 rounded-md p-2 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    placeholder="Confirm your new password" 
                    required
                >
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 transition duration-300"
            >
                Set Password
            </button>
        </form>
    </div>
@endsection
