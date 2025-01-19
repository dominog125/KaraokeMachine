@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Szczegóły Piosenki</h1>

        <p><strong>ID:</strong> {{ $song->ID }}</p>
        <p><strong>Tytuł:</strong> {{ $song->Title }}</p>
        <p><strong>Autor (ID):</strong> {{ $song->Author }}</p>
        <p><strong>Kategoria (ID):</strong> {{ $song->Category }}</p>
        <p><strong>Polubienia:</strong> {{ $song->Likes }}</p>

        <a href="{{ route('songs.index') }}">Powrót do listy piosenek</a>
    </div>
@endsection
