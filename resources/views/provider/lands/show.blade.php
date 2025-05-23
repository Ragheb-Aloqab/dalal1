<x-app-layout-provider>
    <x-slot name="header">
        <x-admin.title text="عرض أرض" />
        <x-admin.breadcrumb :items="[
            ['url' => route('provider.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('provider.lands.index'), 'icon' => 'ti ti-apps', 'label' => 'الأراضي'],
            ['label' => 'عرض أرض'],
        ]" />
    </x-slot>
    <div class="grid grid-cols-12 gap-6">

        <div class="col-span-12">
            <div class="card">
                <div class="p-0 card-body">
                    <x-ad-attachments-carousel :adId="$ad->id" />
                </div>
            </div>
        </div>





        <div class="col-span-12">
            <div class="card">
                <div class="p-5 card-body">
                    <h2 class="my-2 font-semibold text-1xl text-dark dark:text-white">ads advertisments</h2>
                    <p class="mb-3 card-subtitle">
                        {{ $ad->title }}
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2 text-info dark:text-darklink ">
                            <i class="text-lg ti ti-eye text-info dark:text-darklink"></i>
                            {{ $ad->views()->count() ? $ad->views()->count() : 0 }}
                        </div>
                        <div class="flex items-center gap-2 text-primary dark:text-darklink ">
                            <i class="text-lg ti ti-thumb-up text-primary dark:text-darklink"></i>
                            {{ $ad->likes()->count() ? $ad->likes()->count() : 0 }}
                        </div>
                        <div class="flex items-center gap-2 text-success dark:text-darklink ">
                            <i class="text-lg ti ti-share text-success dark:text-darklink"></i>
                            {{ $ad->shares()->count() ? $ad->shares()->count() : 0 }}
                        </div>
                        <div class="flex items-center gap-2 text-warning dark:text-darklink ">
                            <i class="text-lg ti ti-star text-warning dark:text-darklink"></i>
                            {{ $ad->ratings()->count() ? $ad->ratings()->count() : 0 }}
                        </div>
                        <div class="flex items-center gap-2 text-warning dark:text-darklink ">
                            <i class="text-lg ti ti-message-2 text-warning dark:text-darklink"></i>
                            {{ $ad->comments()->count() }}
                        </div>

                        <div class="flex items-center text-xs ms-auto text-bodytext dark:text-darklink ">
                            <i class="ti ti-point text-bodytext dark:text-darklink"></i>
                            تم النشر
                            <time datetime="2022-01-20 19:00">{{ $ad->created_at->diffForHumans() }}</time>
                        </div>

                    </div>
                </div>
                <hr class="border-t border-border dark:border-darkborder ">
                <div class="card-body">
                    <h3 class="mb-4 text-xl font-semibold text-dark dark:text-white">
                        description
                    </h3>

                    <p class="mb-3 card-subtitle">
                        {{ $ad->realEstate->description }}
                    </p>
                    <h3 class="mb-4 text-xl font-semibold text-dark dark:text-white">
                        boundaries
                    </h3>
                    <p class="mb-3 card-subtitle">
                        {{ $ad->realEstate->boundaries }}
                    </p>
                    <hr class="my-8 border-t border-border dark:border-darkborder">
                    <h3 class="my-4 text-2xl font-semibold text-dark dark:text-white">
                        الميزات
                    </h3>
                    <ul class="my-3 ps-4">
                        @foreach ($ad->realEstate->features as $feature)
                            <li class="flex items-center gap-2"><span
                                    class="p-1 rounded-full bg-dark dark:bg-darklink"></span> {{ $feature->name }}
                            </li>
                        @endforeach
                    </ul>

                    <hr class="my-8 border-t border-border dark:border-darkborder">



                    <hr class="my-8 border-t border-border dark:border-darkborder">

                    <h3 class="text-2xl font-semibold text-dark dark:text-white">Quotes</h3>
                    <div class="p-3">
                        <h6 class="text-base"><i class="text-xl ti ti-quote"></i>Life is
                            <div class="mt-3">
                                <div class="flex items-center my-1 text-sm text-gray-700">
                                    <i class="ml-2 text-orange-500 ti ti-ruler-2"></i>
                                    المساحة: 5000 قدم مربع
                                </div>
                                <div class="flex items-center my-1 text-sm text-gray-700">
                                    <i class="ml-2 text-blue-500 ti ti-droplet"></i>
                                    الماء: متوفر
                                </div>
                                <div class="flex items-center my-1 text-sm text-gray-700">
                                    <i class="ml-2 text-yellow-500 ti ti-bolt"></i>
                                    الكهرباء: متوفر
                                </div>
                                <div class="flex items-center my-1 text-sm text-gray-700">
                                    <i class="ml-2 text-gray-500 ti ti-pipe"></i>
                                    الصرف الصحي: غير متوفر
                                </div>
                                <div class="flex items-center my-1 text-sm text-gray-700">
                                    <i class="ml-2 text-red-500 ti ti-fire"></i>
                                    الغاز: متوفر
                                </div>
                            </div>


                        </h6>
                    </div>
                </div>
                <div class="col-span-12 ">
                    ljlkfjlk

                </div>
            </div>
        </div>

        <div class="col-span-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4 text-xl">نشر تعليق
                    </h3>
                    @livewire('comments', ['adId' => $ad->id])
                </div>
            </div>
        </div>
    </div>
    <div class="col-span-12">
        <div class="card">
            <div class="p-5 card-body">
                <h2 class="my-2 font-semibold text-1xl text-dark dark:text-white">ads advertisments</h2>
                <p class="mb-3 card-subtitle">
                    {{ $ad->title }}
                </p>
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2 text-info dark:text-darklink ">
                        <i class="text-lg ti ti-eye text-info dark:text-darklink"></i>
                        {{ $ad->views()->count() ? $ad->views()->count() : 0 }}
                    </div>
                    <div class="flex items-center gap-2 text-primary dark:text-darklink ">
                        <i class="text-lg ti ti-thumb-up text-primary dark:text-darklink"></i>
                        {{ $ad->likes()->count() ? $ad->likes()->count() : 0 }}
                    </div>
                    <div class="flex items-center gap-2 text-success dark:text-darklink ">
                        <i class="text-lg ti ti-share text-success dark:text-darklink"></i>
                        {{ $ad->shares()->count() ? $ad->shares()->count() : 0 }}
                    </div>
                    <div class="flex items-center gap-2 text-warning dark:text-darklink ">
                        <i class="text-lg ti ti-star text-warning dark:text-darklink"></i>
                        {{ $ad->ratings()->count() ? $ad->ratings()->count() : 0 }}
                    </div>
                    <div class="flex items-center gap-2 text-warning dark:text-darklink ">
                        <i class="text-lg ti ti-message-2 text-warning dark:text-darklink"></i>
                        {{ $ad->comments()->count() }}
                    </div>

                    <div class="flex items-center text-xs ms-auto text-bodytext dark:text-darklink ">
                        <i class="ti ti-point text-bodytext dark:text-darklink"></i>
                        تم النشر
                        <time datetime="2022-01-20 19:00">{{ $ad->created_at->diffForHumans() }}</time>
                    </div>

                </div>
            </div>
            <hr class="border-t border-border dark:border-darkborder ">
            <div class="card-body">
                <h3 class="mb-4 text-xl font-semibold text-dark dark:text-white">
                    description
                </h3>

                <p class="mb-3 card-subtitle">
                    {{ $ad->realEstate->description }}
                </p>
                <h3 class="mb-4 text-xl font-semibold text-dark dark:text-white">
                    boundaries
                </h3>
                <p class="mb-3 card-subtitle">
                    {{ $ad->realEstate->boundaries }}
                </p>
                <hr class="my-8 border-t border-border dark:border-darkborder">
                <h3 class="my-4 text-2xl font-semibold text-dark dark:text-white">
                    الميزات
                </h3>
                <ul class="my-3 ps-4">
                    @foreach ($ad->realEstate->features as $feature)
                        <li class="flex items-center gap-2"><span
                                class="p-1 rounded-full bg-dark dark:bg-darklink"></span> {{ $feature->name }}
                        </li>
                    @endforeach
                </ul>

                <hr class="my-8 border-t border-border dark:border-darkborder">



                <hr class="my-8 border-t border-border dark:border-darkborder">

                <h3 class="text-2xl font-semibold text-dark dark:text-white">Quotes</h3>
                <div class="p-3">
                    <h6 class="text-base"><i class="text-xl ti ti-quote"></i>Life is
                        short, Smile while you still
                        have teeth!</h6>
                </div>
            </div>
            <div class="col-span-12 ">
                ljlkfjlk

            </div>
        </div>
    </div>

    <div class="col-span-12">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-4 text-xl">Post Comments
                </h3>
                @livewire('comments', ['adId' => $ad->id])
            </div>
        </div>
    </div>
    </div>
</x-app-layout-provider>
