<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DeviceShop')</title>

    <!-- Подключение стилей -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 

    <!-- Подключение HTMX -->
    <script src="https://unpkg.com/htmx.org"></script>
</head>
<body>

@include('partials.header')

<main class="container">
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    @yield('content')
</main>

<footer>
    <div class="container">
        <p>&copy; DeviceShop</p>
    </div>
</footer>

<!-- Дополнительные скрипты -->
@yield('extra-js')

</body>
</html>
