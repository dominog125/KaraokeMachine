@extends('include/layout')
@section('title','Home 🐒')
@section('body')
    <x-navbar />
    <h1>WItaj NA STRONE HOME</h1>
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit">Wyloguj</button>
    </form>
@endsection


