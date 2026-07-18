@extends('layouts.app')

@section('content')

<h2>Edit Course</h2>

<form action="{{ route('courses.update',$course->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label>

            Course Name

        </label>

        <input type="text"
               name="course_name"
               value="{{ $course->course_name }}"
               class="form-control">

    </div>

    <button class="btn btn-success">

        Update

    </button>

    <a href="{{ route('courses.index') }}"
       class="btn btn-secondary">

        Back

    </a>

</form>

@endsection