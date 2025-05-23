<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-color-theme="Blue_Theme" dir="rtl"
    class="media light selected" data-layout="vertical" data-boxed-layout="boxed" data-card="shadow">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
    {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    <!-- Favicon icon-->
    {{-- <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" /> --}}

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css"> --}}
    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}" />

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="{{ asset('assets/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    @vite(['resources/js/app.js', 'resources/css/icons.css'])
    {{-- <link href="https://fonts.googleapis.com/css?family=Noto+Kufi+Arabic&display=swap" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Noto Kufi Arabic', sans-serif;
        }
    </style>
    <livewire:styles />
</head>

<body class="bg-white DEFAULT_THEME dark:bg-dark" dir="rtl">
    <x-admin.toast />
    <main>
        <!--start the project-->
        <div id="main-wrapper" class="flex">

            <aside id="application-sidebar-brand"
                class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full xl:rtl:-translate-x-0 rtl:translate-x-full  left-0 rtl:left-auto rtl:right-0 transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed top-0 with-vertical  left-sidebar transition-all duration-300 h-screen xl:z-[2] z-[60] flex-shrink-0 border-r rtl:border-l rtl:border-r-0 w-[270px] border-border dark:border-darkborder bg-white dark:bg-dark">
                <!-- ---------------------------------- -->
                <!-- Start Vertical Layout Sidebar -->
                <!-- ---------------------------------- -->
                {{-- <x-admin.aside.logo /> --}}


                <x-admin.aside.slide-bar>
                    <x-admin.aside.slider-caption>
                        الرئيسية
                    </x-admin.aside.slider-caption>
                    <x-admin.aside.slider-item href="{{ route('provider.dashboard.index') }}"
                        activeRoute="provider.index.*">
                        <i class="flex-shrink-0 text-xl ti ti-solid ti-home text-info"></i>
                        <span class="flex-shrink-0 hide-menu">
                            الرئيسية
                        </span>
                    </x-admin.aside.slider-item>

                    <x-admin.aside.slider-item href="{{ route('provider.advertisements.index') }}"
                        activeRoute="provider.advertisements.*">
                        <i class="flex-shrink-0 text-xl ti ti-speakerphone text-success"></i>
                        <span class="flex-shrink-0 hide-menu">
                            الاعلانات
                        </span>
                    </x-admin.aside.slider-item>

                    <x-admin.aside.slider-item href="{{ route('provider.apartments.index') }}"
                        activeRoute="provider.apartments.*">
                        <i class="flex-shrink-0 text-xl ti ti-building-skyscraper text-warning"></i>
                        <span class="flex-shrink-0 hide-menu">
                            صفحة الشقق
                        </span>
                    </x-admin.aside.slider-item>
                    <x-admin.aside.slider-item href="{{ route('provider.buildings.index') }}"
                        activeRoute="provider.buildings.*">
                        <i class="flex-shrink-0 text-xl ti ti-building text-info"></i>
                        <span class="flex-shrink-0 hide-menu">
                            صفحة المباني
                        </span>
                    </x-admin.aside.slider-item>
                    <x-admin.aside.slider-item href="{{ route('provider.lands.index') }}"
                        activeRoute="provider.lands.*">
                        <i class="flex-shrink-0 text-xl ti ti-map-pin text-primary"></i>
                        <span class="flex-shrink-0 hide-menu">
                            صفحة الاراضي
                        </span>
                    </x-admin.aside.slider-item>
                    <x-admin.aside.slider-item href="{{ route('provider.notifications.index') }}"
                        activeRoute="provider.notifications.*">
                        <i class="flex-shrink-0 text-xl ti ti-solid ti-home"></i>
                        <span class="flex-shrink-0 hide-menu">
                            صفحة الاشعارات
                        </span>
                    </x-admin.aside.slider-item>
                    <x-admin.aside.slider-item href="{{ route('provider.requests.index') }}"
                        activeRoute="provider.requests.*">
                        <i class="flex-shrink-0 text-xl ti ti-solid ti-home"></i>
                        <span class="flex-shrink-0 hide-menu">
                            صفحة الطلبات
                        </span>
                    </x-admin.aside.slider-item>
                    <x-admin.aside.slider-item href="{{ route('provider.my-profile.index') }}"
                        activeRoute="provider.my-profile.*">
                        <i class="flex-shrink-0 text-xl ti ti-solid ti-home"></i>
                        <span class="flex-shrink-0 hide-menu">
                            صفحة الحساب
                        </span>
                    </x-admin.aside.slider-item>
                    <x-admin.aside.slider-item href="{{ route('provider.chats.index') }}"
                        activeRoute="provider.chats.*">
                        <i class="flex-shrink-0 text-xl ti ti-solid ti-home"></i>
                        <span class="flex-shrink-0 hide-menu">
                            المحادثات
                        </span>
                    </x-admin.aside.slider-item>
                    <x-admin.aside.slider-item href="{{ route('provider.my-profile.index') }}"
                        activeRoute="provider.my-profile.*">
                        <i class="flex-shrink-0 text-xl ti ti-solid ti-home"></i>
                        <span class="flex-shrink-0 hide-menu">
                            صفحة الحساب
                        </span>
                    </x-admin.aside.slider-item>
                </x-admin.aside.slide-bar>

                <x-admin.aside.profile />
            </aside>
            <div class="w-full page-wrapper" role="main">
                @include('provider.layouts.navigation')

                <!-- Main Content -->
                <div class="max-w-full pt-6 ">
                    <div class="container py-5 full-container">
                        <!-- Page Heading -->
                        <!----Breadcrumb Start---->
                        @isset($header)
                            <div
                                class="mb-6 overflow-hidden shadow-none card bg-lightinfo dark:bg-darkinfo dark:shadow-none position-relative">
                                <div class="py-5 card-body md:py-3">
                                    <div class="flex grid items-center grid-cols-12 gap-6">
                                        <div class="col-span-9">
                                            {{ $header }}
                                        </div>
                                        <div class="col-span-3 -mb-10">
                                            <div class="flex justify-center">
                                                <img src="{{ asset('assets/images/breadcrumb/ChatBc.png') }}"
                                                    alt="" class="w-full h-full -mb-4 md:-mb-7" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endisset
                        <!----Breadcrumb End---->
                        <main>
                            {{ $slot }}
                        </main>
                    </div>
                </div>
                <!-- Main Content End -->
            </div>
        </div>
        <!--end of project-->
    </main>
    <!-- Menu Canvas-->
    <x-admin.menu-canva />
    <x-admin.setting-button />

    <script>
        function handleColorTheme(e) {
            document.documentElement.setAttribute("data-color-theme", e);
        }
    </script>
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme/app.rtl.init.js') }}"></script>
    <script src="{{ asset('assets/js/theme/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script src="{{ asset('assets/js/app/productDetail.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/preline/dist/preline.js') }}"></script>
    <script src="{{ asset('assets/libs/@preline/input-number/index.js') }}"></script>
    <script src="{{ asset('assets/libs/@preline/tooltip/index.js') }}"></script>
    <script src="{{ asset('assets/libs/@preline/stepper/index.js') }}"></script>
    <script src="{{ asset('assets/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboards/dashboard.js') }}"></script>
    <livewire:scripts />
</body>

</html>
