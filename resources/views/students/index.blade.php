@extends('layouts.app')

@section('content')

<h2>Student List</h2>

<a href="/register" class="btn btn-primary mb-3">
    Add Student
</a>

<table class="table table-bordered table-striped">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Department</th>
        <th>Semester</th>
        <th>Action</th>
    </tr>

    @foreach($students as $student)

    <tr>

        <td>{{ $student->id }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->department }}</td>
        <td>{{ $student->semester }}</td>

        <td>

            <a href="/students/{{ $student->id }}/edit" class="btn btn-warning btn-sm">
                Edit
            </a>

            <form action="/students/{{ $student->id }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger btn-sm">
                    Delete
                </button>

            </form>

        </td>

    </tr>

    @endforeach

</table>

@endsection