@extends('include.layout')


    <div class="container">
        <h1>Lista Piosenek</h1>

        @if(session('success'))
            <div style="color: green;">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('songs.create') }}">Dodaj nową piosenkę</a>

        <table border="1" cellpadding="10" style="margin-top:10px;">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tytuł</th>
                <th>Autor (ID)</th>
                <th>Kategoria (ID)</th>
                <th>Polubienia</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($songs as $song)
                <tr>
                    <td>{{ $song->ID }}</td>
                    <td><a href="{{ route('admin.songs.show', $song->ID) }}">{{ $song->Title }}</a></td>
                    <td>{{ $song->Author }}</td>
                    <td>{{ $song->Category }}</td>
                    <td>{{ $song->Likes }}</td>
                    <td>
                        <a href="{{ route('songs.edit', $song->ID) }}">Edytuj</a> |
                        <form action="{{ route('songs.destroy', $song->ID) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Usunąć piosenkę?')">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
<a href="{{ route('admin.dashboard') }}">Powrót do panelu zarządzania</a>


