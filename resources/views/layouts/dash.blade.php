<!doctype html>
<html lang="en" class="font-inter" data-theme="{{ Session::get('theme', 'light') }}">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/unoui.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UnoLara || Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600" rel="stylesheet" />
    <!-- Immediate theme application script -->
    <script>
        // Apply theme immediately to prevent flash
        (function() {
            const sessionTheme = document.documentElement.dataset.theme;
            const localTheme = localStorage.getItem('theme');
            const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            
            let isDark = false;
            if (sessionTheme) {
                isDark = sessionTheme === 'dark';
            } else if (localTheme) {
                isDark = localTheme === 'dark';
            } else {
                isDark = systemPrefersDark;
            }
            
            document.documentElement.classList.toggle('dark', isDark);
        })();
    </script>
    @livewireStyles
    @livewireScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen overflow-hidden overflow-y-auto bg-bg antialiased" x-data x-cloak>
    <x-organisms.dash.sidebar />
    <div class="lg-pl-18rem">
        {{ $slot }}
    </div>
</body>
</html>
