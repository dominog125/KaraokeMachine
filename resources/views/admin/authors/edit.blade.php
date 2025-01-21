
@extends('include.layout')

    <div class="container">
        <h1>Edycja Autora</h1>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('authors.update', $author->ID) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="Author">Nazwa autora:</label>
                <input type="text" name="Author" id="Author" value="{{ old('Author', $author->Author) }}">
            </div>

            <button type="submit">Zapisz zmiany</button>
        </form>
        <a href="{{ route('authors.index') }}">Powrót do listy autorów</a>
    </div>
