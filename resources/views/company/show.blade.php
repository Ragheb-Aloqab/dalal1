<x-app-layout>
    <div class="">
        <!-- Background Section -->
        <div class="relative h-[60vh]"
            style="background-image: url('{{ asset('assets/images/backgrounds/profilebg.jpg') }}')">
            <div class="relative h-full overflow-hidden">
                <div class="absolute inset-0 flex items-center justify-center text-text-50">
                    <div id="slider" class="relative w-full h-full">
                        <div id="slideContainer"
                            class="absolute inset-0 transition-all duration-700 ease-in-out bg-center bg-cover opacity-70 ">
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute inset-0">
                <div class="h-full">
                    <div class="flex items-center max-w-screen-xl p-4 mx-auto">
                        <div class="flex items-center">
                            <div class="px-2">
                                <x-avatar :avatar="$user->logo" :name="$user->avatar" width="32" height="32" />
                            </div>
                            <div class="">
                                <p class="text-lg font-semibold text-text-800 dark:text-text-200">
                                    {{ $user->name }}
                                </p>
                                <p class="p-1 rounded-md text-text-800 bg-background-200 dark:bg-background-700">
                                    {{ $user->user->name }}
                                </p>
                            </div>
                        </div>
                    </div>
                    {{-- resources/views/components/statistics-cards.blade.php --}}
                    <div class="flex items-center max-w-screen-xl p-4 mx-auto">
                        <div class="grid grid-cols-4 gap-4 py-6"">
                            <!-- المباني (Buildings) -->
                            <div
                                class="flex flex-col items-center p-3 transition-shadow duration-300 rounded-lg shadow bg-background-100 dark:bg-background-800 hover:shadow-lg">
                                <!-- أيقونة المباني (Buildings Icon) -->
                                <i class="mb-1 text-4xl text-secondary-600 dark:text-secondary-400 ti ti-building"
                                    aria-label="مباني"></i>
                                <h3 class="text-2xl font-bold text-secondary-600 dark:text-secondary-400">150+</h3>
                                <p class="text-md text-text-500 dark:text-text-300">مباني</p>
                            </div>

                            <!-- الشقق (Apartments) -->
                            <div
                                class="flex flex-col items-center p-3 transition-shadow duration-300 rounded-lg shadow bg-background-100 dark:bg-background-800 hover:shadow-lg">
                                <!-- أيقونة الشقق (Apartments Icon) -->
                                <i class="mb-1 text-4xl text-accent-600 dark:text-accent-400 ti ti-home"
                                    aria-label="شقق"></i>
                                <h3 class="text-2xl font-bold text-accent-600 dark:text-accent-400">500+</h3>
                                <p class="text-md text-text-500 dark:text-text-300">شقق</p>
                            </div>

                            <!-- الأراضي (Land) -->
                            <div
                                class="flex flex-col items-center p-3 transition-shadow duration-300 rounded-lg shadow bg-background-100 dark:bg-background-800 hover:shadow-lg">
                                <!-- أيقونة الأراضي (Land Icon) -->
                                <i class="mb-1 text-4xl text-green-600 dark:text-green-400 ti ti-land"
                                    aria-label="أراضي"></i>
                                <h3 class="text-2xl font-bold text-green-600 dark:text-green-400">300+</h3>
                                <p class="text-md text-text-500 dark:text-text-300">أراضي</p>
                            </div>

                            <!-- المتابعين (Followings) -->
                            <div
                                class="flex flex-col items-center p-3 transition-shadow duration-300 rounded-lg shadow bg-background-100 dark:bg-background-800 hover:shadow-lg">
                                <!-- أيقونة المتابعين (Followings Icon) -->
                                <i class="mb-1 text-4xl text-purple-600 dark:text-purple-400 ti ti-followers"
                                    aria-label="متابعين"></i>
                                <h3 class="text-2xl font-bold text-purple-600 dark:text-purple-400">5K+</h3>
                                <p class="text-md text-text-500 dark:text-text-300">متابعين</p>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>

        <!-- Navigation Bar -->
        <div
            class="sticky top-0 z-50 border-b border-secondary-300 dark:border-secondary-700 bg-background-50 dark:bg-background-900">
            <x-content class="p-4">
                <div class="flex items-center justify-between">
                    <div class="btn">
                        <div class="flex items-center">
                            <div class="px-2">
                                <x-avatar :avatar="$user->logo" :name="$user->avatar" width="10" height="10" />
                            </div>
                            <div class="px-1">
                                <p class="text-lg font-semibold text-text-800 dark:text-text-200">
                                    {{ $user->name }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-2 rtl:space-x-reverse">
                        <!-- Send Message Button -->
                        <button
                            class="flex items-center justify-center mx-1 transition-colors rounded text-primary-500 hover:bg-primary-100 dark:text-primary-400 dark:hover:bg-primary-800 focus:outline-none focus:ring-2 focus:ring-primary-500"
                            type="button" onclick="sendMessage()">
                            <div
                                class="inline-flex items-center h-8 overflow-hidden border rounded text-primary-500 dark:text-primary-400 border-primary-500 dark:border-primary-700">
                                <span class="px-5 py-1.5 text-[12px] font-medium">
                                    رسالة جديدة
                                </span>
                                <i class="pl-2 text-primary-500 dark:text-primary-400 ti ti-message-circle fa-lg"></i>
                            </div>
                        </button>

                        <!-- Make Call Button -->
                        <button
                            class="flex items-center justify-center mx-1 transition-colors rounded text-primary-500 hover:bg-primary-100 dark:text-primary-400 dark:hover:bg-primary-800 focus:outline-none focus:ring-2 focus:ring-primary-500"
                            type="button" onclick="makeCall()">
                            <div
                                class="inline-flex items-center h-8 overflow-hidden border rounded text-primary-500 dark:text-primary-400 border-primary-500 dark:border-primary-700">
                                <span class="px-5 py-1.5 text-[12px] font-medium">
                                    اتصال
                                </span>
                                <i class="pl-2 text-primary-500 dark:text-primary-400 ti ti-phone-call fa-lg"></i>
                            </div>
                        </button>

                        <!-- WhatsApp Message Button -->
                        <button
                            class="flex items-center justify-center mx-1 transition-colors rounded text-accent-500 hover:bg-accent-100 dark:text-accent-400 dark:hover:bg-accent-800 focus:outline-none focus:ring-2 focus:ring-accent-500"
                            type="button" onclick="sendWhatsAppMessage()">
                            <div
                                class="inline-flex items-center h-8 overflow-hidden border rounded text-accent-500 dark:text-accent-400 border-accent-500 dark:border-accent-700">
                                <span class="px-5 py-1.5 text-[12px] font-medium">
                                    رسالة واتساب
                                </span>
                                <i class="pl-2 text-accent-500 dark:text-accent-400 ti ti-brand-whatsapp fa-lg"></i>
                            </div>
                        </button>
                    </div>
                </div>
            </x-content>
        </div>

        <!-- Content Section -->

        <x-content class="">
            @livewire('ads-cards-container', ['providerId' => $user->userable_id])
        </x-content>

    </div>
</x-app-layout>
