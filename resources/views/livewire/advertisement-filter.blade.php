{{-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
<div>
    <!-- شريط الفلاتر -->
    <div class="sticky top-0 z-10 p-4 bg-white border-b-2 border-gray-200 shadow-xs">
        <x-content>
            <form>
                <!-- Responsive Filters Container -->
                <div x-data="{ open: false }" class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">

                    <!-- Toggle Button for Small Screens -->
                    <div class="flex justify-beween md:hidden">
                        <div class="flex-1 px-2">
                            <div class="relative w-full">
                                <label for="search" class="block text-sm font-medium text-gray-700">بحث</label>
                                <div class="relative rounded-md shadow-sm">
                                    <input type="text" id="search" wire:model.lazy="search"
                                        placeholder="ابحث بالاسم أو البريد الإلكتروني أو الهاتف"
                                        class="block w-full pr-10 text-right border-gray-300 rounded-md focus:border-blue-500 focus:ring-blue-500 sm:text-sm">

                                    <!-- Search Icon -->
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <i class="text-red-400 fas fa-search"></i>
                                    </div>

                                    <!-- Loading Spinner for Search -->
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <svg wire:loading wire:target="search"
                                            class="w-5 h-5 text-gray-500 animate-spin"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <label for="search" class="block text-sm font-medium text-gray-700">&nbsp;</label>

                            <button type="button" @click="open = !open"
                                class="px-4 py-2 text-white bg-blue-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                {{-- {{ __('Filters') }}. --}}
                                <span>
                                    <i
                                        :class="open ? 'ti ti-menu transition-transform duration-300 ease-in-out' :
                                            'ti ti-menu transition-transform duration-300 ease-in-out'"></i>
                                </span>
                            </button>
                        </div>

                    </div>

                    <!-- Filters Menu for Small Screens -->
                    <div x-show="open" @click.away="open = false" class="w-full col-span-1 md:hidden">
                        <!-- اختر المدينة -->
                        <div class="relative">
                            <label for="city_id" class="block text-sm font-medium text-gray-700">اختر المدينة</label>
                            @php
                                $cities = App\Models\City::all();
                            @endphp
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <select id="city_id" name="city_id"
                                    class="block w-full px-3 text-right border-gray-300 rounded-md focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    required wire:model.lazy="cityId">
                                    <option value="">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('اختر المدينة') }}
                                    </option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"
                                            {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <!-- Loading Spinner for City Select -->
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg wire:loading wire:target="cityId" class="w-5 h-5 text-blue-500 animate-spin"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- نوع العقار -->
                        <div class="mt-4">
                            <label for="property_type" class="block text-sm font-medium text-gray-700">نوع
                                العقار</label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <select id="property_type" name="property_type"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    required wire:model.lazy="type">
                                    <option value="">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('اختر نوع العقار') }}
                                    </option>
                                    <option value="rent">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;للايجار
                                    </option>
                                    <option value="sale">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        للبيع


                                    </option>
                                </select>

                                <!-- Loading Spinner for Property Type -->
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg wire:loading wire:target="type" class="w-5 h-5 text-blue-500 animate-spin"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- البحث -->
                        <div class="relative mt-4">
                            <label for="search" class="block text-sm font-medium text-gray-700">بحث</label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="text" id="search" wire:model.lazy="search"
                                    placeholder="ابحث بالاسم أو البريد الإلكتروني أو الهاتف"
                                    class="block w-full pr-10 text-right border-gray-300 rounded-md focus:border-blue-500 focus:ring-blue-500 sm:text-sm">

                                <!-- Search Icon -->
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="text-red-400 fas fa-search"></i>
                                </div>

                                <!-- Loading Spinner for Search -->
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg wire:loading wire:target="search" class="w-5 h-5 text-gray-500 animate-spin"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- السعر -->
                        <div class="relative mt-4">
                            <label class="block text-sm font-medium text-gray-700">السعر</label>
                            <div class="flex mt-1 space-x-2">
                                <!-- Min Price -->
                                <div class="relative w-1/2">
                                    <input type="number" wire:model.lazy="minPrice" placeholder="من"
                                        class="block w-full pr-10 text-right border-gray-300 rounded-md focus:border-blue-500 focus:ring-blue-500 sm:text-sm">

                                    <!-- Loading Spinner for Min Price -->
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <svg wire:loading wire:target="minPrice"
                                            class="w-5 h-5 text-blue-500 animate-spin"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>

                                <!-- Max Price -->
                                <div class="relative w-1/2">
                                    <input type="number" wire:model.lazy="maxPrice" placeholder="إلى"
                                        class="block w-full pr-10 mr-2 text-right border-gray-300 rounded-md focus:border-blue-500 focus:ring-blue-500 sm:text-sm">

                                    <!-- Loading Spinner for Max Price -->
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <svg wire:loading wire:target="maxPrice"
                                            class="w-5 h-5 text-blue-500 animate-spin"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- الموقع -->
                        <div class="relative mt-4">
                            <label for="location" class="block text-sm font-medium text-gray-700">الموقع</label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="text" id="location" wire:model.lazy="location"
                                    placeholder="ابحث بالموقع"
                                    class="block w-full pr-10 text-right border-gray-300 rounded-md focus:border-blue-500 focus:ring-blue-500 sm:text-sm">

                                <!-- Search Icon -->
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="text-red-400 fas fa-search"></i>
                                </div>

                                <!-- Loading Spinner for Location -->
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg wire:loading wire:target="location"
                                        class="w-5 h-5 text-gray-500 animate-spin" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Desktop Filters (Visible on md and larger screens) -->
                    <div class="hidden col-span-4 md:block lg:col-span-4">
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
                            <!-- اختر المدينة -->
                            <div class="relative">
                                <label for="city_id" class="block text-sm font-medium text-gray-700">اختر
                                    المدينة</label>
                                @php
                                    $cities = App\Models\City::all();
                                @endphp
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <select id="city_id" name="city_id"
                                        class="block w-full px-3 text-right border-gray-300 rounded-md focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                        required wire:model.lazy="cityId">
                                        <option value="">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('اختر المدينة') }}
                                        </option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}"
                                                {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <!-- Loading Spinner for City Select -->
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <svg wire:loading wire:target="cityId"
                                            class="w-5 h-5 text-blue-500 animate-spin"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- نوع العقار -->
                            <div class="relative">
                                <label for="property_type" class="block text-sm font-medium text-gray-700">نوع
                                    العقار</label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <select id="property_type" name="property_type"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                        required wire:model.lazy="type">
                                        <option value="">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('اختر نوع العقار') }}
                                        </option>
                                        <option value="rent">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;للايجار
                                        </option>
                                        <option value="sale">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            للبيع

                                        </option>
                                    </select>

                                    <!-- Loading Spinner for Property Type -->
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <svg wire:loading wire:target="type"
                                            class="w-5 h-5 text-blue-500 animate-spin"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- البحث -->
                            <div class="relative">
                                <label for="search" class="block text-sm font-medium text-gray-700">بحث</label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <input type="text" id="search" wire:model.lazy="search"
                                        placeholder="ابحث بالاسم أو البريد الإلكتروني أو الهاتف"
                                        class="block w-full pr-10 text-right border-gray-300 rounded-md focus:border-blue-500 focus:ring-blue-500 sm:text-sm">

                                    <!-- Search Icon -->
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <i class="text-red-400 fas fa-search"></i>
                                    </div>

                                    <!-- Loading Spinner for Search -->
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <svg wire:loading wire:target="search"
                                            class="w-5 h-5 text-gray-500 animate-spin"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- السعر -->
                            <div class="relative">
                                <label class="block text-sm font-medium text-gray-700">السعر</label>
                                <div class="flex mt-1 space-x-2">
                                    <!-- Min Price -->
                                    <div class="relative w-1/2">
                                        <input type="number" wire:model.lazy="minPrice" placeholder="من"
                                            class="block w-full pr-10 text-right border-gray-300 rounded-md focus:border-blue-500 focus:ring-blue-500 sm:text-sm">

                                        <!-- Loading Spinner for Min Price -->
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                            <svg wire:loading wire:target="minPrice"
                                                class="w-5 h-5 text-blue-500 animate-spin"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                                    stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor"
                                                    d="M4 12a8 8 0 018-8v8H4z"></path>
                                            </svg>
                                        </div>
                                    </div>

                                    <!-- Max Price -->
                                    <div class="relative w-1/2">
                                        <input type="number" wire:model.lazy="maxPrice" placeholder="إلى"
                                            class="block w-full pr-10 mr-2 text-right border-gray-300 rounded-md focus:border-blue-500 focus:ring-blue-500 sm:text-sm">

                                        <!-- Loading Spinner for Max Price -->
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                            <svg wire:loading wire:target="maxPrice"
                                                class="w-5 h-5 text-blue-500 animate-spin"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                                    stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor"
                                                    d="M4 12a8 8 0 018-8v8H4z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- الموقع -->
                            <div class="relative">
                                <label for="location" class="block text-sm font-medium text-gray-700">الموقع</label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <input type="text" id="location" wire:model.lazy="location"
                                        placeholder="ابحث بالموقع"
                                        class="block w-full pr-10 text-right border-gray-300 rounded-md focus:border-blue-500 focus:ring-blue-500 sm:text-sm">

                                    <!-- Search Icon -->
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <i class="text-red-400 fas fa-search"></i>
                                    </div>

                                    <!-- Loading Spinner for Location -->
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <svg wire:loading wire:target="location"
                                            class="w-5 h-5 text-gray-500 animate-spin"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </x-content>
    </div>


    <x-container>
        <div class="h-2"></div>
        <x-grid md="4" lg="4" gap="0" class="md:gap-1 sm:gap-x-0">
            <div class="col-span-1">


                <x-card>
                    <div class="mb-1">
                        <li class="m-0.5 text-md">صنف العقار</li>
                        <ul class="flex">
                            <!-- الكل -->
                            <li class="m-0.5">
                                <input type="radio" id="all" name="type" wire:model.lazy="realType"
                                    value="all" class="hidden peer" required />
                                <label for="all"
                                    class="inline-flex items-center justify-between w-full p-1 px-6 text-gray-500 bg-white border-blue-600 rounded-md cursor-pointer border-1 peer-checked:bg-blue-600 peer-checked:text-white hover:bg-blue-600">
                                    <div class="block">
                                        <div class="w-full">الكل</div>
                                    </div>
                                </label>
                                <!-- Loading Spinner for Real Type 'all' -->
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg wire:loading wire:target="realType"
                                        class="w-5 h-5 text-blue-500 animate-spin" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z">
                                        </path>
                                    </svg>
                                </div>
                            </li>

                            <!-- إيجار -->
                            <li class="m-0.5">
                                <input type="radio" id="rent" name="type" wire:model.lazy="realType"
                                    value="rent" class="hidden peer">
                                <label for="rent"
                                    class="inline-flex items-center justify-between w-full p-1 px-6 text-gray-500 bg-white rounded-md cursor-pointer border-1 peer-checked:bg-blue-600 peer-checked:text-white hover:bg-blue-600">
                                    <div class="block">
                                        <div class="w-full">ايجار</div>
                                    </div>
                                </label>
                                <!-- Loading Spinner for Real Type 'rent' -->
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg wire:loading wire:target="realType"
                                        class="w-5 h-5 text-blue-500 animate-spin" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z">
                                        </path>
                                    </svg>
                                </div>
                            </li>

                            <!-- بيع -->
                            <li class="m-0.5">
                                <input type="radio" id="sale" name="type" wire:model.lazy="realType"
                                    value="sale" class="hidden peer">
                                <label for="sale"
                                    class="inline-flex items-center justify-between w-full p-1 px-6 text-gray-500 bg-white rounded-md cursor-pointer border-1 peer-checked:bg-blue-600 peer-checked:text-white hover:bg-blue-600">
                                    <div class="block">
                                        <div class="w-full">بيع</div>
                                    </div>
                                </label>
                                <!-- Loading Spinner for Real Type 'sale' -->
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg wire:loading wire:target="realType"
                                        class="w-5 h-5 text-blue-500 animate-spin" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z">
                                        </path>
                                    </svg>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="mb-1">
                        <li class="m-0.5 text-md">نوع العقار</li>
                        <ul class="flex">
                            <!-- شقة -->
                            <li class="m-0.5">
                                <input type="radio" id="apartment" name="realType"
                                    wire:model.lazy="selectedRealType" value="apartment" class="hidden peer"
                                    required />
                                <label for="apartment"
                                    class="inline-flex items-center justify-between w-full p-1 px-6 text-gray-500 bg-white border-blue-600 rounded-md cursor-pointer border-1 peer-checked:bg-blue-600 peer-checked:text-white hover:bg-blue-600">
                                    <div class="block">
                                        <div class="w-full">شقه</div>
                                    </div>
                                </label>
                                <!-- Loading Spinner for Selected Real Type 'apartment' -->
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg wire:loading wire:target="selectedRealType"
                                        class="w-5 h-5 text-blue-500 animate-spin" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z">
                                        </path>
                                    </svg>
                                </div>
                            </li>

                            <!-- مباني -->
                            <li class="m-0.5">
                                <input type="radio" id="building" name="realType"
                                    wire:model.lazy="selectedRealType" value="building" class="hidden peer">
                                <label for="building"
                                    class="inline-flex items-center justify-between w-full p-1 px-6 text-gray-500 bg-white rounded-md cursor-pointer border-1 peer-checked:bg-blue-600 peer-checked:text-white hover:bg-blue-600">
                                    <div class="block">
                                        <div class="w-full">مباني</div>
                                    </div>
                                </label>
                                <!-- Loading Spinner for Selected Real Type 'building' -->
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg wire:loading wire:target="selectedRealType"
                                        class="w-5 h-5 text-blue-500 animate-spin" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z">
                                        </path>
                                    </svg>
                                </div>
                            </li>

                            <!-- أرض -->
                            <li class="m-0.5">
                                <input type="radio" id="land" name="realType"
                                    wire:model.lazy="selectedRealType" value="land" class="hidden peer">
                                <label for="land"
                                    class="inline-flex items-center justify-between w-full p-1 px-6 text-gray-500 bg-white rounded-md cursor-pointer border-1 peer-checked:bg-blue-600 peer-checked:text-white hover:bg-blue-600">
                                    <div class="block">
                                        <div class="w-full">ارض</div>
                                    </div>
                                </label>
                                <!-- Loading Spinner for Selected Real Type 'land' -->
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg wire:loading wire:target="selectedRealType"
                                        class="w-5 h-5 text-blue-500 animate-spin" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z">
                                        </path>
                                    </svg>
                                </div>
                            </li>
                        </ul>
                    </div>
                </x-card>
            </div>
            <div class="col-span-3">
                @forelse ($ads as $ad)
                    <x-ads-card :ad="$ad" />
                    {{-- @php
                        $provider = $ad->pr;
                    @endphp
                    <article class="relative md:gap-4 md:grid md:grid-cols-3" wire:key="ad-{{ $ad->id }}">
                        <div class="absolute top-0 left-0 flex items-center gap-2 text-warning dark:text-yellow-300">
                            @if ($provider)
                                @if (auth()->user()->isProvider())
                                    <a href="{{ route('provider.advertisements.edit', $ad->id) }}" class="mx-4">
                                        <i class="text-lg text-gray-500 ti ti-trash hover:text-red-700"
                                            style="cursor: pointer;"></i>
                                    </a>
                                    <i class="text-lg text-red-500 ti ti-trash hover:text-red-700"
                                        wire:click="delete({{ $ad->id }})" style="cursor: pointer;"></i>
                                @endif
                            @else
                                @livewire('favorite', ['adId' => $ad->id], key('favorite-' . $ad->id))
                            @endif
                        </div>
                        <div>
                            <div class="flex items-center mb-2">
                                <x-avatar :avatar="$ad->provider->logo ?? ''" :name="$ad->provider->user->name ?? 'Unknown'"
                                    width="10" height="10" />
                                <div class="font-medium ms-4 dark:text-white">
                                    <p>{{ $ad->provider->name ?? 'Unknown Provider' }}</p>
                                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                        {{ $ad->provider->user->name ?? 'Anonymous' }}
                                    </div>
                                </div>

                                <div class="pb-4 mx-2">
                                    @livewire('follow-button', ['providerId' => $ad->provider->id], key('follow-button-' . $ad->id))
                                </div>
                            </div>

                            <x-image-group :images="$ad->realEstate->attachments()->pluck('file_path')->toArray()" />
                        </div>
                        <div class="col-span-2 mt-4 md:mt-4">
                            <div class="flex items-start mb-2">
                                <div class="w-full pe-4">
                                    <footer class="w-full">
                                        <div class="flex justify-between">
                                            <p class="mb-1 text-sm text-gray-500 dark:text-gray-400">
                                                تم النشر
                                                <time datetime="{{ $ad->created_at }}">{{ $ad->created_at->diffForHumans() }}</time>
                                            </p>
                                            <p class="items-center inline py-0 mx-2 -mt-1 font-semibold">
                                                <span class="p-1 text-sm text-white bg-blue-700 rounded">
                                                    {{ $ad->realEstate->price }} ريال
                                                </span>
                                            </p>
                                        </div>
                                    </footer>
                                    <h4 class="w-full text-xl font-semibold text-gray-900 dark:text-white">
                                        {{ Str::limit($ad->title, 50, '......') }}
                                    </h4>
                                </div>
                            </div>
                            <div class="py-1">
                                @if ($ad->realEstate->isApartment())
                                    <x-realEstate.apartment-info :apartment="$ad->realEstate->realEstateable"
                                        iconColor="#ff5722" :filled="true" />
                                @endif

                                @if ($ad->realEstate->isBuilding())
                                    <x-realEstate.building-info :building="$ad->realEstate->realEstateable"
                                        iconColor="#ff5722" :filled="true" />
                                @endif

                                @if ($ad->realEstate->isLand())
                                    <x-realEstate.land-info :land="$ad->realEstate->realEstateable" iconColor="#ff5722"
                                        :filled="true" />
                                @endif
                            </div>

                            <p class="mb-1 text-gray-500 dark:text-gray-400">
                                {{ Str::limit($ad->realEstate->description, 150, '......') }}
                                <br>
                                {{ Str::limit($ad->realEstate->boundaries, 150, '......') }}
                            </p>
                            <div class="flex items-center gap-4 mt-2">
                                 @livewire('likes-count', ['adId' => $ad->id, 'likesCount' => $ad->likes->count()],
                                    key('likes-count-' . $ad->id))
                                @livewire('shares-count', ['adId' => $ad->id, 'sharesCount' => $ad->shares->count()],
                                    key('shares-count-' . $ad->id))
                                @livewire('views-count', ['adId' => $ad->id, 'viewsCount' => $ad->views->count()],
                                    key('views-count-' . $ad->id))

                                <div class="flex items-center gap-2 text-warning dark:text-yellow-300">
                                    <i class="text-lg ti ti-message-2 text-warning dark:text-yellow-300"></i>
                                    {{ $ad->comments->count() }}
                                </div>
                                <div class="flex items-center text-xs ms-auto text-bodytext dark:text-gray-400">
                                    <a href="{{ $provider ? route('provider.advertisements.show', $ad->id) : route('ads.show', $ad->id) }}">show</a>
                                </div>
                            </div>
                        </div>
                    </article> --}}
                @empty
                    <p class="text-center text-gray-500">لا توجد إعلانات متاحة حالياً.</p>
                @endforelse
            </div>
        </x-grid>
    </x-container>
</div>
