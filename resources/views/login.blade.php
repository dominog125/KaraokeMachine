@extends('include/layout')
@section('title','login 🐒')
@section('body')
    <div class="container" style="width: 500px">

        <form action="{{route('login.post')}}" method="POST" class="ms-auto me-auto mt-3">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <div class="text-center mt-4">
            <p>Or log in with:</p>
            <a href="{{ route('login.facebook') }}" class="btn btn-primary w-100">
                <i class="fab fa-facebook"></i> Login with Facebook
            </a>
        </div>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

    </div>
@endsection
