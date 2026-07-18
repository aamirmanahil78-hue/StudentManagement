@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">

    <h2>Course List</h2>

    <a href="{{ route('courses.create') }}" class="btn btn-success">
        Add Course
    </a>

</div>

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<table class="table table-bordered table-hover shadow">

    <thead class="table-dark">

        <tr>

            <th>ID</th>
            <th>Course Name</th>
            <th width="220">Action</th>

        </tr>

    </thead>

    <tbody>

        @forelse($courses as $course)

        <tr>

            <td>{{ $course->id }}</td>

            <td>{{ $course->course_name }}</td>

            <td>

                <a href="{{ route('courses.edit',$course->id) }}"
                   class="btn btn-warning btn-sm">

                    Edit

                </a>

                <form action="{{ route('courses.destroy',$course->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm">

                        Delete

                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="3" class="text-center">

                No Courses Found

            </td>

        </tr>

        @endforelse

    </tbody>

</table>

@endsection