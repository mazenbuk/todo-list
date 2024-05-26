<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title')
    </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Nunito';
        }
        .navbar-nav {
            flex-direction: row;
        }
        .nav-item + .nav-item {
            margin-left: 1rem;
        }
        .nav-center {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        .navbar .container {
            position: relative;
        }
        .nav-link.active {
            font-weight: bold;
            color: blue !important;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a href="/"><span class="navbar-brand mb-0 h1">Terang Bulan Sumbersari</span></a>
            <div class="nav-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('todos.work') }}" class="nav-link {{ request()->get('category', 'Work') == 'Work' ? 'active' : '' }}">Work</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('todos.home') }}" class="nav-link {{ request()->get('category') == 'Home' ? 'active' : '' }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('todos.other') }}" class="nav-link {{ request()->get('category') == 'Other' ? 'active' : '' }}">Other</a>
                    </li>
                </ul>
            </div>
            <a href="{{ route('todos.create', ['category' => request()->get('category', 'Work')]) }}"><span class="btn btn-primary">Create Todo</span></a>
        </div>
    </nav>

    <div class="container">

        @yield('content')
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

    </div>

</body>

</html>
