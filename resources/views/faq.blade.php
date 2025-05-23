<x-app-layout>
    <!-- Hero Section -->
    <x-hero-section :backgroundImage="'assets/images/backgrounds/faqbg.jpg'" :breadcrumbLinks="[
        ['url' => route('/'), 'name' => 'الصفحة الرئيسية'],
        ['url' => route('faqs'), 'name' => 'الأسئلة الشائعة'],
    ]" :headerTitle="'الأسئلة الشائعة'" :headerDescription="'هنا تجد الإجابات على الأسئلة الأكثر شيوعًا حول استخدام موقعنا وخدماتنا.'" />

    <!-- Main Content -->
    <x-container>
        <div class="flex flex-col min-w-full gap-y-10">
            <div class="min-w-full py-8 border-b border-background-200 dark:border-background-700">
                <h6 class="mb-6 text-3xl font-extrabold text-text-800 dark:text-text-200">الأسئلة الشائعة</h6>
                <p class="text-xl text-right text-text-500 dark:text-text-400">
                    تجد هنا الإجابات على الأسئلة الأكثر شيوعًا التي قد تكون لديك حول استخدام موقعنا وخدماتنا.
                </p>
            </div>

            <!-- FAQ List -->
            <div class="flex flex-col gap-y-10">
                <div class="flex flex-col items-start gap-y-6">
                    @foreach ($faqs as $faq)
                        <details class="w-full rounded-lg bg-background-50 dark:bg-background-700">
                            <summary
                                class="px-6 py-4 text-xl font-bold cursor-pointer text-primary-500 dark:text-primary-400 focus:outline-none focus:ring-2 focus:ring-primary-100 dark:focus:ring-primary-600">
                                {{ $faq->question }}
                            </summary>
                            <div class="px-6 py-4 text-sm text-text-600 dark:text-text-300">
                                {{ $faq->answer }}
                            </div>
                        </details>
                    @endforeach
                    <!-- Additional Static Questions -->
                </div>
            </div>
        </div>
    </x-container>
</x-app-layout>
