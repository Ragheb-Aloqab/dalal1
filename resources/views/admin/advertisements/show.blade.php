<x-app-layout-admin>
    <x-slot name="header">
        <x-admin.title text="عرض إعلان" />
        <x-admin.breadcrumb :items="[
            ['url' => route('admin.dashboard.index'), 'icon' => 'ti ti-home', 'label' => 'الصفحة الرئيسية'],
            ['url' => route('admin.advertisements.index'), 'icon' => 'ti ti-apps', 'label' => 'الإعلانات'],
            ['label' => 'عرض إعلان'],
        ]" />
    </x-slot>
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="overflow-hidden card">
                <div class="relative ">
                    <div>
                        <img src="../../assets/images/blog/blog-img5.jpg" class="w-full max-w-full h-[440px] object-cover"
                            alt="...">
                    </div>
                    <span
                        class="absolute text-xs bg-white badge-md dark:bg-dark text-dark dark:text-white right-4 rtl:right-auto rtl:left-4 bottom-4">
                        2 min Read</span>
                </div>
                <div class="p-5 card-body">
                    <div class="relative hs-tooltip hs-tooltip-toggle w-fit">
                        <img src="{{ asset($ad->provider->user->avatar ? 'storage/profile/' . $ad->provider->user->avatar : 'assets/images/profile/user-1.jpg') }}"
                            alt="" class="w-10 h-10 -mt-10 rounded-full ">
                        <span class="tooltip hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible"
                            role="tooltip">
                            Addie Keller
                        </span>
                    </div>
                    <span
                        class="block mt-5 text-xs font-medium bg-lightgray dark:bg-darkgray text-dark dark:text-white badge-md w-fit">Lifestyle</span>
                    <h2 class="my-4 font-semibold text-1xl text-dark dark:text-white">{{ $ad->title }}</h2>
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2 text-info dark:text-darklink ">
                            <i class="text-lg ti ti-eye text-info dark:text-darklink"></i>
                            {{ $ad->views_count ? $ad->views_count : 0 }}
                        </div>
                        <div class="flex items-center gap-2 text-primary dark:text-darklink ">
                            <i class="text-lg ti ti-thumb-up text-primary dark:text-darklink"></i>
                            {{ $ad->likes_count ? $ad->likes_count : 0 }}
                        </div>
                        <div class="flex items-center gap-2 text-success dark:text-darklink ">
                            <i class="text-lg ti ti-share text-success dark:text-darklink"></i>
                            {{ $ad->shares_count ? $ad->shares_count : 0 }}
                        </div>
                        <div class="flex items-center gap-2 text-warning dark:text-darklink ">
                            <i class="text-lg ti ti-star text-warning dark:text-darklink"></i>
                            {{ $ad->rating ? $ad->rating : 0 }}
                        </div>
                        <div class="flex items-center gap-2 text-warning dark:text-darklink ">
                            <i class="text-lg ti ti-message-2 text-warning dark:text-darklink"></i>3
                        </div>

                        <div class="flex items-center text-xs ms-auto text-bodytext dark:text-darklink ">
                            <i class="ti ti-point text-bodytext dark:text-darklink"></i>Mon, Jan 16
                        </div>

                    </div>
                </div>
                <hr class="border-t border-border dark:border-darkborder ">
                <div class="card-body">
                    <h3 class="mb-4 text-3xl font-semibold text-dark dark:text-white">Title of the
                        paragraphs</h3>
                    <p class="mb-3 card-subtitle">
                        But you cannot figure out what it is or what it can do. MTA web directory is
                        the simplest way in which
                        one can bid on a link, or a few links if they wish to do so. The link
                        directory on MTA displays all of the links it currently has, and does so in
                        alphabetical order, which
                        makes it much easier for someone to find what they are looking for if it is
                        something specific and they do not want to go through all the other sites
                        and links as well. It allows
                        you to start your bid at the bottom and slowly work your way to the top
                        of the list.
                    </p>
                    <p class="mb-3 card-subtitle">
                        Gigure out what it is or what it can do. MTA web directory is the simplest
                        way in which one can bid on a
                        link, or a few links if they wish to do so. The link directory on MTA
                        displays all of the links it currently has, and does so in alphabetical
                        order, which makes it much
                        easier for someone to find what they are looking for if it is something
                        specific and they do not want to go through all the other sites and links as
                        well. It allows you to
                        start your bid at the bottom and slowly work your way to the top of the
                    </p>
                    <p class="mb-0 card-subtitle"><strong>This is strong
                            text.</strong></p>
                    <p class="mb-0 card-subtitle"><em>This is italic
                            text.</em></p>

                    <hr class="my-8 border-t border-border dark:border-darkborder">

                    <h3 class="my-4 text-2xl font-semibold text-dark dark:text-white">
                        الميزات
                    </h3>
                    <ul class="my-3 ps-4">
                        @foreach ($ad->realEstate->features as $feature)
                            <li class="flex items-center gap-2"><span
                                    class="p-1 rounded-full bg-dark dark:bg-darklink"></span> {{ $feature->name }}</li>
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
                    {{-- <div id="sync1" class="owl-carousel owl-theme">
                        @foreach ($ad->realEstate->attachments as $attachment)
                            @if ($attachment->file_type === 'image')
                                <div class="overflow-hidden rounded-md item">
                                    <img src="{{ Storage::url($attachment->file_path) }}" alt=""
                                        class="w-full max-w-full">
                                </div>

                            @endif
                        @endforeach


                    </div>

                    <div id="sync2" class="owl-carousel owl-theme">
                        @foreach ($ad->realEstate->attachments as $attachment)
                            @if ($attachment->file_type === 'image')
                                <div class="overflow-hidden rounded-md item">
                                    <img src="{{ Storage::url($attachment->file_path) }}" alt=""
                                        class="w-full max-w-full">
                                </div>

                            @endif
                        @endforeach


                    </div> --}}
                </div>
            </div>

        </div>

        <div class="col-span-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4 text-xl">Post Comments
                    </h3>
                    @livewire('comments',['adId'=>$ad->id])
                </div>
            </div>
        </div>

    </div>
</x-app-layout-admin>
