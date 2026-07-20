@extends('layouts.app')

@section('content')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

<h2>Student List</h2>

@if(Auth::check() && Auth::user()->role == 'admin')

<a href="{{ route('students.create') }}" class="btn btn-primary mb-3">
    Add Student
</a>

@endif

<!-- Search -->

<form action="{{ route('students.index') }}" method="GET" class="mb-3">

    <div class="input-group">

        <input type="text"
               name="search"
               value="{{ request('search') }}"
               class="form-control"
               placeholder="Search by Name, Email, Department">

        <button type="submit" class="btn btn-dark">
            Search
        </button>

    </div>

</form>

<table class="table table-bordered table-striped">

    <thead>

        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Semester</th>
            <th>Course</th>
            <th>File</th>
            <th>Action</th>
        </tr>

    </thead>

    <tbody>

    @forelse($students as $student)

    <tr>

        <td>{{ $student->id }}</td>

        <td>

            @if($student->image)

                <img src="{{ asset('storage/'.$student->image) }}"
                     width="70"
                     height="70"
                     class="rounded">

            @else

                No Image

            @endif

        </td>

        <td>{{ $student->name }}</td>

        <td>{{ $student->email }}</td>

        <td>{{ $student->department }}</td>

        <td>{{ $student->semester }}</td>

        <td>

            @if($student->course)

                {{ $student->course->course_name }}

            @else

                No Course

            @endif

        </td>

        <td>

            @if($student->file)

                <a href="{{ Storage::url($student->file) }}"
                   target="_blank"
                   class="btn btn-info btn-sm">
                    View File
                </a>

            @else

                No File

            @endif

        </td>

        <td>

            @if(Auth::check() && Auth::user()->role == 'admin')

                <a href="{{ route('students.edit', $student->id) }}"
                   class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ route('students.destroy', $student->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger btn-sm">
                        Delete
                    </button>

                </form>

            @else

                <span class="text-muted">
                    View Only
                </span>

            @endif

        </td>

    </tr>
    @empty

    <tr>

        <td colspan="9" class="text-center">
            No students found.
        </td>

    </tr>

    @endforelse







    </tbody>

</table>

<div class="mt-3">

    {{ $students->links() }}

</div>

@endsection