<x-app-layout>
    <!-- Hero Section -->
    <x-hero-section
        :backgroundImage="'assets/images/backgrounds/profilebg.jpg'"
        :breadcrumbLinks="[
            ['url' => route('/'), 'name' => 'الصفحة الرئيسية'],
            ['url' => route('terms'), 'name' => 'الشروط والأحكام'],
        ]"
        :headerTitle="'الشروط والأحكام'"
        :headerDescription="'يرجى قراءة الشروط والأحكام التالية بعناية. باستخدام خدماتنا، فإنك توافق على الالتزام بهذه الشروط.'"
    />

    <!-- Main Content -->
    <x-container>
        <div class="flex flex-col min-w-full gap-y-10">
            <div class="min-w-full py-8 border-b border-background-200 dark:border-background-700">
                <h6 class="mb-6 text-3xl font-extrabold text-text-800 dark:text-text-200">الشروط &amp; والأحكام</h6>
                <p class="text-xl text-right text-text-500 dark:text-text-400">
                    يرجى قراءة الشروط والأحكام التالية بعناية. باستخدام خدماتنا، فإنك توافق على الالتزام بهذه الشروط.
                </p>
            </div>
            <div class="flex flex-col gap-y-10">
                <div class="flex flex-col items-start min-w-full gap-y-6">
                    @foreach ($terms as $term)
                        <div class="flex flex-col items-start gap-y-3">
                            <p class="text-xl font-bold text-primary-500 dark:text-primary-400">{{ $term->header }}</p>
                            <p class="text-sm text-text-600 dark:text-text-300">{{ $term->content }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-container>
</x-app-layout>
