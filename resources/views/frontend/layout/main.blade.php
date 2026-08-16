<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title', 'Roshan — Laravel Developer')
    </title>

    <meta
        name="description"
        content="@yield('description', 'Personal portfolio of Roshan, a Laravel developer building modern web applications and APIs.')"
    >

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="antialiased bg-white text-neutral-950">

    @include('frontend.partials.header')

    <main>
        @yield('content')
    </main>

    @include('frontend.partials.footer')

    @stack('scripts')

</body>

</html>
