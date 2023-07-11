<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="shadow py-3">
        <ul class="mx-auto container">
            <a href="{{ route('dashboard') }}">سەرەکی</a>
        </ul>
    </nav>
    <main>
        @yield('content')
        <x-Notification />
    </main>
</body>

</html>
