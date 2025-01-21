@extends('include.layout')


    <div class="container">
        <h1>Dodaj Nową Piosenkę</h1>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('songs.store') }}" method="POST">
            @csrf
            <div>
                <label for="Title">Tytuł:</label>
                <input type="text" name="Title" id="Title" value="{{ old('Title') }}">
            </div>

            <div>
                <label for="Author">ID Autora:</label>
                <input type="number" name="Author" id="Author" value="{{ old('Author') }}">
            </div>

            <div>
                <label for="Category">ID Kategorii:</label>
                <input type="number" name="Category" id="Category" value="{{ old('Category') }}">
            </div>

            <div>
                <label for="Likes">Polubienia:</label>
                <input type="number" name="Likes" id="Likes" value="{{ old('Likes') }}">
            </div>

            <button type="submit">Zapisz</button>
        </form>
    </div>

