<!doctype html>
<html lang="en" class="font-inter" data-theme="{{ Session::get('theme', 'light') }}">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Auth</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600" rel="stylesheet" />
    @livewireStyles
    @livewireScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Add CSRF token meta tag --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="min-h-screen bg-bg antialiased" x-data x-cloak>
    <x-auth.card>
        {{ $slot }}
    </x-auth.card>
</body>

</html>
