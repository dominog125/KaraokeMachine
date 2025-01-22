@extends('include/layout')
@section('title','Registration')
@section('body')
    <div class="flex items-center justify-center min-h-screen">
        <div class="container max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-center text-2xl font-bold mb-6 text-gray-800">Create Your Account</h2>

            <form action="{{ route('registration.post') }}" method="post" class="space-y-4">
                @csrf


                <!-- Username -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">User Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="w-full border border-gray-300 rounded-md p-2 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Enter your username"
                        required
                    >
                </div>

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
                    Register
                </button>
            </form>

            <!-- Link to Login -->
            <div class="text-center mt-6">
                <p class="text-sm text-gray-600">Already have an account?</p>
                <a 
                    href="{{ route('login') }}" 
                    class="block bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 transition duration-300"
                >
                    Log In
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
