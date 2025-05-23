<x-app-layout-provider>
    <x-slot name="header">
        <x-admin.title text="عرض مزود" />
        <x-admin.breadcrumb :items="[
            ['url' => route('provider.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            // ['url' => route('provider.providers.index'), 'icon' => 'ti ti-apps', 'label' => 'المزودين'],
            ['label' => 'عرض مزود'],
        ]" />
    </x-slot>


    <div class="overflow-hidden card">
        <div class="p-0 card-body">
            <img src="{{ asset('/assets/images/backgrounds/profilebg.jpg') }}" alt="" class="w-full">
            <div class="grid grid-cols-12 gap-6">
                <div class="order-2 col-span-12 lg:col-span-4 lg:order-1">
                    <div class="flex items-center justify-around p-0 lg:p-6">
                        <div class="text-center">
                            <i class="block mb-1 text-xl ti  ti-file-description text-bodytext dark:text-darklink"></i>
                            <h4 class="text-xl">{{ $provider->advertisements()->count() }}</h4>
                            <p class="text-base text-bodytext dark:text-darklink">المنشورات</p>
                        </div>
                        <div class="text-center">
                            <i class="block mb-1 text-xl ti ti-user-plus text-bodytext text-info dark:text-darklink"></i>
                            <h4 class="text-xl">{{ $provider->followers()->count() }}</h4>
                            <p class="text-base text-bodytext dark:text-darklink">اتابع </p>
                        </div>
                        <div class="text-center">
                            <i class="block mb-1 text-xl ti ti-user-check text-bodytext text-warning dark:text-darklink"></i>
                            <h4 class="text-xl">{{ $provider->user->following()->count() }}</h4>
                            <p class="text-base text-bodytext dark:text-darklink">المتابعين</p>
                        </div>
                    </div>
                </div>

                <div class="order-1 col-span-12 lg:col-span-4 lg:order-2">
                    <div class="-mt-14">
                        <div class="relative flex items-center justify-center mb-2">
                            <div class="flex items-center justify-center rounded-full linear-gradient"
                                style="width: 110px; height: 110px;" ;>
                                <div class="flex items-center justify-center overflow-hidden border-4 rounded-full border-body "
                                    style="width: 100px; height: 100px;" ;>
                                    <img src="{{ $provider->user->avatar ? Storage::url($provider->user->avatar) : asset('assets/images/profile/user-1.jpg') }}""
                                        alt="" class="w-full">
                                    <button type="button"
                                        class="absolute flex justify-start w-full p-2 text-dark edit -left-4 top-4">
                                        <i class="text-lg ti ti-edit text-bodytext dark:text-darklink"></i>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h5 class="card-title ">
                                {{ $provider->user->name }}
                            </h5>
                            <p class="">مزود</p>
                        </div>
                    </div>
                </div>
                <div class="order-last col-span-12 mb-6 lg:col-span-4 lg:mb-0">
                    <div class="flex items-center justify-around p-0 lg:p-6">
                        <div class="text-center">
                            <i class="block mb-1  text-xl ti ti-building text-info dark:text-darklink"></i>
                            <h4 class="text-xl">{{ $buildings }}</h4>
                            <p class="text-base text-bodytext dark:text-darklink">المباني</p>
                        </div>
                        <div class="text-center">
                            <i class="block mb-1 text-xl ti ti-building-skyscraper text-warning dark:text-darklink"></i>
                            <h4 class="text-xl">{{ $apartments }}</h4>
                            <p class="text-base text-bodytext dark:text-darklink">الشقق </p>
                        </div>
                        <div class="text-center">
                            <i class="block mb-1 text-xl ti ti-map-pin text-primary dark:text-darklink"></i>
                            <h4 class="text-xl">{{ $lands }}</h4>
                            <p class="text-base text-bodytext dark:text-darklink">الاراضي</p>
                        </div>
                    </div>

                </div>
            </div>


            <!----------->
            <div class="px-3 rounded-md bg-lightprimary dark:bg-darkprimary">
                <nav class="flex justify-end space-x-3" aria-label="Tabs" role="tablist">
                    <button type="button"
                        class="inline-flex items-center gap-2 px-3 py-2 text-sm border-b-2 border-transparent hs-tab-active:border-primary hs-tab-active:text-primary whitespace-nowrap text-bodytext dark:text-darklink hover:text-primary focus:outline-none focus:text-primary disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-primary active"
                        id="Profile-tab" data-hs-tab="#profile" aria-controls="profile" role="tab">
                        <i class="text-xl ti ti-user-circle"></i><span class="hidden md:flex">الملف الشخصي</span>
                    </button>
                    <button type="button"
                        class="inline-flex items-center gap-2 px-3 py-2 text-sm border-b-2 border-transparent hs-tab-active:border-primary hs-tab-active:text-primary whitespace-nowrap text-bodytext dark:text-darklink hover:text-primary focus:outline-none focus:text-primary disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-primary"
                        id="Followers-tab" data-hs-tab="#followers" aria-controls="followers" role="tab">
                        <i class="text-xl ti ti-heart"></i><span class="hidden md:flex">المفضلات</span>
                    </button>

                    <button type="button"
                        class="inline-flex items-center gap-2 px-3 py-2 text-sm border-b-2 border-transparent hs-tab-active:border-primary hs-tab-active:text-primary whitespace-nowrap text-bodytext dark:text-darklink hover:text-primary focus:outline-none focus:text-primary disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:text-primary"
                        id="Gallery-tab" data-hs-tab="#gallery" aria-controls="gallery" role="tab">
                        <i class="i text-xl ti ti-speakerphone text-success"></i><span
                            class="hidden md:flex">الاعلانات</span>
                    </button>
                </nav>
            </div>
        </div>
    </div>

    <!---Tabs Content--->
    <div class="mt-6">
        <div id="profile" role="tabpanel" aria-labelledby="Profile-tab">
            <div class="min-h-28">
                @livewire('provider.provider-edit')

            </div>
        </div>
        <div id="followers" class="hidden" role="tabpanel" aria-labelledby="Followers-tab">
            <div class="min-h-28">
                @livewire('followers', ['providerId' => $provider->id])

            </div>
        </div>
        <div id="gallery" class="hidden" role="tabpanel" aria-labelledby="Gallery-tab">
            <div class="items-center justify-between mt-3 mb-4 sm:flex">
                <h3 class="flex items-center gap-2 mb-3 text-2xl font-semibold sm:mb-0 text-dark dark:text-white">
                    {{ $buildings + $apartments + $lands }}
                    <span
                        class="flex items-center leading-normal rounded-full bg-secondary  text-xs px-2 py-0.5 font-medium text-white w-fit">12</span>
                </h3>
                <form class="relative">
                    <input type="text" class="py-2 form-control search-chat ps-10" id="text-srh"
                        placeholder="Search Followers">
                    <i
                        class="ti ti-search absolute top-1.5 start-0 translate-middle-y text-lg text-dark dark:text-darklink  ms-3"></i>
                </form>
            </div>

            <div class="grid grid-cols-12 gap-6 mt-7 min-h-28">
                @livewire('advertisements', ['providerId' => $provider->id])
            </div>
        </div>
    </div>


</x-app-layout-provider>
