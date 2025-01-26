@extends('include.layoutAdminPanel')
@section('title', 'Manage Requests')
@section('content')
    <div class="bg-white dark:bg-gray-800 p-6 shadow-md rounded-md"">

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full border-separate border-spacing-0 table-auto">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700">
                        <th class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">ID</th>
                        <th class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">User</th>
                        <th class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">Song ID</th>
                        <th class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">Time</th>
                        <th class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">Lyrics</th>
                        <th class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">Old Time</th>
                        <th class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">Old Lyrics</th>
                        <th class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">Status</th>
                        <th class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($requests as $request)
                        <tr>
                            <td class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">{{ $request->ID }}</td>
                            <td class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">{{ $request->user->name ?? 'N/A' }}</td>
                            <td class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">{{ $request->IDSong }}</td>
                            <td class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">{{ $request->TimePr }}</td>
                            <td class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">{{ $request->RowPr }}</td>
                            <td class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">{{ $request->TimePrOld }}</td>
                            <td class="p-4 text-left font-medium text-gray-700 dark:text-gray-300">{{ $request->RowPrOld }}</td>
                            <td class="px-6 py-4 text-sm">
                                <span class="px-3 py-1 rounded-full text-white
                                    {{ $request->status === 'accepted' ? 'bg-green-500' : ($request->status === 'declined' ? 'bg-red-500' : 'bg-gray-500') }}">
                                    {{ ucfirst($request->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex space-x-2">
                                    <form action="{{ route('admin.requests.updateStatus', [$request, 'accepted']) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-4 rounded">Accept</button>
                                    </form>
                                    <form action="{{ route('admin.requests.updateStatus', [$request, 'accepted']) }}" method="POST">
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
