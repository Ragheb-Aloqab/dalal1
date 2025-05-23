<div class="p-1">
    <!-- Loading Indicator -->
    <div wire:loading class="fixed inset-0 z-50 flex items-center justify-center w-full h-full p-12 text-white bg-gray-100 bg-opacity-50">
        <div class="flex items-center justify-center w-full h-full">
            <p>جاري التحميل...</p>
        </div>
    </div>

    <div class="sticky top-0 z-10 border-b border-gray-200 bg-background-50">
        <x-content class="p-4">
            {{-- <div class="flex items-center justify-between">
                <div class="btn">
                    <x-responsive-nav-link :href="route('/')" :active="request()->routeIs('/')">
                        الرئيسية
                    </x-responsive-nav-link>
                </div>
                <div class="flex justify-between">
                    <button class="flex items-center justify-center mx-1 text-blue-600 transition-color hover:bg-blue-100 focus:outline-none focus:ring" type="button">
                        <div class="inline-flex items-center h-8 overflow-hidden text-blue-500 border border-blue-500 rounded">
                            <span class="px-5 py-1.5 text-[12px] font-medium">
                                رسالة جديدة
                            </span>
                        </div>
                    </button>
                </div>
            </div> --}}

            <div class="flex items-center justify-between">
                <div class="text-lg text-primary-300">{{$city->name}}</div>
            </div>
            <div class="space-y-4">
                <div class="flex flex-col space-y-4 lg:flex-row lg:space-y-0">
                    <!-- Search Input -->
                    <input type="text" wire:model.live="search" placeholder="بحث..." class="w-full p-3 mx-1 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                    <!-- Location Input -->
                    <input type="text" wire:model.live.500ms="location" placeholder="الموقع..." class="w-full p-3 mx-1 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                    <!-- Min Price Input -->
                    <input type="number" wire:model.lazy="minPrice" placeholder="السعر الأدنى..." class="w-full p-3 mx-1 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                    <!-- Max Price Input -->
                    <input type="number" wire:model.live="maxPrice" placeholder="السعر الأقصى..." class="w-full p-3 mx-1 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                </div>
            </div>
        </x-content>
    </div>

    <!-- Filters Container -->
    <x-content class="p-4">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
            <div class="col-span-1 md:col-span-2 lg:col-span-3">
                @forelse ($ads as $ad)
                    <div class="p-4 mb-4 border border-gray-300 rounded-lg shadow-md">
                        <x-ads-card :ad="$ad" />
                    </div>
                @empty
                    <div class="text-gray-500">لم يتم العثور على إعلانات.</div>
                @endforelse
                <div class="mt-4">
                    {{ $ads->links() }} <!-- Render pagination links -->
                </div>
            </div>

            <div class="col-span-1">
                <x-card :p="0" class="relative">
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('assets/images/svgs/search-icon-map.svg') }}" alt="Icon Search"
                            class="w-full h-auto rounded-lg" />
                        <button type="button" class="absolute inline-flex items-center px-2 py-0.5 text-sm font-medium text-blue-700 border border-blue-700 rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-transparent dark:focus:ring-blue-800 opacity-80 bg-transparent hover:bg-transparent bottom-4" style="color: #006169">
                            البحث باستخدام الخريطة
                        </button>
                    </div>
                </x-card>

                <div>
                    <h1 class="mb-4 text-3xl font-bold text-teal-600">نبذة تعريفية</h1>
                    <div class="mb-6">
                        <h2 class="mb-2 text-lg font-semibold">أنواع العقارات:</h2>
                        <p>شقق، فلل، مكاتب تجارية، أراضي</p>
                    </div>
                    <div class="mb-3">
                        <h2 class="mb-2 text-lg font-semibold">مناطق العمل:</h2>
                        <p>الرياض، جدة، الدمام، مكة</p>
                    </div>
                    <div class="mb-3">
                        <h2 class="mb-2 text-lg font-semibold">الوصف:</h2>
                        <p>ولدت فكرة إنشاء الشركة من خلال دراسة السوق العقاري في المملكة العربية السعودية وتلبية الاحتياجات التي تساعد في تطوير النشاط العقاري. <span class="text-teal-600 cursor-pointer">اقرأ أقل</span></p>
                    </div>
                </div>
            </div>
        </div>
    </x-content>
    <!-- Ads Container -->

</div>
