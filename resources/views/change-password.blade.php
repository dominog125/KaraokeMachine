@extends('include/layout')

@section('body')
    <h1>Zmiana hasła</h1>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('change-password') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="password">Nowe hasło</label>
            <input type="password" name="password" id="password" class="form-control">
            @error('password')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation">Potwierdź nowe hasło</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Zmień hasło</button>
    </form>
@endsection
