<x-app-layout>

    <x-hero-section :backgroundImage="'assets/images/backgrounds/aboutusbg.jpg'" :breadcrumbLinks="[['url' => route('/'), 'name' => 'الصفحة الرئيسية'], ['url' => route('abouts'), 'name' => 'من نحن']]" :headerTitle="'من نحن'" :headerDescription="'تعرف على المزيد حول شركتنا وقيمنا ومهمتنا. نحن ملتزمون بتقديم أفضل خدمة لعملائنا.'" />

    <x-container>
        <div class="flex flex-col min-w-full gap-y-10">

            <div class="flex flex-col gap-y-10">
                <div class="flex flex-col items-start min-w-full py-8 gap-y-6 ">
                    <div class="flex flex-col items-start gap-y-3">

                        @foreach ($abouts as $about)
                            <h6 class="text-2xl font-bold">{{$about->title}}</h6>
                            <p class="text-lg">
                                {{$about->content}}
                            </p>

                        @endforeach

                        <h6 class="text-2xl font-semibold">مهمتنا</h6>
                        <p class="text-xl">
                            مهمتنا هي تقديم قيمة استثنائية لعملائنا من خلال تقديم حلول مبتكرة وخدمة عملاء متميزة. نحن
                            ملتزمون بإحداث تأثير إيجابي في مجتمعنا وصناعتنا.
                        </p>
                    </div>
                    <div class="flex flex-col items-start gap-y-3">
                        <h6 class="text-2xl font-semibold">قيمنا</h6>
                        <p class="text-xl">
                            نؤمن بالنزاهة والتميز والعمل الجماعي. توجه هذه القيم الأساسية أفعالنا وقراراتنا، مما يضمن
                            أننا نتصرف دائمًا في مصلحة عملائنا وأصحاب المصلحة لدينا.
                        </p>
                    </div>
                </div>
            </div>
            <div class="mt-12 mb-4 text-right">
                <h2 class="text-2xl font-bold">فريقنا</h2>
                <p class="mt-4 text-xl text-gray-700">
                    يتكون فريقنا من أفراد موهوبين وشغوفين يكرسون جهودهم لتحقيق أهداف شركتنا. تعرف على الأشخاص الذين
                    يجعلون كل شيء ممكنًا.
                </p>
            </div>
        </div>
    </x-container>






    {{-- <section class="dark:bg-gray-100 dark:text-gray-800">
        <div class="container max-w-xl p-6 py-12 mx-auto space-y-24 lg:px-8 lg:max-w-7xl" bis_skin_checked="1">
            <div bis_skin_checked="1">
                <h2 class="text-3xl font-bold tracking-tight text-center sm:text-5xl dark:text-gray-900">تحقيق التميز
                    المستمر</h2>
                <p class="max-w-3xl mx-auto mt-4 text-xl text-center dark:text-gray-600">نسعى لتقديم الحلول المبتكرة
                    والفعالة لتحقيق أهدافك بنجاح.</p>
            </div>

            <div class="grid lg:gap-8 lg:grid-cols-2 lg:items-center" bis_skin_checked="1">
                <div bis_skin_checked="1">
                    <h3 class="text-2xl font-bold tracking-tight sm:text-3xl dark:text-gray-900">تحقيق التميز المستمر
                    </h3>
                    <p class="mt-3 text-lg dark:text-gray-600">نحن ملتزمون بتقديم حلول مبتكرة وفعالة لتحقيق أهدافك. نوفر
                        لك خبراتنا لضمان النجاح المستدام.</p>
                    <div class="mt-12 space-y-12" bis_skin_checked="1">
                        <div class="flex" bis_skin_checked="1">
                            <div class="flex-shrink-0" bis_skin_checked="1">
                                <div class="flex items-center justify-center w-12 h-12 rounded-md dark:bg-violet-600 dark:text-gray-50"
                                    bis_skin_checked="1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" class="w-7 h-7">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4" bis_skin_checked="1">
                                <h4 class="text-lg font-medium leading-6 dark:text-gray-900">حلول مخصصة</h4>
                                <p class="mt-2 dark:text-gray-600">نقدم لك حلولاً مخصصة لتلبية احتياجاتك الفريدة، مع
                                    التركيز على تحقيق أفضل النتائج.</p>
                            </div>
                        </div>
                        <div class="flex" bis_skin_checked="1">
                            <div class="flex-shrink-0" bis_skin_checked="1">
                                <div class="flex items-center justify-center w-12 h-12 rounded-md dark:bg-violet-600 dark:text-gray-50"
                                    bis_skin_checked="1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" class="w-7 h-7">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4" bis_skin_checked="1">
                                <h4 class="text-lg font-medium leading-6 dark:text-gray-900">خبرات عالمية</h4>
                                <p class="mt-2 dark:text-gray-600">نمتلك الخبرات العالمية التي تمكننا من تقديم حلول
                                    فعالة تلبي تطلعاتك وتحقق أهدافك.</p>
                            </div>
                        </div>
                        <div class="flex" bis_skin_checked="1">
                            <div class="flex-shrink-0" bis_skin_checked="1">
                                <div class="flex items-center justify-center w-12 h-12 rounded-md dark:bg-violet-600 dark:text-gray-50"
                                    bis_skin_checked="1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" class="w-7 h-7">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4" bis_skin_checked="1">
                                <h4 class="text-lg font-medium leading-6 dark:text-gray-900">ابتكار مستمر</h4>
                                <p class="mt-2 dark:text-gray-600">نعمل على تقديم حلول مبتكرة ومتطورة لتحقيق النجاح
                                    الدائم والتفوق على المنافسين.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div aria-hidden="true" class="mt-10 lg:mt-0" bis_skin_checked="1">
                    <img src="{{ asset('assets/images/backs/back (5).jpg') }}" alt=""
                        class="mx-auto rounded-lg shadow-lg dark:bg-gray-500">
                </div>
            </div>


            <div bis_skin_checked="1">
                <div class="grid lg:gap-8 lg:grid-cols-2 lg:items-center" bis_skin_checked="1">
                    <div class="lg:col-start-2" bis_skin_checked="1">
                        <h3 class="text-2xl font-bold tracking-tight sm:text-3xl dark:text-gray-900">الاستمتاع بالتميز
                        </h3>
                        <p class="mt-3 text-lg dark:text-gray-600">استمتع بتجربة لا مثيل لها. نقدم لك حلولاً مبتكرة
                            وخدمات تلبي توقعاتك. تمتع بأفضل ما نقدمه لك لتحقيق أهدافك.</p>
                        <div class="mt-12 space-y-12" bis_skin_checked="1">
                            <div class="flex" bis_skin_checked="1">
                                <div class="flex-shrink-0" bis_skin_checked="1">
                                    <div class="flex items-center justify-center w-12 h-12 rounded-md dark:bg-violet-600 dark:text-gray-50"
                                        bis_skin_checked="1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" class="w-7 h-7">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4" bis_skin_checked="1">
                                    <h4 class="text-lg font-medium leading-6 dark:text-gray-900">حلول مخصصة</h4>
                                    <p class="mt-2 dark:text-gray-600">نحن نقدم حلولاً مخصصة لتلبية احتياجاتك. ندرك
                                        تماماً ما تحتاجه لتحقيق النجاح ونعمل على توفيره.</p>
                                </div>
                            </div>
                            <div class="flex" bis_skin_checked="1">
                                <div class="flex-shrink-0" bis_skin_checked="1">
                                    <div class="flex items-center justify-center w-12 h-12 rounded-md dark:bg-violet-600 dark:text-gray-50"
                                        bis_skin_checked="1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" class="w-7 h-7">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4" bis_skin_checked="1">
                                    <h4 class="text-lg font-medium leading-6 dark:text-gray-900">تفوق مستمر</h4>
                                    <p class="mt-2 dark:text-gray-600">نلتزم بتقديم خدمات متميزة تضيف لك قيمة ملموسة
                                        وتحقق لك نتائج فورية وملموسة.</p>
                                </div>
                            </div>
                            <div class="flex" bis_skin_checked="1">
                                <div class="flex-shrink-0" bis_skin_checked="1">
                                    <div class="flex items-center justify-center w-12 h-12 rounded-md dark:bg-violet-600 dark:text-gray-50"
                                        bis_skin_checked="1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" class="w-7 h-7">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4" bis_skin_checked="1">
                                    <h4 class="text-lg font-medium leading-6 dark:text-gray-900">ابتكار لا مثيل له</h4>
                                    <p class="mt-2 dark:text-gray-600">نؤمن بأن الابتكار هو أساس النجاح. نقدم لك
                                        أفكارًا جديدة وحلولًا متطورة لتحقيق الأفضل.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10 lg:mt-0 lg:col-start-1 lg:row-start-1" bis_skin_checked="1">
                        <img src="{{ asset('assets/images/backs/back (6).jpg') }}" alt=""
                            class="mx-auto rounded-lg shadow-lg dark:bg-gray-500">
                    </div>
                </div>
            </div>




            <div class="py-12 bg-gray-100">
                <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
                    <!-- حاوية القائمة -->
                    <div class="p-6 transition-shadow bg-white rounded-lg shadow-md hover:shadow-lg">
                        <h2 class="mb-4 text-2xl font-semibold text-center text-gray-800"
                            style="font-family: 'Cairo', sans-serif;">About Us</h2>

                        <!-- قائمة مرتبة بالعناوين والمحتويات الفرعية -->
                        <ul class="space-y-6">
                            @foreach ($abouts as $about)
                                <li>
                                    <!-- العنوان الرئيسي بدون أيقونة -->
                                    <h3 class="mb-4 text-2xl font-semibold text-blue-600"
                                        style="font-family: 'Cairo', sans-serif;">
                                        {{ $about->title }}
                                    </h3>

                                    <!-- المحتوى كقائمة نقاط -->
                                    <ul class="mt-2 mb-2 space-y-2 text-gray-700 list-disc list-inside">
                                        @foreach (explode('.', $about->content) as $point)
                                            @if (!empty(trim($point)))
                                                <!-- لتجنب عرض النقاط الفارغة -->
                                                <li class="transition-colors"
                                                    style="font-family: 'Cairo', sans-serif;">{{ trim($point) }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>



        </div>
    </section>
 --}}



</x-app-layout>
