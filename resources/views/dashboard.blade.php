@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col-12 mb-4">

        <div class="card shadow border-0">

            <div class="card-body">

                @if(Auth::check() && Auth::user()->role == 'admin')

                    <h2 class="fw-bold">
                        👨‍💼 Admin Dashboard
                    </h2>

                @else

                    <h2 class="fw-bold">
                        🎓 Student Management Dashboard
                    </h2>

                @endif

                <p class="text-muted">

                    Welcome back,

                    <strong>{{ Auth::user()?->name ?? 'Guest' }}</strong>

                    👋

                </p>

            </div>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-md-6 mb-4">

        <div class="card bg-primary text-white shadow border-0">

            <div class="card-body">

                <h5>Total Students</h5>

                <h1>{{ $students }}</h1>

            </div>

        </div>

    </div>

    <div class="col-md-6 mb-4">

        <div class="card bg-success text-white shadow border-0">

            <div class="card-body">

                <h5>Total Courses</h5>

                <h1>{{ $courses }}</h1>

            </div>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-md-6 mb-3">

        <div class="card shadow">

            <div class="card-body text-center">

                <h4>Students</h4>

                <p>Manage all students in the system.</p>

                <a href="{{ route('students.index') }}" class="btn btn-primary">
                    Manage Students
                </a>

            </div>

        </div>

    </div>

    <div class="col-md-6 mb-3">

        <div class="card shadow">

            <div class="card-body text-center">

                <h4>Courses</h4>

                <p>Manage all available courses.</p>

                <a href="{{ route('courses.index') }}" class="btn btn-success">
                    Manage Courses
                </a>

            </div>

        </div>

    </div>

</div>

@endsection