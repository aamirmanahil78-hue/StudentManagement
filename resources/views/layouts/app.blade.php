<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ config('app.name', 'Student Management') }}
    </title>


    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>


<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">


        <a class="navbar-brand" href="{{ route('dashboard') }}">
            Student Management
        </a>



        <div>


            @guest


                <a href="{{ route('login') }}" class="btn btn-light me-2">
                    Login
                </a>


                <a href="{{ route('register') }}" class="btn btn-success">
                    Register
                </a>


            @else


                <span class="text-white me-3">

                    {{ Auth::user()->name }}

                </span>



                <form action="{{ route('logout') }}" method="POST" style="display:inline;">

                    @csrf


                    <button class="btn btn-danger">

                        Logout

                    </button>


                </form>


            @endguest



        </div>



    </div>


</nav>




<div class="container mt-4">


    @yield('content')


</div>





<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>