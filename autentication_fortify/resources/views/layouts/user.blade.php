<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            @dd("teste")
        @endif
        @yield('styles')
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50 h-full">
        @include('layouts.components.user.navbar')
        <div className="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            @yield('content')
        </div>
    </body>

    @yield('scripts')
</html>
