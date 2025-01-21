@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dodaj Kategorię</h1>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div>
                <label for="Category">Nazwa kategorii:</label>
                <input type="text" name="Category" id="Category" value="{{ old('Category') }}">
            </div>

            <button type="submit">Zapisz</button>
        </form>
    </div>
@endsection
