<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>

    <!-- Подключение HTMX -->
    <script src="https://unpkg.com/htmx.org"></script>

</head>
<body>

<header>
    <!-- Здесь может быть ваша навигационная панель -->
</header>

<main>
    @yield('content')
</main>

<footer>
    <!-- Здесь может быть ваш футер -->
</footer>

<!-- Дополнительные скрипты -->
@yield('extra-js')

</body>
</html>
