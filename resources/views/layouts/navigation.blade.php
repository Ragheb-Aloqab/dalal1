<nav class="border-b bg-background-50 border-secondary-300 dark:bg-background-900 dark:border-secondary-700">
    <div class="flex flex-wrap items-center justify-between p-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <a href="{{ route('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <x-application-logo class="block w-auto fill-current h-9 text-text-800 dark:text-text-200" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-primary-500 dark:text-primary-400">{{ config('app.name', 'Laravel') }}</span>
        </a>
        <div class="flex items-center space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">
            @guest
                <a href="{{ route('login') }}">
                    <button type="button"
                        class="inline-flex items-center px-4 py-1 text-sm font-medium text-white transition duration-300 ease-in-out transform rounded-full bg-primary-500 hover:bg-primary-600 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 hover:scale-105">
                        تسجيل الدخول
                    </button>
                </a>
            @endguest
            @auth
                <button type="button"
                    class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">قائمة المستخدم</span>
                    <img class="w-8 h-8 rounded-full"
                        src="{{ auth()->user()->avatar ? Storage::url(auth()->user()->avatar) : asset('assets/images/profile/user-1.jpg') }}"
                        alt="user photo">
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
                        <span class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">الملف
                                الشخصي</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">الإعدادات</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">الإيرادات</a>
                        </li>

                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('تسجيل خروج') }}
                                </x-responsive-nav-link>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth

            <button data-collapse-toggle="navbar-user" type="button"
                class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">فتح القائمة الرئيسية</span>

                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul
                class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 dark:border-gray-700">
                <x-nav-link :href="route('/')" :active="request()->routeIs('/')" class="pr-4">
                    {{ __('الرئيسية') }}
                </x-nav-link>

                <x-nav-link :href="route('advertisements.index')" :active="request()->routeIs('advertisements.*')">
                    {{ __('العقارات') }}
                </x-nav-link>

                <x-nav-link :href="route('companies.index')" :active="request()->routeIs('companies.*')">
                    {{ __('المكاتب') }}
                </x-nav-link>

                <x-nav-link :href="route('cities.index')" :active="request()->routeIs('cities.*')">
                    {{ __('المدن') }}
                </x-nav-link>
                <x-nav-link :href="route('helps')" :active="request()->routeIs('helps')">
                    {{ __('المساعدة') }}
                </x-nav-link>
                <x-nav-link :href="route('terms')" :active="request()->routeIs('terms')">
                    {{ __('سياسة الخصوصية ') }}
                </x-nav-link>
            </ul>
        </div>
    </div>
</nav>
