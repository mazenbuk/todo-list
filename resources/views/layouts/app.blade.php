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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito';
        }

        .nav-center {
            flex-grow: 1;
            justify-content: center;
        }

        .nav-link.active {
            font-weight: bold;
            color: blue !important;
        }

        .navbar-brand {
            white-space: nowrap;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="/" class="navbar-brand">Terang Bulan Sumbersari</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav nav-center">
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
                <a href="{{ route('todos.create', ['category' => request()->get('category', 'Work')]) }}" class="btn btn-primary ms-auto">Create Todo</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
