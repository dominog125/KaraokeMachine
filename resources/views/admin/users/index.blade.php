@extends('include.layout')

@section('body')
    <div class="container">
        <h1>Lista Użytkowników</h1>

        @if(session('success'))
            <div style="color: green;">
                {{ session('success') }}
            </div>
        @endif

        <table border="1" cellpadding="10" style="margin-top:10px;">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa</th>
                <th>Email</th>
                <th>Status konta</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>

                    <td>{{ $user->name }}</td>

                    <td>{{ $user->email }}</td>

                    <td>
                        @if($user->is_banned)
                            <span style="color:red;">Zbanowany</span>
                        @else
                            Aktywny
                        @endif
                    </td>

                    <td>
                        {{-- Wyświetlamy przycisk „Zbanuj” tylko, jeśli użytkownik NIE jest zbanowany --}}
                        @if(! $user->is_banned and !$user->is_admin)
                            <form action="{{ route('admin.user.ban', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" onclick="return confirm('Czy na pewno zbanować użytkownika?')">
                                    Zbanuj
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('admin.dashboard') }}">Powrót do panelu zarządzania</a>

@endsection
