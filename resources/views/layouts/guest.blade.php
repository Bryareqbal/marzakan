<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <main
        class="min-h-screen fixed bg-gradient-to-br from-emerald-200 to-emerald-300 inset-0 flex items-center justify-center">
        @yield('content')
    </main>
</body>

</html>
