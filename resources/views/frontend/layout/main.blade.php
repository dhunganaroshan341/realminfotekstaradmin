<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="scroll-smooth"
>
<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>
        @yield('title', 'Roshan — Laravel Developer')
    </title>

    <meta
        name="description"
        content="@yield(
            'description',
            'Personal portfolio of Roshan, a Laravel developer building modern web applications and APIs.'
        )"
    >

    {{-- Prevent light/dark theme flash --}}
    <script>
        (() => {
            const savedTheme = localStorage.getItem('theme');

            const systemDark = window.matchMedia(
                '(prefers-color-scheme: dark)'
            ).matches;

            const theme = savedTheme ?? (
                systemDark ? 'dark' : 'light'
            );

            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    @stack('styles')

</head>


<body
    class="antialiased transition-colors duration-300 bg-white  text-neutral-950 dark:bg-neutral-950 dark:text-neutral-50"
>

    @include('frontend.partials.header')

    <main>
        @yield('content')
    </main>

    @include('frontend.partials.footer')

    @stack('scripts')

</body>

</html>
