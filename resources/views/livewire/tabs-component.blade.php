<div class="mx-auto my-2 space-y-6 max-w-7xl sm:px-6 lg:px-8">

    <div class="p-4 border shadow sm:p-4 bg-background-50 sm:rounded-lg border-secondary-300">
        <div class="overflow-x-auto smooth-scroll">
            <div class="mb-1 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex overflow-x-auto text-sm font-medium text-center" role="tablist">
                    <li class="me-2" role="presentation">
                        <button
                            class="block sm:inline-block p-4 border-b-2 rounded-t-lg @if ($activeTab === 'profile') border-purple-600 text-purple-600 dark:text-purple-500 @else hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 @endif"
                            wire:click="switchTab('profile')" type="button" role="tab"
                            aria-selected="{{ $activeTab === 'profile' }}">
                            الملف الشخصي
                        </button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="block sm:inline-block p-4 border-b-2 rounded-t-lg @if ($activeTab === 'settings') border-purple-600 text-purple-600 dark:text-purple-500 @else hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 @endif"
                            wire:click="switchTab('settings')" type="button" role="tab"
                            aria-selected="{{ $activeTab === 'settings' }}">
                            الإعدادات
                        </button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="block sm:inline-block p-4 border-b-2 rounded-t-lg @if ($activeTab === 'favorites') border-purple-600 text-purple-600 dark:text-purple-500 @else hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 @endif"
                            wire:click="switchTab('favorites')" type="button" role="tab"
                            aria-selected="{{ $activeTab === 'favorites' }}">
                            المفضلة
                        </button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="block sm:inline-block p-4 border-b-2 rounded-t-lg @if ($activeTab === 'likes') border-purple-600 text-purple-600 dark:text-purple-500 @else hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 @endif"
                            wire:click="switchTab('likes')" type="button" role="tab"
                            aria-selected="{{ $activeTab === 'likes' }}">
                            الإعجابات
                        </button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="block sm:inline-block p-4 border-b-2 rounded-t-lg @if ($activeTab === 'suggested') border-purple-600 text-purple-600 dark:text-purple-500 @else hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 @endif"
                            wire:click="switchTab('suggested')" type="button" role="tab"
                            aria-selected="{{ $activeTab === 'suggested' }}">
                            المقترحات
                        </button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="block sm:inline-block p-4 border-b-2 rounded-t-lg @if ($activeTab === 'notifications') border-purple-600 text-purple-600 dark:text-purple-500 @else hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 @endif"
                            wire:click="switchTab('notifications')" type="button" role="tab"
                            aria-selected="{{ $activeTab === 'notifications' }}">
                            الإشعارات
                        </button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="block sm:inline-block p-4 border-b-2 rounded-t-lg @if ($activeTab === 'activities') border-purple-600 text-purple-600 dark:text-purple-500 @else hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 @endif"
                            wire:click="switchTab('activities')" type="button" role="tab"
                            aria-selected="{{ $activeTab === 'activities' }}">
                            الأنشطة
                        </button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button
                            class="block sm:inline-block p-4 border-b-2 rounded-t-lg @if ($activeTab === 'followings') border-purple-600 text-purple-600 dark:text-purple-500 @else hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 @endif"
                            wire:click="switchTab('followings')" type="button" role="tab"
                            aria-selected="{{ $activeTab === 'followings' }}">
                            المتابعات
                        </button>
                    </li>
                </ul>
            </div>


            <style>
                /* Custom scrollbar style */
                .smooth-scroll::-webkit-scrollbar {
                    width: 8px;
                    /* Width of the scrollbar */
                }

                .smooth-scroll::-webkit-scrollbar-thumb {
                    background: #888;
                    /* Color of the scrollbar thumb */
                    border-radius: 10px;
                    /* Round the edges of the thumb */
                }

                .smooth-scroll::-webkit-scrollbar-thumb:hover {
                    background: #555;
                    /* Color of the scrollbar thumb on hover */
                }

                .smooth-scroll::-webkit-scrollbar-track {
                    background: #f1f1f1;
                    /* Background color of the scrollbar track */
                    border-radius: 10px;
                    /* Round the edges of the track */
                }

                /* To remove the scrollbar completely */
                .smooth-scroll {
                    overflow: hidden;
                }
            </style>
        </div>
    </div>
    <div class="">
        <div id="default-styled-tab-content">
            <div class="@if ($activeTab !== 'profile') hidden @endif  rounded-lg " role="tabpanel">
                <div class="py-2">
                    <div class="my-4 border shadow bg-background-50 sm:rounded-lg border-secondary-300 sm:p-4">
                        <div class="p-4">
                            <section>
                                <header>
                                    <h2 class="text-lg font-medium text-text-900"> معلومات الملف الشخصي </h2>

                                    <p class="mt-1 text-sm text-text-600">
                                        حدّث معلومات ملفك الشخصي وعنوان بريدك الإلكتروني.
                                    </p>
                                </header>

                                <div class="grid grid-cols-12 md:gap-6 gap-y-6">

                                    <div class="col-span-12 mb-2">
                                        <div class="p-4">


                                            <!-- Image Display -->
                                            <img src="{{ $pasteAvatar ? Storage::url($pasteAvatar) : asset('assets/images/profile/user-1.jpg') }}"
                                                alt="Commercial Certificate Image" class="w-32 h-32 rounded-full">
                                            <div class="w-32">
                                                <span
                                                    class=" flex items-center px-0.5 m-1 rounded-sm bg-primary justify-center  ">
                                                    <span class="flex">
                                                        <button type="button"
                                                            class="flex justify-between p-1 mx-1 text-dark edit"
                                                            onclick="document.getElementById('avatar_input').click()">
                                                            <i
                                                                class="text-lg ti ti-edit text-bodytext dark:text-darklink"></i>
                                                        </button>
                                                        <button type="submit" wire:click="updateAvatar"
                                                            class="mx-1 text-lg text-bodytext focus:outline-non e">
                                                            <i
                                                                class="ti ti-device-floppy text-bodytext dark:text-darklink"></i>
                                                        </button>
                                                    </span>
                                                </span>
                                            </div>

                                            <!-- Hidden File Input -->
                                            @error('avatar')
                                                <p class="mt-2 text-sm text-error" id="email-error-helper">
                                                    {{ $message }}</p>
                                            @enderror
                                            @if (session()->has('avatar'))
                                                <p class="mt-2 text-sm text-success" id="email-success-helper">
                                                    {{ session('avatar') }}</p>
                                            @endif
                                            <input type="file" id="avatar_input" wire:model="avatar" class="hidden">
                                            <!-- Show loading state or errors if any -->
                                        </div>
                                    </div>
                                    <!-- Name Field -->
                                    <div class="col-span-12 md:col-span-6">
                                        <div class="mb-2">
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-dark dark:text-white">الاسم</label>
                                            <div class="relative">
                                                <input type="text" id="name" wire:model.lazy="name"
                                                    class="py-2.5 px-4 block w-full rounded-md text-sm
                                                @error('name') border-red-500 focus:border-red-500 focus:ring-red-500
                                                @else border-green-500 focus:border-green-500  @enderror dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                                    aria-describedby="name-error-helper">
                                                <div class="absolute inset-y-0 flex items-center end-0 pe-3"
                                                    wire:click="updateName">
                                                    <button type="submit" wire:click="updateName"
                                                        class="text-lg text-bodytext focus:outline-none">
                                                        <i class="ti ti-device-floppy"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            @error('name')
                                                <p class="mt-2 text-sm text-red-500" id="name-error-helper">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                            @if (session()->has('name'))
                                                <p class="mt-2 text-sm text-green-500" id="name-success-helper">
                                                    {{ session('name') }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Email Field -->
                                    <div class="col-span-12 md:col-span-6">
                                        <div class="mb-2">
                                            <label for="email"
                                                class="block mb-2 text-sm font-medium text-dark dark:text-white">البريد
                                                الإلكتروني</label>
                                            <div class="relative">
                                                <input type="email" id="email" wire:model.lazy="email"
                                                    class="py-2.5 px-4 block w-full rounded-md text-sm
                                                @error('email') border-red-500 focus:border-red-500 focus:ring-red-500
                                                @else border-green-500 focus:border-green-500 focus:ring-green-500 @enderror dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                                    aria-describedby="email-error-helper">
                                                <div class="absolute inset-y-0 flex items-center end-0 pe-3"
                                                    wire:click="updateEmail">
                                                    <button type="submit" wire:click="updateEmail"
                                                        class="text-lg text-bodytext focus:outline-none">
                                                        <i class="ti ti-device-floppy"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            @error('email')
                                                <p class="mt-2 text-sm text-red-500" id="email-error-helper">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                            @if (session()->has('email'))
                                                <p class="mt-2 text-sm text-green-500" id="email-success-helper">
                                                    {{ session('email') }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Phone Number Field -->
                                    <div class="col-span-12 md:col-span-6">
                                        <div class="mb-2">
                                            <label for="phone"
                                                class="block mb-2 text-sm font-medium text-dark dark:text-white">رقم
                                                الهاتف</label>
                                            <div class="relative">
                                                <input type="text" id="phone" wire:model.lazy="phone"
                                                    class="py-2.5 px-4 block w-full rounded-md text-sm
                                                @error('phone') border-red-500 focus:border-red-500 focus:ring-red-500
                                                @else border-green-500 focus:border-green-500 focus:ring-green-500 @enderror dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                                    aria-describedby="phone-error-helper">
                                                <div class="absolute inset-y-0 flex items-center end-0 pe-3"
                                                    wire:click="updatePhone">
                                                    <button type="submit" wire:click="updatePhone"
                                                        class="text-lg text-bodytext focus:outline-none">
                                                        <i class="ti ti-device-floppy"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            @error('phone')
                                                <p class="mt-2 text-sm text-red-500" id="phone-error-helper">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                            @if (session()->has('phone'))
                                                <p class="mt-2 text-sm text-green-500" id="phone-success-helper">
                                                    {{ session('phone') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>
                    <div class="my-4 border shadow sm:p-8 bg-background-50 sm:rounded-lg border-secondary-300">
                        <div class="p-4">
                            <section>
                                <header>
                                    <h2 class="text-lg font-medium text-text-900">تحديث كلمة المرور</h2>
                                    <p class="mt-1 text-sm text-text-600">
                                        تأكد من أن حسابك يستخدم كلمة مرور طويلة وعشوائية لضمان الأمان.
                                    </p>
                                </header>

                                <!-- Current Password Field -->
                                <div class="col-span-12 md:col-span-6">
                                    <div class="mb-4">
                                        <label for="current_password"
                                            class="block mb-2 text-sm font-medium text-dark dark:text-white">كلمة
                                            المرور الحالية</label>
                                        <div class="relative">
                                            <input type="password" id="current_password"
                                                wire:model.lazy="current_password"
                                                class="py-2.5 px-4 block w-full rounded-md text-sm
                                                   @error('current_password') border-red-500 focus:border-red-500 focus:ring-red-500
                                                   @else border-green-500 focus:border-green-500 focus:ring-green-500 @enderror dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                                aria-describedby="current-password-error-helper">
                                        </div>
                                        @error('current_password')
                                            <p class="mt-2 text-sm text-red-500" id="current-password-error-helper">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- New Password Field -->
                                <div class="col-span-12 md:col-span-6">
                                    <div class="mb-4">
                                        <label for="new_password"
                                            class="block mb-2 text-sm font-medium text-dark dark:text-white">كلمة
                                            المرور الجديدة</label>
                                        <div class="relative">
                                            <input type="password" id="new_password" wire:model.lazy="new_password"
                                                class="py-2.5 px-4 block w-full rounded-md text-sm
                                                   @error('new_password') border-red-500 focus:border-red-500 focus:ring-red-500
                                                   @else border-green-500 focus:border-green-500 focus:ring-green-500 @enderror dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                                aria-describedby="new-password-error-helper">
                                        </div>
                                        @error('new_password')
                                            <p class="mt-2 text-sm text-red-500" id="new-password-error-helper">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Confirm Password Field -->
                                <div class="col-span-12 md:col-span-6">
                                    <div class="mb-4">
                                        <label for="confirm_password"
                                            class="block mb-2 text-sm font-medium text-dark dark:text-white">تأكيد كلمة
                                            المرور</label>
                                        <div class="relative">
                                            <input type="password" id="confirm_password"
                                                wire:model.lazy="confirm_password"
                                                class="py-2.5 px-4 block w-full rounded-md text-sm
                                                   @error('confirm_password') border-red-500 focus:border-red-500 focus:ring-red-500
                                                   @else border-green-500 focus:border-green-500 focus:ring-green-500 @enderror dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                                aria-describedby="confirm-password-error-helper">
                                        </div>
                                        @error('confirm_password')
                                            <p class="mt-2 text-sm text-red-500" id="confirm-password-error-helper">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="flex mt-6">
                                    {{-- <x-secondary-button x-on:click="$dispatch('close')"
                                        class="bg-background-100 text-text-700 hover:bg-background-200">
                                        {{ __('إلغاء') }}
                                    </x-secondary-button> --}}

                                    <x-danger-button
                                        class="text-white bg-danger-500 hover:bg-danger-600 focus:ring-danger-700"
                                        wire:click.prevent="updatePassword">
                                        {{ __('تحديث كلمة المرور') }}
                                    </x-danger-button>
                                </div>

                                @if (session()->has('password_success'))
                                    <p class="mt-4 text-sm text-green-500">{{ session('password_success') }}</p>
                                @endif

                                @if (session()->has('password_error'))
                                    <p class="mt-4 text-sm text-red-500">{{ session('password_error') }}</p>
                                @endif
                            </section>
                        </div>
                    </div>
                    <div class="p-4 my-4 border shadow sm:p-8 bg-background-50 sm:rounded-lg border-secondary-300">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>



    <div class="@if ($activeTab !== 'settings') hidden @endif p-4 border shadow bg-background-50 sm:rounded-lg border-secondary-300"
        role="tabpanel">
        <p class="text-sm text-gray-500 dark:text-gray-400">هذا هو المحتوى المرتبط بـ<strong
                class="font-medium text-gray-800 dark:text-white">الإعدادات</strong>.</p>

        <div class="min-h-[400px]">

        </div>
    </div>
    <div class="@if ($activeTab !== 'favorites') hidden @endif p-4 border shadow bg-background-50 sm:rounded-lg border-secondary-300"
        role="tabpanel">
        <p class="text-sm text-gray-500 dark:text-gray-400">هذا هو المحتوى المرتبط بـ<strong
                class="font-medium text-gray-800 dark:text-white">المفضلة</strong>.</p>
        <div class="min-h-[400px]">
            @livewire('user-favorites')
        </div>
    </div>
    <div class="@if ($activeTab !== 'likes') hidden @endif p-4 border shadow bg-background-50 sm:rounded-lg border-secondary-300"
        role="tabpanel">
        <p class="text-sm text-gray-500 dark:text-gray-400">هذا هو المحتوى المرتبط بـ<strong
                class="font-medium text-gray-800 dark:text-white">الإعجابات</strong>.</p>
        <div class="min-h-[400px]">

        </div>
    </div>
    <div class="@if ($activeTab !== 'suggested') hidden @endif p-4 border shadow bg-background-50 sm:rounded-lg border-secondary-300"
        role="tabpanel">
        <p class="text-sm text-gray-500 dark:text-gray-400">هذا هو المحتوى المرتبط بـ<strong
                class="font-medium text-gray-800 dark:text-white">المقترحات</strong>.</p>
        <div class="min-h-[400px]">
        </div>
    </div>
    <div class="@if ($activeTab !== 'notifications') hidden @endif p-4 border shadow bg-background-50 sm:rounded-lg border-secondary-300"
        role="tabpanel">
        <p class="text-sm text-gray-500 dark:text-gray-400">هذا هو المحتوى المرتبط بـ<strong
                class="font-medium text-gray-800 dark:text-white">الإشعارات</strong>.</p>
        <div class="min-h-[400px]">
            @livewire('user-notification')

        </div>
    </div>
    <div class="@if ($activeTab !== 'activities') hidden @endif p-4 border shadow bg-background-50 sm:rounded-lg border-secondary-300"
        role="tabpanel">
        <div class="min-h-[400px] p-4">

            <ol class="relative border-gray-200 border-s dark:border-gray-700">
                <li class="mb-10 ms-6">
                    <span
                        class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                        <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </span>
                    <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                        Flowbite Application UI v2.0.0 <span
                            class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ms-3">Latest</span>
                    </h3>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released
                        on January 13th, 2022</time>
                    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Get access to over
                        20+ pages including a dashboard layout, charts, kanban board, calendar, and pre-order
                        E-commerce & Marketing pages.</p>
                    <a href="#"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-100 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700"><svg
                            class="w-3.5 h-3.5 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z" />
                            <path
                                d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                        </svg> Download ZIP</a>
                </li>
                <li class="mb-10 ms-6">
                    <span
                        class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                        <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </span>
                    <h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">Flowbite Figma v1.3.0
                    </h3>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released
                        on December 7th, 2021</time>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">All of the pages and
                        components are first designed in Figma and we keep a parity between the two versions
                        even as we update the project.</p>
                </li>
                <li class="ms-6">
                    <span
                        class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                        <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </span>
                    <h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">Flowbite Library
                        v1.2.2</h3>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released
                        on December 2nd, 2021</time>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">Get started with dozens
                        of web components and interactive elements built on top of Tailwind CSS.</p>
                </li>
            </ol>


        </div>
    </div>
    <div class="@if ($activeTab !== 'followings') hidden @endif p-4 border shadow bg-background-50 sm:rounded-lg border-secondary-300"
        role="tabpanel">
        <p class="text-sm text-gray-500 dark:text-gray-400">هذا هو المحتوى المرتبط بـ<strong
                class="font-medium text-gray-800 dark:text-white">المتابعات</strong>.</p>
        <div class="min-h-[400px]">
            <div class="grid gap-2 lg:grid-cols-3 sm:grid-cols-2 xs:grid-cols-1">



                @forelse ($followings as $following)
                    <x-card>
                        <div class="flex w-full">
                            <x-avatar :avatar="$following->logo" :name="$following->name" width="10" height="10" />
                            <div class="flex flex-col flex-grow mx-2 space-y-1">
                                <a rel="noopener noreferrer" href="#" class="text-sm font-semibold">
                                    {{ $following->name }}
                                </a>
                                <span class="text-xs dark:text-gray-600">{{ $following->user->name }}</span>
                            </div>
                            <div class="">
                                <button type="button" wire:click="toggleFollow({{ $following->id }})"
                                    class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                                    unfollowing
                                </button>
                            </div>
                        </div>
                    </x-card>
                @empty
                @endforelse




            </div>
        </div>

    </div>
</div>
