@extends('include/layout')
@section('title','Login 🐒')
@section('body')
    <div class="flex items-center justify-center min-h-screen ">
        <div class="container max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-center text-2xl font-bold mb-6 text-gray-800">Welcome Back</h2>

            <!-- Login Form -->
            <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email"
                        class="w-full border border-gray-300 rounded-md p-2 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Enter your email"
                        required
                    >
                    <p class="text-xs text-gray-500 mt-1">We'll never share your email with anyone else.</p>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password"
                        class="w-full border border-gray-300 rounded-md p-2 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Enter your password"
                        required
                    >
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300"
                >
                    Log In
                </button>
            </form>

            <!-- Sign Up & Social Login -->
            <div class="text-center mt-6 space-y-4">
                <p class="text-sm text-gray-600">Don't have an account?</p>
                <a 
                    href="{{ route('registration') }}" 
                    class="block bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 transition duration-300"
                >
                    Sign Up
                </a>
                <p class="text-sm text-gray-600 mt-3">Or log in with:</p>
                <a 
                    href="{{ route('login.facebook') }}" 
                    class="mt-3 inline-flex items-center justify-center w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300"
                >
                    <i class="fab fa-facebook mr-2"></i> Login with Facebook
                </a>
            </div>

            <!-- Error Message -->
            @if (session('error'))
                <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
@endsection

