<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}"
    class="media">

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

<body dir="rtl" class="overflow-hidden font-sans antialiased text-text-900">
    <div class="flex justify-center min-h-screen overflow-y-hidden bg-background-50">
        <div
            class="flex justify-center flex-1 max-w-screen-xl m-0 shadow-md bg-background-100 sm:m-5 sm:rounded-lg item-center md:m-7">
            <div class="flex-1 hidden text-center md:flex">
                <div class="w-full h-full bg-center bg-no-repeat bg-cover "
                    style="background-image: url('{{ asset('assets/images/backs/back (2).jpg') }}');">
                </div>
            </div>
            <div class="flex flex-col justify-center h-full p-6 lg:w-1/2 xl:w-5/12 sm:p-8 item-center ">
                <div class="flex justify-center mt-12 item-center">
                    <div>
                        <a href="/">
                            <x-application-logo class="w-20 h-20 fill-current text-text-500" />
                        </a>
                        <!-- resources/views/home.blade.php -->
                        <x-mode-toggle />

                    </div>
                    {{-- <img src="images/back (4).jpg" class="h-16 w-mx-auto" /> --}}
                </div>
                <div class="flex flex-col items-center mt-6">
                    <div class="flex-1 w-full mt-4 item-center">


                        <div class="">
                            {{ $slot }}

                        </div>
                        <div class="max-w-xs mx-auto">
                            <p class="mt-6 text-xs text-center text-gray-600">
                                أوافق على الالتزام بـ
                                <a href="#" class="border-b border-gray-500 border-dotted">
                                    شروط الاستخدام
                                </a>
                                الخاصة بـ  Dalelak وعلى
                                <a href="#" class="border-b border-gray-500 border-dotted">
                                    سياسة الخصوصية
                                </a>
                                الخاصة بها.
                            </p>
                        </div>

                    </div>
                </div>
            </div>

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
