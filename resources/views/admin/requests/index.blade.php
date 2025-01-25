@extends('include.layoutAdminPanel')

@section('title', 'Manage Requests')

@section('content')
<div class="container mx-auto p-6">

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="table-auto w-full">
            <thead>
                <tr class="bg-gray-100 text-gray-800 text-left">
                    <th class="px-6 py-3 text-sm font-medium">ID</th>
                    <th class="px-6 py-3 text-sm font-medium">User</th>
                    <th class="px-6 py-3 text-sm font-medium">Song ID</th>
                    <th class="px-6 py-3 text-sm font-medium">Status</th>
                    <th class="px-6 py-3 text-sm font-medium">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($requests as $request)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $request->ID }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $request->user->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $request->IDSong }}</td>
                        <td class="px-6 py-4 text-sm">
                            <span class="px-3 py-1 rounded-full text-white 
                                {{ $request->status === 'accepted' ? 'bg-green-500' : ($request->status === 'declined' ? 'bg-red-500' : 'bg-gray-500') }}">
                                {{ ucfirst($request->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <div class="flex space-x-2">
                                <form action="{{ route('admin.requests.updateStatus', ['request' => $request->id, 'status' => 'accepted']) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-4 rounded">Accept</button>
                                </form>
                                <form action="{{ route('admin.requests.updateStatus', ['request' => $request->id, 'status' => 'declined']) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-4 rounded">Decline</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
