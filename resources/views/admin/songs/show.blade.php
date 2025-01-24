@extends('include.layoutAdminPanel')
@section('title', 'Song List')
@section('content')

    <div class="container">
        <a href="{{ route('songs.index') }}">Powrót do listy piosenek</a>
        <br>

        <h1>Szczegóły Piosenki</h1>

        <p><strong>ID:</strong> {{ $song->ID }}</p>
        <p><strong>Tytuł:</strong> {{ $song->Title }}</p>
        <p><strong>Autor (ID):</strong> {{ $song->Author }}</p>
        <p><strong>Kategoria (ID):</strong> {{ $song->Category}}</p>
        <p><strong>Polubienia:</strong> {{ $song->Likes }}</p>
        <h3>Dodaj nowy wiersz tekstu</h3>
        <form method="POST" action="{{ route('lyrics.storeFromShow') }}">
            @csrf
            <input type="hidden" name="IDSong" value="{{ $song->ID }}">
            <div>
                <label>Tekst:</label>
                <input type="text" name="RowTe" required>
            </div>
            <div>
                <label>Czas:</label>
                <input type="text" name="TimeTe" required>
            </div>
            <button type="submit">Dodaj</button>
        </form>

        <table border="1" cellpadding="10" style="margin-top:10px;">
            <thead>
            <tr>
                <th>ID</th>
                <th>IDSong</th>
                <th>Tekst</th>
                <th>Czas</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($lyrics as $lyric)
                <tr>
                    <td>{{ $lyric->ID }}</td>
                    <td>{{ $lyric->IDSong }}</td>
                    <td>
                        <form method="POST" action="{{ route('lyrics.updateFromShow', $lyric->ID) }}">
                            @csrf
                            @method('PUT')
                            <input type="text" name="RowTe" value="{{ $lyric->RowTe }}" required>
                            <input type="text" name="TimeTe" value="{{ $lyric->TimeTe }}" required>
                            <button type="submit">Zapisz</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('lyrics.destroyFromShow', $lyric->ID) }}" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


    </div>
