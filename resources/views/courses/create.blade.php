@extends('layouts.app')

@section('content')

<h2>Add New Course</h2>

<form action="{{ route('courses.store') }}" method="POST">

    @csrf

    <div class="mb-3">

        <label class="form-label">

            Course Name

        </label>

        <input type="text"
               name="course_name"
               class="form-control"
               required>

    </div>

    <button class="btn btn-primary">

        Save Course

    </button>

    <a href="{{ route('courses.index') }}"
       class="btn btn-secondary">

        Back

    </a>

</form>

@endsection