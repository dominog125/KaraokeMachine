@extends('include/layout')
@section('title','Welcome 🐒')
@section('body')
    <!-- Nawigacja -->
    <x-navbar />

    <!-- Main Content -->
    <div class="container mx-auto mt-6">

        <!-- Dashboard Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-xl font-bold">Users</h3>
                <p class="text-gray-600">Total Registered: <span class="font-bold">123</span></p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-xl font-bold">Songs</h3>
                <p class="text-gray-600">Total Songs: <span class="font-bold">456</span></p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-xl font-bold">Proposals</h3>
                <p class="text-gray-600">Pending Changes: <span class="font-bold">12</span></p>
            </div>
        </div>

        <!-- Users Table -->
        <div class="mt-8">
            <h2 class="text-2xl font-bold mb-4">Manage Users</h2>
            <div class="bg-white rounded shadow overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Name</th>
                            <th class="py-3 px-6 text-left">Email</th>
                            <th class="py-3 px-6 text-center">Status</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm">
                        <!-- Example Row -->
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">John Doe</td>
                            <td class="py-3 px-6 text-left">john.doe@example.com</td>
                            <td class="py-3 px-6 text-center">
                                <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Active</span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <button class="bg-red-500 text-white py-1 px-3 rounded text-xs">Block</button>
                            </td>
                        </tr>
                        <!-- Add rows dynamically -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Songs Table -->
        <div class="mt-8">
            <h2 class="text-2xl font-bold mb-4">Manage Songs</h2>
            <div class="bg-white rounded shadow overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Title</th>
                            <th class="py-3 px-6 text-left">Author</th>
                            <th class="py-3 px-6 text-center">Category</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm">
                        <!-- Example Row -->
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">Imagine</td>
                            <td class="py-3 px-6 text-left">John Lennon</td>
                            <td class="py-3 px-6 text-center">Pop</td>
                            <td class="py-3 px-6 text-center">
                                <button class="bg-blue-500 text-white py-1 px-3 rounded text-xs">Edit</button>
                                <button class="bg-red-500 text-white py-1 px-3 rounded text-xs">Delete</button>
                            </td>
                        </tr>
                        <!-- Add rows dynamically -->
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>
</html>
