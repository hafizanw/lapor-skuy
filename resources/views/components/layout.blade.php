<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lapor Skuy</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    {{-- Memanggil component navbar --}}
    <x-navbar></x-navbar>

    {{-- Akan mengisi slot jika memanggil compomnen ini --}}
    {{ $slot }} 

    {{-- Memanggil component footer --}}
    <x-footer></x-footer>

    <script>
        feather.replace();
    </script>
</body>

</html>
