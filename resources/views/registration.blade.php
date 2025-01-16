@extends('include/layout')
@section('title','registration')
@section('body')
    <div class="container" style="width: 500px">
        <form action="{{route('registration.post')}}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">User Name</label>
                <input type="text" class="form-control" name="name">

            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>
@endsection
