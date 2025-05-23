<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl" data-color-theme="Blue_Theme"
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
                    <x-admin.aside.slider-item href="{{ route('admin.dashboard.index') }}"
                        activeRoute="admin.dashboard.*">
                        <i class="flex-shrink-0 text-xl ti ti-solid ti-home"></i>
                        <span class="flex-shrink-0 hide-menu">
                            الرئيسية
                        </span>
                    </x-admin.aside.slider-item>

                    <x-admin.aside.slider-item href="{{ route('admin.admins.index') }}" activeRoute="admin.admins.*">
                        <i class="flex-shrink-0 text-xl ti ti-shield"></i>
                        <span class="flex-shrink-0 hide-menu">
                            صفحة الادارة
                        </span>
                    </x-admin.aside.slider-item>

                    <x-admin.aside.slider-item href="{{ route('admin.users.index') }}" activeRoute="admin.users.*">
                        <i class="flex-shrink-0 text-xl ti ti-user"></i>
                        <span class="flex-shrink-0 hide-menu">
                            صفحة المستخدمين
                        </span>
                    </x-admin.aside.slider-item>

                    <x-admin.aside.slider-item href="{{ route('admin.providers.index') }}"
                        activeRoute="admin.providers.*">
                        <i class="flex-shrink-0 text-xl ti ti-solid ti-folder"></i>
                        <span class="flex-shrink-0 hide-menu">
                            صفحة المزودين
                        </span>
                    </x-admin.aside.slider-item>

                    <x-admin.aside.slider-item href="{{ route('admin.clients.index') }}" activeRoute="admin.clients.*">
                        <i class="flex-shrink-0 text-xl ti ti-users"></i>
                        <span class="flex-shrink-0 hide-menu">
                            صفحة العملاء
                        </span>
                    </x-admin.aside.slider-item>

                    <x-admin.aside.slider-item href="{{ route('admin.conversations.index') }}"
                        activeRoute="admin.conversations.*">
                        <i class="flex-shrink-0 text-xl ti ti-message-circle"></i>
                        <span class="flex-shrink-0 hide-menu">
                            صفحة المحادثات
                        </span>
                    </x-admin.aside.slider-item>



                    <x-admin.aside.slider-item href="{{ route('admin.requests.index') }}"
                        activeRoute="admin.requests.*">
                        <i class="flex-shrink-0 text-xl ti ti-solid ti-list"></i>
                        <span class="flex-shrink-0 hide-menu">
                            الطلبات
                        </span>
                    </x-admin.aside.slider-item>

                    <x-admin.aside.slider-item href="{{ route('admin.responses.index') }}"
                        activeRoute="admin.responses.*">
                        <i class="flex-shrink-0 text-xl ti ti-bubble"></i>
                        <span class="flex-shrink-0 hide-menu">
                            صفحة الردود
                        </span>
                    </x-admin.aside.slider-item>


                    <x-admin.aside.slider-item href="{{ route('admin.contacts.index') }}"
                        activeRoute="admin.contacts.*">
                        <i class="flex-shrink-0 text-xl ti ti-phone"></i>
                        <span class="flex-shrink-0 hide-menu">
                            صفحة الاتصالات
                        </span>
                    </x-admin.aside.slider-item>

                    <x-admin.aside.slider-item href="{{ route('admin.comments.index') }}"
                        activeRoute="admin.comments.*">
                        <i class="flex-shrink-0 text-xl ti ti-message"></i>
                        <span class="flex-shrink-0 hide-menu">
                            صفحة التعليقات
                        </span>
                    </x-admin.aside.slider-item>


                    <x-admin.aside.slider-item href="{{ route('admin.real-estates.index') }}"
                        activeRoute="admin.real-estates.*">
                        <i class="flex-shrink-0 text-xl ti ti-solid ti-home"></i>
                        <span class="flex-shrink-0 hide-menu">
                            صفحة العقارات
                        </span>
                    </x-admin.aside.slider-item>
                    <x-admin.aside.slider-item href="{{ route('admin.advertisements.index') }}"
                        activeRoute="admin.advertisements.*">
                        <i class="flex-shrink-0 text-xl ti ti-tag"></i>
                        <span class="flex-shrink-0 hide-menu">
                            صفحة الاعلانات
                        </span>
                    </x-admin.aside.slider-item>

                    <x-admin.aside.slider-item href="{{ route('admin.lands.index') }}" activeRoute="admin.lands.*">
                        <i class="flex-shrink-0 text-xl ti ti-map"></i>
                        <span class="flex-shrink-0 hide-menu">
                            صفحة الاراضي
                        </span>
                    </x-admin.aside.slider-item>

                    <x-admin.aside.slider-item href="{{ route('admin.apartments.index') }}"
                        activeRoute="admin.apartments.*">
                        <i class="flex-shrink-0 text-xl ti ti-home"></i>
                        <span class="flex-shrink-0 hide-menu">
                            صفحة الشقق
                        </span>
                    </x-admin.aside.slider-item>

                    <x-admin.aside.slider-item href="{{ route('admin.buildings.index') }}"
                        activeRoute="admin.buildings.*">
                        <i class="flex-shrink-0 text-xl ti ti-building"></i>
                        <span class="flex-shrink-0 hide-menu">
                            صفحة المباني
                        </span>
                    </x-admin.aside.slider-item>

                    <x-admin.aside.slider-item href="{{ route('admin.about.index') }}" activeRoute="admin.about.*">
                        <i class="flex-shrink-0 text-xl ti-info-circle"></i>
                        <span class="flex-shrink-0 hide-menu">
                            صفحة من نحن
                        </span>
                    </x-admin.aside.slider-item>
                    <x-admin.aside.slider-item href="{{ route('admin.settings.index') }}"
                        activeRoute="admin.settings.*">
                        <i class="flex-shrink-0 text-xl ti ti-settings"></i>
                        <span class="flex-shrink-0 hide-menu">
                            صفحة الاعدادات
                        </span>
                    </x-admin.aside.slider-item>

                    <x-admin.aside.slider-item href="{{ route('admin.fqs.index') }}" activeRoute="admin.fqs.*">
                        <i class="flex-shrink-0 text-xl ti ti-question-mark"></i>
                        <span class="flex-shrink-0 hide-menu">
                            صفحة الاسئلة الشايعة
                        </span>
                    </x-admin.aside.slider-item>
                    <x-admin.aside.slider-item href="{{ route('admin.helps.index') }}" activeRoute="admin.helps.*">
                        <i class="flex-shrink-0 text-xl ti ti-help-circle"></i>
                        <span class="flex-shrink-0 hide-menu">
                            صفحة المساعدة
                        </span>
                    </x-admin.aside.slider-item>
                    <x-admin.aside.slider-item href="{{ route('admin.conditions.index') }}"
                        activeRoute="admin.conditions.*">
                        <i class="flex-shrink-0 text-xl ti ti-file-description"></i>
                        <span class="flex-shrink-0 hide-menu">
                            صفحة الشروط والاحكام
                        </span>
                    </x-admin.aside.slider-item>

                </x-admin.aside.slide-bar>
                <x-admin.aside.profile />
            </aside>
            <div class="w-full page-wrapper" role="main">
                @include('admin.layouts.navigation')

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
    {{-- <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/dashboards/dashboard.js') }}"></script>
    <livewire:scripts />
</body>

</html>
