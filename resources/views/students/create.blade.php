@extends('layouts.app')

@section('content')

<h2>Student Registration</h2>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<form action="/students" method="POST">

    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control">

        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control">

        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label>Department</label>
        <input type="text" name="department" class="form-control">

        @error('department')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label>Semester</label>
        <input type="number" name="semester" class="form-control">

        @error('semester')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button class="btn btn-success">
        Register Student
    </button>

</form>

@endsection