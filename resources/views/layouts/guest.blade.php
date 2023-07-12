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

    <main
        class="fixed inset-0 flex min-h-screen items-center justify-center bg-gradient-to-br from-emerald-200 to-emerald-300">
        <x-Notification />
        @yield('content')
    </main>
</body>

</html>
