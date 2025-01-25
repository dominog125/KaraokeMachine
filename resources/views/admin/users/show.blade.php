@extends('include.layout')
@section('body')
    <div class="container">
        <h1>Szczegóły Użytkownika</h1>

        <p><strong>ID:</strong> {{ $user->id }}</p>
        <p><strong>Nazwa:</strong> {{ $user->name }}</p>
        <p><strong>E-mail:</strong> {{ $user->email }}</p>
        <p><strong>Status konta:</strong>
            @if($user->is_banned)
                <span style="color:red;">Zbanowany</span>
            @else
                Aktywny
            @endif
        </p>

        <a href="{{ route('users.index') }}">Powrót do listy</a>
    </div>
@endsection
