<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Add your CSS and JavaScript links here -->
</head>
<body>
<header>
    <nav>
        @include('partials.nav')
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    <!-- Add your footer content here -->
</footer>

<!-- Add your JavaScript scripts here -->
</body>
</html>
