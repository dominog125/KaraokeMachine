@extends('include.layout')


    <div class="container">
        <h1>Szczegóły Autora</h1>

        <p><strong>ID:</strong> {{ $author->ID }}</p>
        <p><strong>Nazwa:</strong> {{ $author->Author }}</p>

        <a href="{{ route('authors.index') }}">Powrót do listy autorów</a>
    </div>

