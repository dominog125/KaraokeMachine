@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edycja Kategorii</h1>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.update', $category->ID) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="Category">Nazwa kategorii:</label>
                <input type="text" name="Category" id="Category" value="{{ old('Category', $category->Category) }}">
            </div>

            <button type="submit">Zapisz zmiany</button>
        </form>
    </div>
@endsection
