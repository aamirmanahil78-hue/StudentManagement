@extends('layouts.app')

@section('content')

<h2>Edit Student</h2>

<form action="/students/{{ $student->id }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" value="{{ $student->name }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="{{ $student->email }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Department</label>
        <input type="text" name="department" value="{{ $student->department }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Semester</label>
        <input type="number" name="semester" value="{{ $student->semester }}" class="form-control">
    </div>

    <button class="btn btn-primary">
        Update Student
 </button>

    <a href="/students" class="btn btn-secondary">
        Back
    </a>

</form>

@endsection