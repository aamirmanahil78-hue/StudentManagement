@extends('layouts.app')

@section('content')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

<h2>Edit Student</h2>

<form action="{{ route('students.update', $student->id) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label>Name</label>

        <input type="text"
               name="name"
               value="{{ $student->name }}"
               class="form-control">

    </div>

    <div class="mb-3">

        <label>Email</label>

        <input type="email"
               name="email"
               value="{{ $student->email }}"
               class="form-control">

    </div>

    <div class="mb-3">

        <label>Department</label>

        <input type="text"
               name="department"
               value="{{ $student->department }}"
               class="form-control">

    </div>

    <div class="mb-3">

        <label>Semester</label>

        <input type="number"
               name="semester"
               value="{{ $student->semester }}"
               class="form-control">

    </div>

    <div class="mb-3">

    <label class="form-label">Select Courses</label>


    @foreach($courses as $course)

        <div class="form-check">

            <input 
                class="form-check-input"
                type="checkbox"
                name="courses[]"
                value="{{ $course->id }}"
                id="course{{ $course->id }}"

                {{ $student->courses->contains($course->id) ? 'checked' : '' }}
            >


            <label class="form-check-label" for="course{{ $course->id }}">

                {{ $course->course_name }}

            </label>


        </div>

    @endforeach


    @error('courses')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror


    @error('courses.*')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror


</div>
    <div class="mb-3">

        <label class="form-label">
            Student Image
        </label>

        @if($student->image)

            <div class="mb-2">
                <img src="{{ asset('storage/'.$student->image) }}"
                     width="100"
                     height="100"
                     class="rounded">
            </div>

        @endif

        <input type="file"
               name="image"
               class="form-control">

        @error('image')
            <small class="text-danger">
                {{ $message }}
            </small>
        @enderror

    </div>

    <div class="mb-3">

        <label class="form-label">
            Student File
        </label>

        @if($student->file)

            <div class="mb-2">
                <a href="{{ Storage::url($student->file) }}"
                   target="_blank"
                   class="btn btn-info btn-sm">
                    View Current File
                </a>
            </div>

        @endif

        <input type="file"
               name="file"
               class="form-control">

        @error('file')
            <small class="text-danger">
                {{ $message }}
            </small>
        @enderror

    </div>

    <button type="submit" class="btn btn-primary">

        Update Student

    </button>

    <a href="{{ route('students.index') }}"
       class="btn btn-secondary">

        Back

    </a>

</form>

@endsection