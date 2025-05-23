<x-app-layout>
    <!-- Hero Section -->
    <x-hero-section
        :backgroundImage="'assets/images/backgrounds/helpbg.jpg'"
        :breadcrumbLinks="[
            ['url' => route('/'), 'name' => 'الصفحة الرئيسية'],
            ['url' => route('helps'), 'name' => 'المساعدة']
        ]"
        :headerTitle="'المساعدة'"
        :headerDescription="'نحن هنا لمساعدتك. تصفح المعلومات أدناه أو اتصل بنا للحصول على دعم شخصي.'"
    />


    <x-container>
        <div class="flex flex-col min-w-full gap-y-10">
            <div class="min-w-full py-8 border-b border-background-200 dark:border-background-700">
                <h6 class="mb-6 text-3xl font-extrabold text-text-800 dark:text-text-200">
                    مركز المساعدة

                </h6>
                <p class="text-xl text-right text-text-500 dark:text-text-400">
                    نحن هنا لتقديم الدعم والمساعدة لك في استخدام موقعنا وخدماتنا. استكشف الأقسام التالية لمعرفة المزيد أو تواصل معنا مباشرة.
                </p>
            </div>

            <!-- FAQ List -->
            <div class="flex flex-col gap-y-10">
                <div class="flex flex-col items-start gap-y-6">
                    @foreach ($helps as $hlep)
                        <details class="w-full rounded-lg bg-background-50 dark:bg-background-700">
                            <summary
                                class="px-6 py-4 text-xl font-bold cursor-pointer text-primary-500 dark:text-primary-400 focus:outline-none focus:ring-2 focus:ring-primary-100 dark:focus:ring-primary-600">
                                {{ $hlep->title }}
                            </summary>
                            <div class="px-6 py-4 text-sm text-text-600 dark:text-text-300">
                                {{ $hlep->content }}
                            </div>
                        </details>
                    @endforeach
                    <!-- Additional Static Questions -->
                </div>
            </div>
        </div>
    </x-container>
    <!-- Main Content -->

</x-app-layout>
