<!-- resources/views/hero.blade.php -->
<x-app-layout>
    <!-- Custom Styles -->
    <style>
        /* تخصيص ارتفاع البطاقات */
        .card {
            height: 300px;
        }

        @media (min-width: 640px) {
            .card {
                height: 350px;
            }
        }

        @media (min-width: 1024px) {
            .card {
                height: 400px;
            }
        }
    </style>

    <header>
        <!-- حاوية البطل -->
        <div class="w-full px-5 py-16 mx-auto max-w-7xl md:px-10 md:py-20">
            <!-- المكون -->
            <div class="grid items-center gap-8 justify-items-start sm:gap-20 md:grid-cols-2">
                <!-- محتوى البطل -->
                <div class="flex flex-col">
                    <!-- عنوان البطل -->
                    <h1 class="mb-2 text-4xl font-bold text-primary-500 md:text-6xl">
                        دلالك
                    </h1>
                    {{-- <h2 class="mb-2 text-4xl font-bold text-gray-800 md:text-1xl">
                        الموقع العقاري الذي تبحث عنه
                    </h2> --}}
                    <!-- وصف البطل -->
                    <p class="max-w-lg text-sm text-text-500 sm:text-xl md:mb-10 lg:mb-12">
                        الموقع العقاري الذي تبحث عنه.
                        اكتشف أفضل العروض العقارية في منطقتك بسهولة وسرعة. سواء كنت تبحث عن شراء أو تأجير، دلالك توفر لك
                        كل ما تحتاجه من معلومات لاتخاذ القرار الأمثل.
                    </p>
                    <!-- نموذج البحث -->
                    <form action="{{ route('search') }}" method="GET">
                        <label for="search"
                            class="mb-2 text-sm font-medium sr-only text-text-900 dark:text-text-50">بحث</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                                <svg class="w-4 h-4 text-text-500 dark:text-text-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="search" name="query"
                                class="block w-full p-4 text-sm border rounded-lg text-text-900 border-background-300 ps-10 bg-background-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-background-700 dark:border-background-600 dark:placeholder-text-400 dark:text-text-50 dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="ابحث عن عقار..." required />
                            <button type="submit"
                                class="text-text-50 absolute end-2.5 bottom-2.5 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">بحث</button>
                        </div>
                    </form>

                    <!-- Tabler Icons Grid -->
                    <div class="grid w-full max-w-4xl grid-cols-3 gap-6 py-6 sm:grid-cols-3 lg:grid-cols-3">
                        <!-- العملاء -->
                        <div
                            class="flex flex-col items-center p-2 transition-shadow duration-300 rounded-lg shadow bg-background-100 hover:shadow-lg">
                            <!-- أيقونة العملاء -->
                            <i class="mb-2 text-5xl text-primary-600 ti ti-users" aria-label="عملاء"></i>
                            <h3 class="text-3xl font-bold text-primary-600">10K+</h3>
                            <p class="text-lg text-text-500">عملاء</p>
                        </div>

                        <!-- المباني -->
                        <div
                            class="flex flex-col items-center p-2 transition-shadow duration-300 rounded-lg shadow bg-background-100 hover:shadow-lg">
                            <!-- أيقونة المباني -->
                            <i class="mb-2 text-5xl text-secondary-600 ti ti-building" aria-label="مباني"></i>
                            <h3 class="text-3xl font-bold text-secondary-600">150+</h3>
                            <p class="text-lg text-text-500">مباني</p>
                        </div>

                        <!-- مكاتب مقدمي الخدمة -->
                        <div
                            class="flex flex-col items-center p-2 transition-shadow duration-300 rounded-lg shadow bg-background-100 hover:shadow-lg">
                            <!-- أيقونة مكاتب مقدمي الخدمة -->
                            <i class="mb-2 text-5xl text-accent-600 ti ti-briefcase"
                                aria-label="مكاتب مقدمي الخدمة"></i>
                            <h3 class="text-3xl font-bold text-accent-600">75+</h3>
                            <p class="text-lg text-text-500">مكاتب</p>
                        </div>
                    </div>
                </div>

                <!-- عرض الصور (كاروسيل) -->
                <div class="inline-block w-full max-w-2xl h-auto xs:h-[380px]">
                    <x-image-carousel :realEstateId="2" />
                </div>
            </div>
        </div>
    </header>

    <x-container class="px-5">
        <section class="dark:bg-background-100 dark:text-text-800">
            <div class="container max-w-xl p-6 py-12 mx-auto space-y-24 lg:max-w-7xl">
                <!-- العنوان والوصف الرئيسي -->
                <div>
                    <h2 class="text-3xl font-bold tracking-tight text-center sm:text-5xl dark:text-text-900">ميزات دلالك
                    </h2>
                    <p class="max-w-3xl mx-auto mt-4 text-xl text-center dark:text-text-600">
                        اكتشف الميزات الرائعة التي تجعل من دلالك الخيار الأمثل للبحث عن العقارات وإدارتها بكل سهولة
                        ويسر.
                    </p>
                </div>

                <!-- الميزات الأولى -->
                <div class="grid lg:gap-8 lg:grid-cols-2 lg:items-center">
                    <!-- الميزة الأولى -->
                    <div>
                        <h3 class="text-2xl font-bold tracking-tight sm:text-3xl dark:text-text-900">بحث متقدم وسهل</h3>
                        <p class="mt-3 text-lg dark:text-text-600">
                            استخدم أدوات البحث المتقدمة للعثور على العقار المثالي حسب الموقع، السعر، نوع العقار،
                            والمزيد.
                        </p>
                        <div class="mt-12 space-y-12">
                            <!-- ميزة فرعية 1 -->
                            <div class="flex items-start">
                                <i class="flex-shrink-0">
                                    <!-- أيقونة البحث المتقدم -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-primary-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </i>
                                <div class="mr-4">
                                    <h4 class="text-lg font-medium leading-6 dark:text-text-900">تصفية مخصصة</h4>
                                    <p class="mt-2 dark:text-text-600">
                                        قم بتصفية نتائج البحث بناءً على معايير متعددة مثل عدد الغرف، المساحة، والميزات
                                        الإضافية.
                                    </p>
                                </div>
                            </div>
                            <!-- ميزة فرعية 2 -->
                            <div class="flex items-start">
                                <i class="flex-shrink-0">
                                    <!-- أيقونة الخرائط -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-primary-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8l6 6-6 6M6 8l6 6-6 6" />
                                    </svg>
                                </i>
                                <div class="mr-4">
                                    <h4 class="text-lg font-medium leading-6 dark:text-text-900">تكامل خرائط جوجل</h4>
                                    <p class="mt-2 dark:text-text-600">
                                        شاهد موقع العقارات على خرائط جوجل لتحديد الموقع بدقة ومعرفة المناطق المحيطة بها.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- صورة توضيحية -->
                    <div class="mt-10 lg:mt-0">
                        <img src="{{ asset('assets/images/backgrounds/back-silder (5).jpg') }}" alt="بحث متقدم"
                            class="mx-auto rounded-sm shadow-sm dark:bg-background-500">
                    </div>
                </div>

                <!-- الميزات الثانية -->
                <div class="grid lg:gap-8 lg:grid-cols-2 lg:items-center">
                    <!-- صورة توضيحية -->
                    <div class="mt-10 lg:mt-0">
                        <img src="{{ asset('assets/images/backgrounds/back-silder (2).jpg') }}" alt="دعم العملاء"
                            class="mx-auto rounded-sm shadow-sm dark:bg-background-500">
                    </div>

                    <!-- الميزة الثانية -->
                    <div>
                        <h3 class="text-2xl font-bold tracking-tight sm:text-3xl dark:text-text-900">إدارة عقاراتك
                            بكفاءة</h3>
                        <p class="mt-3 text-lg dark:text-text-600">
                            قم بإدارة عقاراتك بسهولة من خلال لوحة تحكم متقدمة تسمح لك بإضافة، تعديل، وحذف العقارات بكل
                            سهولة.
                        </p>
                        <div class="mt-12 space-y-12">
                            <!-- ميزة فرعية 1 -->
                            <div class="flex items-start">
                                <i class="flex-shrink-0">
                                    <!-- أيقونة إدارة العقارات -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-primary-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                </i>
                                <div class="mr-4">
                                    <h4 class="text-lg font-medium leading-6 dark:text-text-900">لوحة تحكم متكاملة</h4>
                                    <p class="mt-2 dark:text-text-600">
                                        تحكم في جميع عقاراتك من مكان واحد، مع إمكانية الوصول إلى إحصائيات مفصلة وتقارير
                                        دورية.
                                    </p>
                                </div>
                            </div>
                            <!-- ميزة فرعية 2 -->
                            <div class="flex items-start">
                                <i class="flex-shrink-0">
                                    <!-- أيقونة رفع الصور -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-primary-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M12 12v6m0 0l4-4m-4 4l-4-4" />
                                    </svg>
                                </i>
                                <div class="mr-4">
                                    <h4 class="text-lg font-medium leading-6 dark:text-text-900">رفع الصور بسهولة</h4>
                                    <p class="mt-2 dark:text-text-600">
                                        أضف صورًا عالية الجودة لعقاراتك بسرعة وسهولة لتعزيز جاذبيتها وجذب المزيد من
                                        العملاء.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- الميزات الثالثة -->
                <div class="grid lg:gap-8 lg:grid-cols-2 lg:items-center">
                    <!-- الميزة الثالثة -->
                    <div>
                        <h3 class="text-2xl font-bold tracking-tight sm:text-3xl dark:text-text-900">دعم العملاء
                            الممتاز</h3>
                        <p class="mt-3 text-lg dark:text-text-600">
                            فريق دعم متاح على مدار الساعة لمساعدتك في أي استفسارات أو مشكلات قد تواجهها أثناء استخدام
                            الموقع.
                        </p>
                        <div class="mt-12 space-y-12">
                            <!-- ميزة فرعية 1 -->
                            <div class="flex items-start">
                                <i class="flex-shrink-0">
                                    <!-- أيقونة الدعم -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-primary-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M18 9v6M6 9v6m6-3h6m-6-3H6m12 6v2a2 2 0 01-2 2H8a2 2 0 01-2-2v-2" />
                                    </svg>
                                </i>
                                <div class="mr-4">
                                    <h4 class="text-lg font-medium leading-6 dark:text-text-900">دعم فني سريع</h4>
                                    <p class="mt-2 dark:text-text-600">
                                        استلم المساعدة التي تحتاجها بسرعة من خلال فريقنا المختص والمتواجد دائمًا لخدمتك.
                                    </p>
                                </div>
                            </div>
                            <!-- ميزة فرعية 2 -->
                            <div class="flex items-start">
                                <i class="flex-shrink-0">
                                    <!-- أيقونة التواصل -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-primary-500"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 10h.01M12 10h.01M16 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </i>
                                <div class="mr-4">
                                    <h4 class="text-lg font-medium leading-6 dark:text-text-900">تواصل مباشر</h4>
                                    <p class="mt-2 dark:text-text-600">
                                        تواصل مع فريقنا مباشرة عبر الدردشة أو البريد الإلكتروني للحصول على الدعم اللازم
                                        في
                                        أي وقت.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- صورة توضيحية -->
                    <div class="mt-10 lg:mt-0">
                        <img src="{{ asset('assets/images/backgrounds/back-silder (1).jpg') }}" alt="دعم العملاء"
                            class="mx-auto rounded-md shadow-sm dark:bg-background-500">
                    </div>
                </div>
            </div>
        </section>

        @php
            $cities = App\Models\City::take(4)->get(); // Retrieve the first 4 cities
        @endphp

        <x-content>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <div class="col-span-4">
                    <h2 class="my-2 text-3xl font-bold text-right">
                        تصفح المشاريع حسب المدينة
                    </h2>
                    <p class="text-right">
                        استعرض مجموعتنا من المشاريع العقارية في مختلف المدن، من الشقق الفاخرة إلى الفلل الهادئة، واكتشف
                        العقار المثالي في المدينة المفضلة لديك.
                    </p>
                </div>

                @foreach ($cities as $city)
                    <div
                        class="relative overflow-hidden transition duration-300 transform rounded-lg shadow-md bg-background-100 dark:bg-background-700 hover:scale-105">
                        <a href="{{ route('cities.show', $city->id) }}">
                            <img src="{{asset('assets/images/cities/taiz.jpeg')}}"
                                alt="{{ $city['name'] }}" class="object-cover w-full h-48">
                            <div class="absolute bottom-0 left-0 right-0 p-4 bg-black bg-opacity-50">
                                <h3 class="text-lg font-semibold text-text-50">{{ $city['name'] }} -
                                    {{ $city->realEstates->count() }} عقار</h3>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </x-content>

        <x-content>
            <h2 class="my-2 text-3xl font-bold text-right">عقاراتنا المميزة</h2>
            <p class="text-right">
                اكتشف مجموعتنا الحصرية من العقارات المميزة، المختارة بعناية لتلبية كافة احتياجاتك وتفضيلاتك.
            </p>

            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                {{-- Uncomment and adjust the following section as needed --}}
                {{-- @if (auth()->check())
                    @php
                        $recommendations = get_user_recommendations()->take(3);
                    @endphp

                    @if ($recommendations->isNotEmpty())
                        @foreach ($recommendations as $ad)
                            <div class="relative">
                                <a href="/properties/riyadh-villa"
                                    class="block transition duration-300 transform rounded-md shadow-md text-text-50 bg-background-100 dark:bg-background-700 hover:scale-105 hover:shadow-2xl">
                                    <img class="object-cover w-full h-full rounded-lg card"
                                        src="{{ Storage::url($ad->realEstate->attachments[1]->file_path) }}"
                                        alt="{{ $ad->realEstate->attachments[0]->file_path }}" />
                                    <div
                                        class="absolute bottom-0 w-full p-2 transition-opacity duration-300 bg-black bg-opacity-50 rounded-b-lg hover:bg-opacity-70">
                                        <h5 class="flex justify-between mb-1 text-xl font-medium leading-tight text-text-50">
                                            <span>
                                                {{ Str::limit($ad->title, 20, '..') }}
                                            </span>
                                            <span class="block p-1 text-sm rounded-sm text-text-50 bg-primary-700">
                                                {{ $ad->realEstate->price }} ريال
                                            </span>
                                        </h5>
                                        <p class="text-base text-text-200">
                                            نوع العقار :
                                            @if ($ad->realEstate->isLand())
                                                أرض
                                            @elseif ($ad->realEstate->isApartment())
                                                شقة
                                            @elseif ($ad->realEstate->isBuilding())
                                                مبنى
                                            @else
                                                نوع غير معروف
                                            @endif
                                        </p>
                                        <p class="mb-1 text-base text-text-200">
                                            {{ Str::limit($ad->realEstate->description, 80, '..') }}
                                        </p>
                                        <p class="text-base text-text-200">
                                            <small>{{ $ad->created_at->diffForHumans() }}</small>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                @endif --}}
                {{-- Example Static Cards --}}
                {{--
                <div class="relative">
                    <a href="/properties/riyadh-villa"
                        class="block transition duration-300 transform rounded-lg shadow-lg text-text-50 bg-background-100 dark:bg-background-700 hover:scale-105 hover:shadow-2xl">
                        <img class="object-cover w-full h-full rounded-lg card"
                            src="https://images.unsplash.com/photo-1499856871958-5b9627545d1a" alt="فيلا في جدة" />
                        <div
                            class="absolute bottom-0 w-full p-4 transition-opacity duration-300 bg-black bg-opacity-50 rounded-b-lg hover:bg-opacity-70">
                            <h5 class="mb-1 text-xl font-medium leading-tight text-text-50">فيلا فاخرة في جدة</h5>
                            <p class="mb-1 text-base text-text-200">
                                فيلا بتصميم معماري حديث وحدائق واسعة توفر بيئة مثالية للعائلة.
                            </p>
                            <p class="text-base text-text-200">
                                <small>آخر تحديث قبل 5 دقائق</small>
                            </p>
                        </div>
                    </a>
                </div>
                --}}
            </div>
        </x-content>
    </x-container>

    {{-- Uncomment and adjust the following section as needed --}}

    <x-container class="p-5">
        <x-content>
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                @php
                    $providers = App\Models\Provider::take(4)->get(); // Retrieve the first 4 providers
                @endphp
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    @foreach ($providers as $provider)
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="https://images.unsplash.com/photo-1499856871958-5b9627545d1a"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                            <div class="absolute inset-0">
                                <div class="h-full">
                                    <div class="flex justify-center h-full max-w-screen-xl p-4 mx-auto">
                                        <div class="text-lf">
                                            الشركات العقارية المميزة
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute inset-0">
                                <div class="h-full">
                                    <div class="flex items-center h-full max-w-screen-xl p-4 mx-auto ">
                                        <div class="flex items-center">
                                            <div class="px-2">
                                                <x-avatar :avatar="$provider->logo" :name="$provider->avatar" width="32"
                                                    height="32" />
                                            </div>
                                            <div class="">
                                                <p class="m-1 text-lg font-semibold rounded-md bg-background-200">
                                                    {{ $provider->name }}
                                                </p>
                                                <p class="p-1 m-1 rounded-md text-text-800 bg-background-400">
                                                    {{ $provider->user->name??'' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2 rtl:space-x-reverse">
                    <button type="button" class="w-3 h-3 rounded-full bg-background-400" aria-current="true"
                        aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-background-400" aria-current="false"
                        aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-background-400" aria-current="false"
                        aria-label="Slide 3" data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-background-400" aria-current="false"
                        aria-label="Slide 4" data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-background-400" aria-current="false"
                        aria-label="Slide 5" data-carousel-slide-to="4"></button>
                </div>
                <!-- Slider controls -->
                {{--
                <button type="button"
                    class="absolute top-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer start-0 group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-background-300 dark:bg-background-700 group-hover:bg-background-400 dark:group-hover:bg-background-600 group-focus:ring-4 group-focus:ring-background-300 dark:group-focus:ring-background-700 group-focus:outline-none">
                        <svg class="w-4 h-4 text-text-900 dark:text-text-50 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer end-0 group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-background-300 dark:bg-background-700 group-hover:bg-background-400 dark:group-hover:bg-background-600 group-focus:ring-4 group-focus:ring-background-300 dark:group-focus:ring-background-700 group-focus:outline-none">
                        <svg class="w-4 h-4 text-text-900 dark:text-text-50 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
                --}}
            </div>
        </x-content>
    </x-container>

    {{-- <div
        class="w-full p-4 text-center border border-background-200 sm:p-8 dark:bg-background-800 dark:border-background-700">
        <h5 class="mb-2 text-3xl font-bold text-text-900 dark:text-text-50">اعمل بسرعة من أي مكان</h5>
        <p class="mb-5 text-base text-text-500 sm:text-lg dark:text-text-400">ابقَ على اطلاع وادفع العمل إلى الأمام مع
            Flowbite على نظامي iOS وAndroid. قم بتنزيل التطبيق اليوم.</p>
        <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
            <a href="#"
                class="w-full sm:w-auto bg-background-800 hover:bg-background-700 focus:ring-4 focus:outline-none focus:ring-background-300 text-text-50 rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-background-700 dark:hover:bg-background-600 dark:focus:ring-background-700">
                <svg class="me-3 w-7 h-7" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="apple"
                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <path fill="currentColor" d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.


    <div class="w-full p-4 text-center border border-gray-200 sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">اعمل بسرعة من أي مكان</h5>
        <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">ابقَ على اطلاع وادفع العمل إلى الأمام مع
            Flowbite على نظامي iOS وAndroid. قم بتنزيل التطبيق اليوم.</p>
        <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
            <a href="#"
                class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                <svg class="me-3 w-7 h-7" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="apple"
                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                    <path fill="currentColor"
                        d=" M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3
                        20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59
                        126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5
                        102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52
                        16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z">
                    </path>
                </svg>
                <div class="text-left rtl:text-right">
                    <div class="mb-1 text-xs">حمل من</div>
                    <div class="-mt-1 font-sans text-sm font-semibold">متجر تطبيقات Mac</div>
                </div>
            </a>
            <a href="#"
                class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                <svg class="me-3 w-7 h-7" aria-hidden="true" focusable="false" data-prefix="fab"
                    data-icon="google-play" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor"
                        d="M325.3 234.3L104.6 13l280.8 161.2-60.1 60.1zM47 0C34 6.8 25.3 19.2 25.3 35.3v441.3c0 16.1 8.7 28.5 21.7 35.3l256.6-256L47 0zm425.2 225.6l-58.9-34.1-65.7 64.5 65.7 64.5 60.1-34.1c18-14.3 18-46.5-1.2-60.8zM104.6 499l280.8-161.2-60.1-60.1L104.6 499z">
                    </path>
                </svg>
                <div class="text-left rtl:text-right">
                    <div class="mb-1 text-xs">احصل على</div>
                    <div class="-mt-1 font-sans text-sm font-semibold">Google Play</div>
                </div>
            </a>
        </div>
    </div> --}}




    {{-- <script>
        // JavaScript Carousel Logic
        const carousel = document.getElementById('carousel');
        const slides = document.querySelectorAll('#carousel > div');
        const dots = document.querySelectorAll('.dot');
        let currentIndex = 0;

        function showSlide(index) {
            // Calculate the width of one slide
            const width = slides[0].clientWidth;
            // Update carousel position
            carousel.style.transform = `translateX(-${index * width}px)`;
            // Update active dot
            dots.forEach((dot, i) => {
                dot.classList.toggle('bg-white', i === index);
                dot.classList.toggle('bg-gray-400', i !== index);
            });
        }

        // Next Button
        document.getElementById('nextBtn').addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        });

        // Previous Button
        document.getElementById('prevBtn').addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            showSlide(currentIndex);
        });

        // Dots
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentIndex = index;
                showSlide(currentIndex);
            });
        });

        // Auto Slide
        setInterval(() => {
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        }, 5000); // Change slide every 5 seconds
    </script> --}}




    {{-- <script>
        // JavaScript Carousel Logic
        const carousel = document.getElementById('carousel');
        const paginationDots = document.getElementById('pagination-dots');
        let currentIndex = 0;
        let slides = [];

        // Images to be added dynamically
        const images = [
            '{{ asset('assets/images/backgrounds/profilebg.jpg') }}',
            '{{ asset('assets/images/products/product-1.jpg') }}',
            '{{ asset('assets/images/products/product-3.jpg') }}',
        ];

        // Function to create and append slides dynamically
        function createSlides() {
            images.forEach((image, index) => {
                // Create slide div
                const slide = document.createElement('div');
                slide.classList.add('h-screen', 'w-full', 'flex-shrink-0', 'bg-center', 'bg-cover');
                slide.style.backgroundImage = `url(${image})`;
                // slide.appendChild(image);

                // Append slide to the carousel container
                carousel.appendChild(slide);
                slides.push(slide);

                // Create and append pagination dot
                const dot = document.createElement('span');
                dot.classList.add('dot', 'h-3', 'w-3', 'bg-gray-400', 'rounded-full', 'cursor-pointer');
                if (index === 0) dot.classList.replace('bg-gray-400', 'bg-white');
                dot.addEventListener('click', () => showSlide(index));
                paginationDots.appendChild(dot);
            });
        }

        // Function to show the slide
        function showSlide(index) {
            currentIndex = index;
            // Calculate the width of one slide (full width of the viewport)
            const width = slides[0].clientWidth;
            // Update carousel position
            carousel.style.transform = `translateX(-${index * 100}%)`;

            // Update pagination dots
            document.querySelectorAll('.dot').forEach((dot, i) => {
                dot.classList.toggle('bg-white', i === index);
                dot.classList.toggle('bg-gray-400', i !== index);
            });
        }

        // Navigation Buttons
        document.getElementById('nextBtn').addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        });

        document.getElementById('prevBtn').addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            showSlide(currentIndex);
        });

        // Auto Slide
        setInterval(() => {
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        }, 5000); // Change slide every 5 seconds

        // Initialize the slides
        createSlides();
    </script> --}}




</x-app-layout>
