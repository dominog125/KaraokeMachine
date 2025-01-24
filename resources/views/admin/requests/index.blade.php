@extends('include.layout')

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Manage Requests</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="table-auto w-full bg-white shadow-md rounded-lg">
            <thead>
            <tr class="bg-gray-200 text-left">
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">User</th>
                <th class="px-4 py-2">Song ID</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($requests as $request)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $request->ID }}</td>
                    <td class="px-4 py-2">{{ $request->user->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2">{{ $request->IDSong }}</td>
                    <td class="px-4 py-2">{{ ucfirst($request->status) }}</td>
                    <td class="px-4 py-2">
                        <form action="{{ route('admin.requests.updateStatus', ['request' => $request->id, 'status' => 'accepted']) }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Accept</button>
                        </form>
                        <form action="{{ route('admin.requests.updateStatus', ['request' => $request->id, 'status' => 'declined']) }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Decline</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

