@extends('include.layout')
    <div class="container">
        <h1>Lista Autorów</h1>

        @if(session('success'))
            <div style="color: green;">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('authors.create') }}">Dodaj nowego autora</a>

        <table border="1" cellpadding="10" style="margin-top:10px;">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa autora</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($authors as $author)
                <tr>
                    <td>{{ $author->ID }}</td>
                    <td><a href="{{ route('authors.show', $author->ID) }}">{{ $author->Author }}</a></td>
                    <td>
                        <a href="{{ route('authors.edit', $author->ID) }}">Edytuj</a> |
                        <form action="{{ route('authors.destroy', $author->ID) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Usunąć autora?')">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('admin.dashboard') }}">Powrót do panelu zarządzania</a>

    </div>

