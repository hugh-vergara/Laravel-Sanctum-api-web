

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
{{--        @auth--}}
{{--            <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>--}}
{{--            <form class="ml-auto" action="{{ route('logout') }}" method="POST">--}}
{{--                @csrf--}}
{{--                <button type="submit" class="btn btn-link">Logout</button>--}}
{{--            </form>--}}
{{--        @else--}}
{{--            <a class="navbar-brand" href="{{ route('login') }}">Login</a>--}}
{{--            <a class="navbar-brand" href="{{ route('register') }}">Register</a>--}}
{{--        @endauth--}}
    </div>
</nav>
<main class="py-4">
    <div class="container">
        @yield('content')
    </div>
</main>
</body>
</html>
