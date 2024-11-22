<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle ?? config('app.name') }}</title>
    <!-- favicon -->
    <link rel="icon" href="{{ asset('/images/favicon.png') }}" type="image/png">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('/bootstrap/bootstrap.min.css') }}">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
</head>
<body>
    <x-layout.main_logo/>

    {{ $slot }}

    <x-layout.main_footer/>

    <!-- bootstrap -->
    <script src="{{ asset('/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
