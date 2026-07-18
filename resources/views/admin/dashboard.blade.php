@extends('layouts.app')


@section('content')


<div class="container">


<h2>
Admin Dashboard
</h2>


<div class="row">


<div class="col-md-6">

<div class="card bg-primary text-white">

<div class="card-body">

<h4>Total Students</h4>

<h1>
{{ $students }}
</h1>


</div>

</div>

</div>




<div class="col-md-6">


<div class="card bg-success text-white">


<div class="card-body">

<h4>Total Courses</h4>

<h1>
{{ $courses }}
</h1>


</div>

</div>


</div>


</div>


</div>


@endsection