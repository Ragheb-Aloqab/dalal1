<x-app-layout>

    <x-hero-section :backgroundImage="'assets/images/backgrounds/contactusbg.jpg'" :breadcrumbLinks="[['url' => route('/'), 'name' => 'الصفحة الرئيسية'], ['url' => route('contacts'), 'name' => 'اتصل بنا']]" :headerTitle="'اتصل بنا'" :headerDescription="'نحن هنا لمساعدتك. يمكنك التواصل معنا من خلال المعلومات أدناه.'" />

    <x-container>
        <div class="flex flex-col min-w-full gap-y-10">
            <div class="min-w-full py-8 [border-bottom:1px_solid_rgb(226,_226,_226)]">
                <h6 class="mb-6 text-3xl font-extrabold">اتصل بنا</h6>
                <p class="text-xl text-right">
                    إذا كان لديك أي استفسار أو تحتاج إلى مساعدة، لا تتردد في الاتصال بنا من خلال النموذج أدناه أو
                    باستخدام معلومات الاتصال المتاحة.
                </p>
                <div class="flex flex-col mt-6 gap-y-6">
                    <div class="flex flex-col items-start gap-y-3">
                        <p class="text-xl font-bold">العنوان:</p>
                        <p class="text-sm">
                            شارع العقارات، مدينة السكن، الدولة.
                        </p>
                    </div>
                    <div class="flex flex-col items-start gap-y-3">
                        <p class="text-xl font-bold">البريد الإلكتروني:</p>
                        <p class="text-sm">
                            info@dalalk.com
                        </p>
                    </div>
                    <div class="flex flex-col items-start gap-y-3">
                        <p class="text-xl font-bold">رقم الهاتف:</p>
                        <p class="text-sm">
                            +123 456 7890
                        </p>
                    </div>
                </div>
            </div>

            <div class="min-w-full py-8">
                <h6 class="mb-6 text-3xl font-extrabold">نموذج الاتصال</h6>
                <form action="" method="POST" class="flex flex-col gap-y-6">
                    @csrf
                    <div class="flex flex-col gap-y-2">
                        <label for="name" class="text-xl font-bold">الاسم</label>
                        <input type="text" id="name" name="name"
                            class="px-4 py-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="flex flex-col gap-y-2">
                        <label for="email" class="text-xl font-bold">البريد الإلكتروني</label>
                        <input type="email" id="email" name="email"
                            class="px-4 py-2 border border-gray-300 rounded" required>
                    </div>
                    <div class="flex flex-col gap-y-2">
                        <label for="message" class="text-xl font-bold">الرسالة</label>
                        <textarea id="message" name="message" rows="4" class="px-4 py-2 border border-gray-300 rounded" required></textarea>
                    </div>
                    <div>
                        <button type="submit" class="px-6 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
                            إرسال
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-container>


    <section class="bg-primary-50 dark:bg-background-800" id="contact">
        <div class="px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:px-8 lg:py-20">
            <div class="mb-4">
                <div class="max-w-3xl mb-6 text-center sm:text-center md:mx-auto md:mb-12">
                    <p class="text-base font-semibold tracking-wide uppercase text-primary-600 dark:text-primary-200">
                        اتصل بنا
                    </p>
                    <h2
                        class="mb-4 text-3xl font-bold tracking-tight font-heading text-text-900 dark:text-text-50 sm:text-5xl">
                        تواصل معنا
                    </h2>
                    <p class="max-w-3xl mx-auto mt-4 text-xl text-text-600 dark:text-text-300">
                        نحن هنا للإجابة على جميع استفساراتك واحتياجاتك
                    </p>
                </div>
            </div>
            <div class="flex items-stretch justify-center">
                <div class="grid md:grid-cols-2">
                    <div class="h-full pl-6"> <!-- Changed to pl-6 for RTL support -->
                        <p class="mt-3 mb-12 text-lg text-text-600 dark:text-text-300">
                            نحن هنا لمساعدتك في جميع استفساراتك، لا تتردد في التواصل معنا عبر النموذج أو المعلومات
                            أدناه.
                        </p>
                        <ul class="mb-6 md:mb-0">
                            <li class="flex">
                                <div
                                    class="flex items-center justify-center w-10 h-10 rounded bg-secondary-500 text-text-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                        <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                        <path
                                            d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="mb-4 mr-4">
                                    <h3 class="mb-2 text-lg font-medium leading-6 text-text-900 dark:text-text-50">
                                        عنواننا</h3>
                                    <p class="text-text-600 dark:text-text-300">1230 شارع ماكنس، طريق دونيك</p>
                                    <p class="text-text-600 dark:text-text-300">نيويورك، الولايات المتحدة الأمريكية</p>
                                </div>
                            </li>
                            <li class="flex">
                                <div
                                    class="flex items-center justify-center w-10 h-10 rounded bg-secondary-500 text-text-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                        <path
                                            d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                                        </path>
                                        <path d="M15 7a2 2 0 0 1 2 2"></path>
                                        <path d="M15 3a6 6 0 0 1 6 6"></path>
                                    </svg>
                                </div>
                                <div class="mb-4 mr-4">
                                    <h3 class="mb-2 text-lg font-medium leading-6 text-text-900 dark:text-text-50">
                                        التواصل</h3>
                                    <p class="text-text-600 dark:text-text-300">الجوال: +1 (123) 456-7890</p>
                                    <p class="text-text-600 dark:text-text-300">البريد الإلكتروني: tailnext@gmail.com
                                    </p>
                                </div>
                            </li>
                            <li class="flex">
                                <div
                                    class="flex items-center justify-center w-10 h-10 rounded bg-secondary-500 text-text-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                        <path d="M12 7v5l3 3"></path>
                                    </svg>
                                </div>
                                <div class="mb-4 mr-4">
                                    <h3 class="mb-2 text-lg font-medium leading-6 text-text-900 dark:text-text-50">
                                        ساعات العمل</h3>
                                    <p class="text-text-600 dark:text-text-300">الاثنين - الجمعة: 08:00 - 17:00</p>
                                    <p class="text-text-600 dark:text-text-300">السبت والأحد: 08:00 - 12:00</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="max-w-6xl p-5 card h-fit md:p-12 bg-background-100 dark:bg-background-700"
                        id="form">
                        <h2 class="mb-4 text-2xl font-bold text-text-900 dark:text-text-50">هل أنت جاهز للبدء؟</h2>
                        <form id="contactForm">
                            <div class="mb-6">
                                <div class="mx-0 mb-1 sm:mb-4">
                                    <label for="name"
                                        class="pb-1 text-xs tracking-wider uppercase text-text-600 dark:text-text-300">الاسم</label>
                                    <input type="text" id="name" autocomplete="given-name"
                                        placeholder="اسمك"
                                        class="w-full py-2 pl-2 pr-4 mb-2 border rounded-md shadow-md border-text-200 dark:text-gray-300 dark:bg-background-800"
                                        name="name">
                                </div>
                                <div class="mx-0 mb-1 sm:mb-4">
                                    <label for="email"
                                        class="pb-1 text-xs tracking-wider uppercase text-text-600 dark:text-text-300">البريد
                                        الإلكتروني</label>
                                    <input type="email" id="email" autocomplete="email"
                                        placeholder="عنوان بريدك الإلكتروني"
                                        class="w-full py-2 pl-2 pr-4 mb-2 border rounded-md shadow-md border-text-200 dark:text-gray-300 dark:bg-background-800"
                                        name="email">
                                </div>
                                <div class="mx-0 mb-1 sm:mb-4">
                                    <label for="textarea"
                                        class="pb-1 text-xs tracking-wider uppercase text-text-600 dark:text-text-300">رسالتك</label>
                                    <textarea id="textarea" name="textarea" cols="30" rows="5" placeholder="اكتب رسالتك..."
                                        class="w-full py-2 pl-2 pr-4 mb-2 border rounded-md shadow-md border-text-200 dark:text-gray-300 dark:bg-background-800"></textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit"
                                    class="w-full px-6 py-3 text-white rounded-md bg-primary-500 font-xl hover:bg-primary-600">إرسال
                                    الرسالة</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


</x-app-layout>

@foreach ($contacts as $contact)
    <p>{{ $contact }}</p>
@endforeach
