@extends('include.layout')
{{-- Uwaga: zwykle zapisujemy „kropką” (@extends('include.layout')),
     ale slash też może zadziałać --}}

@section('body')
    <div class="container">
        <h1>Panel Administratora</h1>
        <p>Witaj w panelu admina! Tutaj możesz zarządzać użytkownikami, piosenkami, kategoriami, autorami itp.</p>

        <ul>
            <li><a href="{{ route('users.index') }}">Zarządzaj użytkownikami</a></li>
            <li><a href="{{ route('songs.index') }}">Zarządzaj piosenkami</a></li>
            <li><a href="{{ route('categories.index') }}">Zarządzaj kategoriami</a></li>
            <li><a href="{{ route('authors.index') }}">Zarządzaj autorami</a></li>
        </ul>
    </div>
@endsection
