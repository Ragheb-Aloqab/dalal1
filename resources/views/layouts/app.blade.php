<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl" class="media">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <livewire:styles />
    <!-- Scripts -->
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/css/icons.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: "Cairo", sans-serif;
            font-optical-sizing: auto;
            font-weight: bold;
            font-style: normal;
            font-variation-settings: "slnt" 0;
        }

        .rating label {
            color: #d1d5db; /* Default gray color for stars */
        }

        .rating label.rated {
            color: #f59e0b; /* Gold color for rated stars */
        }
    </style>
</head>

<body class="font-sans antialiased bg-background-50 text-text-500">
    @livewire('chatbot')

    <div class="flex flex-col min-h-screen bg-background-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <div class="relative h-[40vh]"
                style="background-image: url('{{ asset('assets/images/backgrounds/profilebg.jpg') }}')">
                <div class="relative h-full overflow-hidden">
                    <div class="absolute inset-0 flex items-center justify-center text-white">
                        <div id="slider" class="relative w-full h-full">
                            <div id="slideContainer"
                                class="absolute inset-0 transition-all duration-700 ease-in-out bg-center bg-cover opacity-70">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-0">
                    <div class="h-full">
                        <div class="flex h-full max-w-screen-xl p-4 mx-auto">

                            <!-- Breadcrumb -->
                            <ol class="absolute inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                                <li class="inline-flex items-center">
                                    <a href="#"
                                        class="inline-flex items-center text-sm font-medium text-text-700 hover:text-primary-600 dark:text-gray-400 dark:hover:text-white">
                                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                        </svg>
                                        الرئيسية
                                    </a>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <svg class="block w-3 h-3 mx-1 text-gray-400 rtl:rotate-180 " aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                        <a href="#"
                                            class="text-sm font-medium text-text-700 ms-1 hover:text-primary-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Templates</a>
                                    </div>
                                </li>
                                <li aria-current="page">
                                    <div class="flex items-center">
                                        <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                        <span
                                            class="text-sm font-medium text-text-500 ms-1 md:ms-2 dark:text-gray-400">Flowbite</span>
                                    </div>
                                </li>
                            </ol>

                            <div class="flex items-center">
                                <div class="px-2">
                                    {{ $header }}
                                </div>
                                <div class="">
                                    <p class="text-lg font-semibold"></p>
                                    <p class="p-1 text-black bg-gray-200 rounded-md "></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endisset

        <!-- Page Content -->
        <main class="flex-grow">
            {{ $slot }}
        </main>

        <footer class="bg-white dark:bg-gray-900">
            <div class="w-full max-w-screen-xl p-4 py-6 mx-auto lg:py-8">
                <div class="md:flex md:justify-between">
                    <div class="mb-6 md:mb-0">
                        <a href="{{ route('/') }}" class="flex items-center">
                            <x-application-logo class="block w-auto fill-current h-9 text-text-800 me-3" />
                            <span class="self-center mx-2 text-2xl font-semibold whitespace-nowrap dark:text-white">
                                {{ config('app.name', 'Laravel') }}
                            </span>
                        </a>
                    </div>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5">
                        <!-- العنصر الأول -->
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">الروابط السريعة</h2>
                            <ul class="font-medium text-gray-500 dark:text-gray-400">
                                <li class="mb-4">
                                    <a href="" class="hover:underline">اتصل بنا</a>
                                </li>
                                <li>
                                    <a href="" class="hover:underline">فريق الدعم</a>
                                </li>
                            </ul>
                        </div>

                        <!-- العنصر الثاني -->
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">الموارد</h2>
                            <ul class="font-medium text-gray-500 dark:text-gray-400">
                                <li class="mb-4">
                                    <a href="" class="hover:underline">الاسئلة الشايعة</a>
                                </li>
                                <li>
                                    <a href="" class="hover:underline">المساعدة </a>
                                </li>
                            </ul>
                        </div>

                        <!-- العنصر الثالث -->
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">الموارد</h2>
                            <ul class="font-medium text-gray-500 dark:text-gray-400">
                                <li class="mb-4">
                                    <a href="https://flowbite.com/" class="hover:underline">نبذة عنا</a>
                                </li>
                                <li>
                                    <a href="https://tailwindcss.com/" class="hover:underline">Tailwind CSS</a>
                                </li>
                            </ul>
                        </div>

                        <!-- العنصر الرابع -->
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">تابعنا</h2>
                            <ul class="font-medium text-gray-500 dark:text-gray-400">
                                <li class="mb-4">
                                    <a href="https://github.com/themesberg/flowbite" class="hover:underline">Github</a>
                                </li>
                                <li>
                                    <a href="https://discord.gg/4eeurUVvTy" class="hover:underline">Discord</a>
                                </li>
                            </ul>
                        </div>

                        <!-- العنصر الخامس -->
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">قانوني</h2>
                            <ul class="font-medium text-gray-500 dark:text-gray-400">
                                <li class="mb-4">
                                    <a href="#" class="hover:underline">سياسة الخصوصية</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:underline">الشروط والأحكام</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                <div class="sm:flex sm:items-center sm:justify-between">
                    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024
                        <a href="https://flowbite.com/" class="hover:underline">لدي دليلك للتطوير العقاري ™</a>. جميع
                        الحقوق محفوظة.
                    </span>
                    <div class="flex mt-4 sm:justify-center sm:mt-0">
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 8 19">
                                <path fill-rule="evenodd"
                                    d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">صفحة الفيسبوك</span>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 21 16">
                                <path
                                    d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">مجتمع ديسكورد</span>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 17">
                                <path fill-rule="evenodd"
                                    d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">صفحة تويتر</span>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 .222a9.778 9.778 0 1 0 0 19.556A9.778 9.778 0 0 0 10 .222Zm0 3.667a1.833 1.833 0 1 1 0 3.666 1.833 1.833 0 0 1 0-3.666Zm0 13.445a7.444 7.444 0 0 1-5.708-2.634 6.196 6.196 0 0 1 5.708-3.111 6.196 6.196 0 0 1 5.708 3.11 7.444 7.444 0 0 1-5.708 2.635Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">حساب انستغرام</span>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M17.049 0H2.951C1.325 0 0 1.325 0 2.951v14.098C0 18.675 1.325 20 2.951 20h14.098C18.675 20 20 18.675 20 17.049V2.951C20 1.325 18.675 0 17.049 0ZM6.512 16.615H3.72V7.615h2.793v9Zm-1.398-9.836a1.621 1.621 0 1 1 0-3.243 1.621 1.621 0 0 1 0 3.243Zm11.064 9.836h-2.793v-4.358c0-1.04-.02-2.377-1.448-2.377-1.448 0-1.67 1.132-1.67 2.302v4.433H7.564V7.615h2.68v1.233h.038a2.937 2.937 0 0 1 2.641-1.448c2.824 0 3.346 1.86 3.346 4.28v4.936Z" />
                            </svg>
                            <span class="sr-only">حساب لينكد إن</span>
                        </a>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    @livewireScripts
    <script>
        // Your JavaScript here
    </script>
</body>

</html>
