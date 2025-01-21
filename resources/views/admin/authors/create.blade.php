

@section('body')
    <div class="container">
        <h1>Dodaj Autora</h1>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('authors.store') }}" method="POST">
            @csrf
            <div>
                <label for="Author">Nazwa autora:</label>
                <input type="text" name="Author" id="Author" value="{{ old('Author') }}">
            </div>

            <button type="submit">Zapisz</button>
        </form>
    </div>
@endsection
