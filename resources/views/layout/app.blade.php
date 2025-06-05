<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @stack('styles')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <head>
        @yield('navbar')
    </head>

    <main>
        @yield('content')
    </main>

    <footer>
        @yield('footer')
    </footer>

    <script>
      feather.replace();
    </script>
</body>
</html>