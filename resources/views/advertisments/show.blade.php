<x-app-layout>


    <x-container>

        <x-card :p="0" class="mt-4 mb-0">
            <div class="h-[70vh] ">
                <x-image-carousel :realEstateId="$ads->realEstate->id" />
            </div>
        </x-card>
        <x-card>
            <x-grid md="4" lg="4" gap="0" class="md:gap-1 sm:gap-x-0">
                <div class="col-span-3">
                    <x-card class="mb-2">
                        <div class="flex items-center gap-4 mt-2">
                            @livewire('likes-count', ['adId' => $ads->id, 'likesCount' => $ads->likes->count()])
                            @livewire('shares-count', ['adId' => $ads->id, 'sharesCount' => $ads->shares->count()])
                            <div class="flex items-center gap-2 text-warning dark:text-yellow-300">
                                <i class="text-lg ti ti-message-2 text-warning dark:text-yellow-300"></i>
                                {{ $ads->comments->count() }}
                            </div>
                            <div class="flex items-center text-xs ms-auto text-bodytext dark:text-gray-400">
                                <span class="mx-2">
                                    @livewire('views-count', ['adId' => $ads->id, 'viewsCount' => $ads->views->count()])
                                </span>
                                @livewire('favorite', ['adId' => $ads->id])

                            </div>
                        </div>
                    </x-card>
                    <x-card :p="4">
                        <div class="px-4 py-2">
                            <div class="mb-2 text-xl font-bold text-gray-900 dark:text-gray-100">
                                وصف الوحدة العقارية
                            </div>
                            <p class="text-base text-gray-700 dark:text-gray-300">
                                {{ $ads->realEstate->description }}
                            </p>
                        </div>
                        <hr>
                        <div class="px-4 py-2">
                            <div class="mb-2 text-xl font-bold text-gray-900 dark:text-gray-100">
                                حدود العقار </div>
                            <p class="text-base text-gray-700 dark:text-gray-300">
                                {{ $ads->realEstate->boundaries }}
                            </p>
                        </div>

                        <hr>

                        <div class="px-4 py-2">
                            <div class="mb-2 text-xl font-bold text-gray-900 dark:text-gray-100">
                                تفاصيل الوحدة العقارية
                            </div>
                            <div class="grid grid-cols-2 gap-4 ">
                                <p class="text-base text-gray-700 dark:text-gray-300 text-wrap">
                                    {{-- {{ $ads->realEstate->realEstateable }} --}}
                                    عنوان العرض : {{ $ads->title }}
                                </p>
                                <p class="text-base text-gray-700 dark:text-gray-300 text-wrap">
                                    نوع العقار :
                                    @if ($ads->realEstate->isLand())
                                        أرض
                                    @elseif ($ads->realEstate->isApartment())
                                        شقة
                                    @elseif ($ads->realEstate->isBuilding())
                                        مبنى
                                    @else
                                        نوع غير معروف
                                    @endif
                                </p>


                                <p class="text-base text-gray-700 dark:text-gray-300 text-wrap">
                                    سعر العقار :{{ $ads->realEstate->price }}
                                </p>
                                <p class="text-base text-gray-700 dark:text-gray-300 text-wrap">
                                    الرقم التجاري :{{ $ads->realEstate->commercial_number }}
                                </p>

                                <p class="text-base text-gray-700 dark:text-gray-300 text-wrap">
                                    نوع العرض :
                                    @if ($ads->realEstate->status === 'rent')
                                        للإيجار
                                    @elseif ($ads->realEstate->status === 'sale')
                                        للبيع
                                    @else
                                        غير معروف
                                    @endif
                                </p>
                                @if ($ads->realEstate->isLand())
                                    <p class="text-base text-gray-700 dark:text-gray-300 text-wrap">
                                        المساحة :{{ $ads->area }}
                                    </p>
                                    <p class="text-base text-gray-700 dark:text-gray-300 text-wrap">
                                        هل يتوفر خط مياه :{{ $ads->water }}
                                    </p>
                                    <p class="text-base text-gray-700 dark:text-gray-300 text-wrap">
                                        هل يتوفر خط كهرباء :{{ $ads->electricity }}
                                    </p>
                                    <p class="text-base text-gray-700 dark:text-gray-300 text-wrap">
                                        هل يتوفر خط صرف صحي :{{ $ads->sewage }}
                                    </p>
                                    <p class="text-base text-gray-700 dark:text-gray-300 text-wrap">
                                        هل يتوفر خط غاز :{{ $ads->gas }}
                                    </p>
                                    <p class="text-base text-gray-700 dark:text-gray-300 text-wrap">
                                        تفاصيل الوصول إلى الخطوط :{{ $ads->access }}
                                    </p>
                                @elseif ($ads->realEstate->isApartment())
                                    <p class="text-base text-gray-700 dark:text-gray-300 text-wrap">
                                        رقم الطابق :{{ $ads->floor_number }}
                                    </p>
                                    <p class="text-base text-gray-700 dark:text-gray-300 text-wrap">
                                        عدد الغرف :{{ $ads->rooms_number }}
                                    </p>
                                    <p class="text-base text-gray-700 dark:text-gray-300 text-wrap">
                                        عدد الحمامات :{{ $ads->bathrooms_number }}
                                    </p>
                                    <p class="text-base text-gray-700 dark:text-gray-300 text-wrap">
                                        عدد المطابخ :{{ $ads->kitchens_number }}
                                    </p>
                                    <p class="text-base text-gray-700 dark:text-gray-300 text-wrap">
                                        حالة الشقة :
                                        @if ($ads->realEstate->condition === 'new')
                                            جديد
                                        @elseif ($ads->realEstate->condition === 'old')
                                            قديم
                                        @else
                                            غير معروف
                                        @endif
                                    </p>
                                @elseif ($ads->realEstate->isBuilding())
                                    <p class="text-base text-gray-700 dark:text-gray-300 text-wrap">
                                        عدد الطوابق :{{ $ads->floors_number }}
                                    </p>
                                    <p class="text-base text-gray-700 dark:text-gray-300 text-wrap">
                                        عدد الشقق :{{ $ads->apartments_count }}
                                    </p>
                                @else
                                    نوع غير معروف
                                @endif
                                <p class="text-base text-gray-700 dark:text-gray-300 text-wrap">
                                    موقع العقار:{{ $ads->realEstate->location }}
                                </p>


                            </div>
                        </div>

                        <hr>
                        <div class="px-4 py-2">
                            <div class="mb-2 text-xl font-bold text-gray-900 dark:text-gray-100">
                                مميزات الوحدة العقارية
                            </div>
                            <p class="text-base text-gray-700 dark:text-gray-300 text-wrap">
                                <x-tag-card :tags="$ads->realEstate->features" />
                            </p>
                        </div>
                    </x-card>
                    <x-card :p="4">
                        <div class="px-4 py-2">
                            <div class="mb-2 text-xl font-bold text-gray-900 dark:text-gray-100">
                                معلومات السجل العقاري
                            </div>
                            <p class="text-base text-gray-700 dark:text-gray-300 text-wrap">
                                {{-- {{ $ads->realEstate->realEstateable }} --}}
                                في القريب سيتم عرض معلومات الوحدات العقارية بالسجل العقاري لضمان الموثوقية
                            </p>
                        </div>
                    </x-card>
                </div>
                <div class="col-span-1">
                    <x-card>
                        <div class="flex flex-col items-center justify-center mb-2">
                            {{-- <x-avatar w="40" h="40"
                                src={{Storage::url($ads->provider->user->avatar)}} /> --}}
                            <!-- Usage with dynamic Tailwind width and height classes -->
                            <x-avatar :avatar="$ads->provider->user->avatar" :name="$ads->provider->user->name" width="32" height="32" />
                            <div class="font-medium ms-4 dark:text-white">
                                <p>{{ $ads->provider->user->name }}</p>
                                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                    United States
                                </div>
                            </div>
                            <livewire:follow-button :providerId="$ads->provider->id" />
                        </div>
                    </x-card>
                    <x-card :p="2">
                        {{-- <x-comments-card :comments="$ads->comments" /> --}}
                        <livewire:comment-cards :advertisementId="$ads->id" />

                    </x-card>

                </div>
            </x-grid>

        </x-card>

        <x-card>
            <div class="">
                <h2 class="py-3 text-lg font-semibold">الاعلانات المشابة</h2>
                <ul class="grid w-full gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                    <li>
                        <a href="#"
                            class="block w-full p-0 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer ">
                            <div class="block ">
                                <x-image-group :images="[
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                ]" />
                                <div
                                    class="p-4 dark:hover:text-gray-300 dark:border-gray-700 hover:border-blue-600 hover:text-blue-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="w-full text-lg font-semibold">500-1000 MB</div>
                                    <div class="w-full">Good for large websites</div>
                                    <div class="flex justify-between w-full">
                                        <div class="grow">
                                            <p>;sfjdslkf;l</p>
                                        </div>
                                        <svg class="w-5 h-5 ms-3 rtl:rotate-180" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <!-- Card 2 -->
                    <li>
                        <a href="#"
                            class="block w-full p-0 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 hover:border-blue-600 hover:text-blue-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <div class="block ">
                                <x-image-group :images="[
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                ]" />
                                <div class="p-4">
                                    <div class="w-full text-lg font-semibold">500-1000 MB</div>
                                    <div class="w-full">Good for large websites</div>
                                    <div class="flex justify-between w-full">
                                        <div class="grow">
                                            <p>;sfjdslkf;l</p>
                                        </div>
                                        <svg class="w-5 h-5 ms-3 rtl:rotate-180" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block w-full p-0 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 hover:border-blue-600 hover:text-blue-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <div class="block ">
                                <x-image-group :images="[
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                ]" />
                                <div class="p-4">
                                    <div class="w-full text-lg font-semibold">500-1000 MB</div>
                                    <div class="w-full">Good for large websites</div>
                                    <div class="flex justify-between w-full">
                                        <div class="grow">
                                            <p>;sfjdslkf;l</p>
                                        </div>
                                        <svg class="w-5 h-5 ms-3 rtl:rotate-180" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block w-full p-0 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 hover:border-blue-600 hover:text-blue-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <div class="block ">
                                <x-image-group :images="[
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                    'https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg',
                                ]" />
                                <div class="p-4">
                                    <div class="w-full text-lg font-semibold">500-1000 MB</div>
                                    <div class="w-full">Good for large websites</div>
                                    <div class="flex justify-between w-full">
                                        <div class="grow">
                                            <p>;sfjdslkf;l</p>
                                        </div>
                                        <svg class="w-5 h-5 ms-3 rtl:rotate-180" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </x-card>
    </x-container>


    


</x-app-layout>
