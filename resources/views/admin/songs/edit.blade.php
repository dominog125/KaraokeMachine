@extends('include.layout')


    <div class="container">
        <h1>Edycja Piosenki</h1>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('songs.update', $song->ID) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="Title">Tytuł:</label>
                <input type="text" name="Title" id="Title" value="{{ old('Title', $song->Title) }}">
            </div>

            <div>
                <label for="Author">ID Autora:</label>
                <input type="number" name="Author" id="Author" value="{{ old('Author', $song->Author) }}">
            </div>

            <div>
                <label for="Category">ID Kategorii:</label>
                <input type="number" name="Category" id="Category" value="{{ old('Category', $song->Category) }}">
            </div>

            <div>
                <label for="Likes">Polubienia:</label>
                <input type="number" name="Likes" id="Likes" value="{{ old('Likes', $song->Likes) }}">
            </div>

            <div>
                <label for="Likes">Link do Youtube(Podaj Identyfikator filmu):</label>
                <input type="text" name="Ytlink" id="Ytlink" value="{{ old('Ytlink'), $song->Ytlink }}">
            </div>

            <button type="submit">Zapisz zmiany</button>
        </form>
    </div>

