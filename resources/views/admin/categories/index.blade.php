@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista Kategorii</h1>

        @if(session('success'))
            <div style="color: green;">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('categories.create') }}">Dodaj nową kategorię</a>

        <table border="1" cellpadding="10" style="margin-top:10px;">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nazwa kategorii</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $cat)
                <tr>
                    <td>{{ $cat->ID }}</td>
                    <td><a href="{{ route('categories.show', $cat->ID) }}">{{ $cat->Category }}</a></td>
                    <td>
                        <a href="{{ route('categories.edit', $cat->ID) }}">Edytuj</a> |
                        <form action="{{ route('categories.destroy', $cat->ID) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Usunąć kategorię?')">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
