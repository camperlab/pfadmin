<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body class="font-sans antialiased bg-light">

<nav class="navbar navbar-expand-md border-bottom mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admins') }}">Admins</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('domains') }}">Domains</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('virtual.index') }}">Virtual List</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Fetch
                        Mail</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('fetchmail.index') }}">Fetch Mail</a></li>
                        <li><a class="dropdown-item" href="{{ route('fetchmail.create') }}">New Entry</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Send
                        Mail</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('sendmail') }}">Send Mail</a></li>
                        <li><a class="dropdown-item" href="{{ route('broadcast') }}">Broadcast</a></li>
                    </ul>
                </li>
            </ul>
            <div class="d-flex">
                <a class="btn btn-outline-secondary me-2" href="{{ route('view-log') }}">View Log</a>
                <a class="btn btn-outline-secondary me-2" href="{{ route('change-password') }}">Password</a>
                <form action="{{ route('logout') }}" method="post"> @csrf
                    <button class="btn btn-outline-primary" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<!-- Page Content -->
<main class="container my-5">

</main>
@stack('scripts')

@vite(['resources/js/app.js'])
</body>
</html>
