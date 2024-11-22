<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    {{-- <!-- favicon --> --}}
    <link rel="shortcut icon" href="{{ asset('/images/favicon.png')}}" type="image/png">
    {{-- <!-- bootstrap --> --}}
    <link rel="stylesheet" href="{{ asset('/bootstrap/bootstrap.min.css') }}">
    {{-- <!-- main css --> --}}
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    @yield('css')
</head>

<body class="@yield('class-body')">
    {{-- <!-- logo --> --}}
    @include('Component.Logo')

    @yield('content')

    {{-- <!-- footer --> --}}
    @include('Component.Footer')

    {{-- <!-- bootstrap --> --}}
    <script src="assets/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>
