{{-- resources/views/livewire/search-properties.blade.php --}}
<div class="p-4">

    <!-- Search Inputs Section -->
    <div class="flex flex-col gap-4 mb-4 md:flex-row">
        <!-- Search Input with loading spinner -->
        <div class="relative flex-1 mt-1 rounded-md shadow-sm">
            <input type="text" wire:model.live="search" placeholder="ابحث عن أي كلمة"
                class="block w-full px-3 rounded-md bg-background-50 border-secondary-300 text-text-700 dark:bg-background-800 dark:border-secondary-600 dark:text-text-300 focus:border-primary-500 focus:ring-primary-500 sm:text-sm">
            <!-- Loading Spinner for Search Input -->
            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                <svg wire:loading wire:target="search" class="w-5 h-5 text-primary-500 animate-spin"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                </svg>
            </div>
        </div>

        <!-- City Input with loading spinner -->
        <div class="relative flex-1 mt-1 rounded-md shadow-sm">
            <input type="text" wire:model.live="city" placeholder="البحث بالمدينة"
                class="block w-full px-3 rounded-md bg-background-50 border-secondary-300 text-text-700 dark:bg-background-800 dark:border-secondary-600 dark:text-text-300 focus:border-primary-500 focus:ring-primary-500 sm:text-sm">
            <!-- Loading Spinner for City Input -->
            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                <svg wire:loading wire:target="city" class="w-5 h-5 text-primary-500 animate-spin"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                </svg>
            </div>
        </div>

        <!-- Property Type Input with spinner animation -->
        <div class="relative flex-1 mt-1 rounded-md shadow-sm">
            <select wire:model.live="propertyType"
                class="block w-full px-3 rounded-md bg-background-50 border-secondary-300 text-text-700 dark:bg-background-800 dark:border-secondary-600 dark:text-text-300 focus:border-primary-500 focus:ring-primary-500 sm:text-sm">
                <option value="">{{ __('اختر نوع العقار') }}</option>
                <option value="rent">إيجار</option>
                <option value="sale">للبيع</option>
            </select>
            <!-- Loading Spinner for Property Type Select -->
            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                <svg wire:loading wire:target="propertyType" class="w-5 h-5 text-primary-500 animate-spin"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Ads and Sidebar Section -->
    <div class="grid grid-cols-1 gap-4 md:grid-cols-4 lg:grid-cols-4">
        <!-- Ads Listings -->
        <div class="col-span-3">
            @forelse ($ads as $ad)
                <div class="p-4 mb-4 border rounded-lg shadow-md border-secondary-300 bg-background-50 dark:bg-background-800">
                    <x-ads-card :ad="$ad" />
                </div>
            @empty
                <div class="text-text-600 dark:text-text-300">لم يتم العثور على إعلانات.</div>
            @endforelse

            <!-- Pagination -->
            <div class="mt-4">
                {{ $ads->links() }} <!-- عرض روابط التنقل -->
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-span-1">
            <x-card :p="0" class="relative bg-background-50 dark:bg-background-800 border-secondary-300 dark:border-secondary-700">
                <div class="flex items-center justify-center">
                    <img src="{{ asset('assets/images/svgs/search-icon-map.svg') }}" alt="أيقونة البحث"
                        class="w-full h-auto rounded-lg" />
                    <button type="button"
                        class="absolute inline-flex items-center px-2 py-0.5 text-sm font-medium text-primary-700 border border-primary-700 rounded-lg focus:ring-4 focus:outline-none focus:ring-primary-300 dark:text-primary-500 dark:border-primary-700 dark:focus:ring-primary-800 opacity-80 bg-transparent hover:bg-transparent bottom-4">
                        <span
                            class="inline-flex items-center justify-center w-8 h-8 text-xs font-semibold rounded-full text-primary-800 bg-primary-200 ms-2">
                            <!-- SVG icon omitted for brevity -->
                        </span>
                        البحث باستخدام الخريطة
                    </button>
                </div>
            </x-card>

            <!-- Informational Section -->
            <div class="mt-6">
                <h1 class="mb-4 text-3xl font-bold text-accent-600">نبذة تعريفية</h1>

                <div class="mb-6">
                    <h2 class="mb-2 text-lg font-semibold text-text-800 dark:text-text-200">أنواع العقارات:</h2>
                    <!-- Add content here -->
                </div>

                <div class="mb-3">
                    <h2 class="mb-2 text-lg font-semibold text-text-800 dark:text-text-200">مناطق العمل:</h2>
                    <!-- Add content here -->
                </div>

                <div class="mb-3">
                    <h2 class="mb-2 text-lg font-semibold text-text-800 dark:text-text-200">عقارات:</h2>
                    <!-- Add content here -->
                </div>

                <div class="mb-3">
                    <h2 class="mb-2 text-lg font-semibold text-text-800 dark:text-text-200">الوصف:</h2>
                    <p class="text-text-700 dark:text-text-300">
                        ولدت فكرة إنشاء الشركة من خلال دراسة السوق العقاري في المملكة العربية السعودية وتلبية الاحتياجات
                        التي تساعد في تطوير النشاط العقاري. <span class="cursor-pointer text-accent-600">اقرأ أقل</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>

@push('styles')
<style>
    .input-container {
        position: relative;
        overflow: hidden;
    }

    .loading-input {
        transition: all 0.3s ease;
        width: 100%;
        padding: 8px 10px;
        border: 1px solid var(--secondary-300);
        border-radius: 5px;
        background-color: var(--background-50);
        color: var(--text-700);
    }

    .loading-bar {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background-color: var(--primary-500);
        transition: width 0.3s ease-out;
    }

    .loading-bar[wire\:loading] {
        width: 100%; /* Expand to full width when the associated input is loading */
    }
</style>
@endpush
