@extends('layout')
@section('title','registration 🐒')
@section('body')
    <div class="container" style="width: 500px">


        <form>
            <div class="mb-3">
                <label class="form-label">User Name</label>
                <input type="email" class="form-control" name="username">

            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

@endsection
