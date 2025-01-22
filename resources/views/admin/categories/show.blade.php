@extends('include.layout')

    <div class="container">
        <h1>Szczegóły Kategorii</h1>

        <p><strong>ID:</strong> {{ $category->ID }}</p>
        <p><strong>Nazwa:</strong> {{ $category->Category }}</p>

        <a href="{{ route('categories.index') }}">Powrót do listy kategorii</a>
    </div>

