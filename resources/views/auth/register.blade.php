@extends('layouts.guest')

@section('content')

<h3 class="text-center mb-4">Register</h3>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>

    <div class="d-flex justify-content-between align-items-center">

        <a href="{{ route('login') }}">
            Already registered?
        </a>

        <button type="submit" class="btn btn-primary">
            Register
        </button>

    </div>

</form>

@endsection