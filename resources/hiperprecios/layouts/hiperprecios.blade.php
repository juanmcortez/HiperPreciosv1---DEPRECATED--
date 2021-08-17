<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title / Description -->
    <title>
        {{ isset($title) ? $title . ' - ' . config('app.name') . ' ' . config('app.version') : config('app.name') . ' ' . config('app.version') }}
    </title>
    <meta name="description" content="{{ isset($description) ? $description : '' }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/hiperprecios.css') }}" rel="stylesheet" />
    <link href="{{ mix('css/theme.css') }}" rel="stylesheet" />
    <link href="{{ mix('css/theme_print.css') }}" rel="stylesheet" media="print" />

    @stack('styles')

</head>

<body class="overflow-x-hidden text-xs antialiased lg:text-sm xl:text-base text-dark-700">

    <main class="flex flex-col items-center justify-center w-full min-h-screen md:flex-row flex-nowrap">
        {{ $slot }}
    </main>

    <!-- Scripts -->
    <script src=" {{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/hiperprecios.js') }}" defer></script>

</body>

</html>
