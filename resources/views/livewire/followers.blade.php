<div>
    <div class="items-center justify-between mt-3 mb-4 sm:flex">
        <h3 class="flex items-center gap-2 mb-3 text-2xl font-semibold sm:mb-0 text-dark dark:text-white">
            المتابعون
            <span
                class="flex items-center leading-normal rounded-full bg-secondary text-xs px-2 py-0.5 font-medium text-white w-fit">
                {{ count($followers) }}
            </span>
        </h3>
        <!-- Search input triggers search only on change (when focus leaves the field) -->
        <form class="relative">
            <input wire:model.live="search" type="text" class="py-2 form-control search-chat ps-10" id="text-srh"
                placeholder="ابحث عن المتابعين">
            <i
                class="ti ti-search absolute top-1.5 start-0 translate-middle-y text-lg text-dark dark:text-darklink ms-3"></i>
        </form>
    </div>

    <div class="grid grid-cols-12 gap-6">
        @forelse ($followers as $follow)
            <div class="col-span-12 xl:col-span-4 lg:col-span-6 md:col-span-6">
                <div class="card">
                    <div class="flex items-center gap-4 py-5 card-body">
                        <img src="{{ $follow->user->avatar ? Storage::url($follow->user->avatar) : asset('assets/images/profile/user-1.jpg') }}"
                            alt="" class="w-10 h-10 rounded-full">

                        <div class="">
                            <h5 class="mb-0 text-lg leading-normal">
                                {{ $follow->user->name }}
                            </h5>
                            <span class="flex items-center gap-1 text-xs text-bodytext dark:text-darklink">
                                <i class="text-sm ti ti-map-pin text-bodytext dark:text-darklink"></i>
                                {{ $follow->user->city->name ?? 'غير معروف' }}
                            </span>
                        </div>
                        <button class="px-2 py-1 btn ms-auto btn-outline-primary">
                            {{ $follow->is_following ? 'متابَع' : 'متابعة' }}
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <p>لم يتم العثور على متابعين.</p>
        @endforelse
    </div>
</div>
