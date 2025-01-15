@extends('layout')
@section('title','Change Password')
@section('body')
    <div class="container mt-5">
        <h2 class="text-center">Set Your Password</h2>

        <form action="{{ route('set-password.post', $user->id) }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="password" class="form-label">New Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm New Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Set Password</button>
        </form>
    </div>
@endsection
