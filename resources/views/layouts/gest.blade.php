<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}"  class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-text-900">
    <div class="flex flex-col items-center min-h-screen pt-6 sm:justify-center sm:pt-0 bg-background-50">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-text-500" />
            </a>
            <!-- resources/views/home.blade.php -->
            <x-mode-toggle />

        </div>

        <div class="w-full px-6 py-4 mt-6 overflow-hidden shadow-md sm:max-w-md bg-background-100 sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modeToggle = document.getElementById('modeToggle');
            const modeText = document.getElementById('modeText');
            const html = document.documentElement;

            // Initialize mode from local storage
            const storedMode = localStorage.getItem('darkMode');
            const isDarkMode = storedMode ? JSON.parse(storedMode) : false;

            if (isDarkMode) {
                html.classList.add('dark');
                modeText.textContent = 'Light Mode';
            }

            modeToggle.addEventListener('click', function () {
                const isDark = html.classList.toggle('dark');
                modeText.textContent = isDark ? 'Light Mode' : 'Dark Mode';
                localStorage.setItem('darkMode', isDark);
            });
        });
    </script>
</body>

</html>
