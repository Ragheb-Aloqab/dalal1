<div class="col-span-12 lg:col-span-8 md:col-span-12 sm:col-span-12">
    <!-- Display Advertisements -->
    @forelse ($advertisements as $advertisement)
        <div class="mb-6 border border-gray-200 shadow-none card dark:border-gray-700">
            <div class="p-4 card-body">
                <div class="flex justify-between">
                    <div class="flex items-center gap-3">
                        <img src="{{ $advertisement['provider']['user']['avatar'] ? Storage::url($advertisement['provider']['user']['avatar']) : asset('assets/images/profile/user-1.jpg') }}"
                            alt="" class="w-10 h-10 rounded-full">
                        <h6 class="text-base">{{ $advertisement['provider']['user']['name'] }}</h6>
                        <span class="flex items-center gap-2 text-xs text-gray-600 dark:text-gray-400">
                            <i class="w-2 h-2 bg-blue-500 rounded-full opacity-30"></i>
                            {{ \Carbon\Carbon::parse($advertisement['created_at'])->diffForHumans() }}
                        </span>
                    </div>
                    <div>
                        <button type="button" wire:click="deleteAds({{ $advertisement['id'] }})"
                            class="p-2 text-lg text-yellow-500 rounded-full hover:text-red-500">
                            <i class="ti ti-trash"></i>
                        </button>
                    </div>
                </div>
                <p class="my-3">{{ $advertisement['title'] }}</p>

                <!-- Check if realEstate exists before accessing it -->
                @if (isset($advertisement['realEstate']))
                    <div class="grid grid-cols-12 gap-6">
                        @foreach ($advertisement['realEstate']['attachments'] as $attachment)
                            @if ($attachment['file_type'] === 'image')
                                <div class="col-span-6">
                                    {{-- <img src="{{ Storage::url($attachment['file_path']) }}" alt=""
                                        class="object-cover w-full rounded-md"> --}}
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif

                <div class="flex items-center gap-4 mt-4">
                    <div class="flex items-center gap-2 text-blue-500">
                        <i class="text-lg ti ti-eye"></i>
                        {{ $advertisement['views_count'] ? $advertisement['views_count'] : 0 }}
                    </div>
                    <div class="flex items-center gap-2 text-blue-500">
                        <i class="text-lg ti ti-thumb-up"></i>
                        {{ $advertisement['likes_count'] ? $advertisement['likes_count'] : 0 }}
                    </div>
                    <div class="flex items-center gap-2 text-green-500">
                        <i class="text-lg ti ti-share"></i>
                        {{ $advertisement['shares_count'] ? $advertisement['shares_count'] : 0 }}
                    </div>
                    <div class="flex items-center gap-2 text-yellow-500">
                        <i class="text-lg ti ti-star"></i>
                        {{ $advertisement['rating'] ? $advertisement['rating'] : 0 }}
                    </div>
                    <div class="flex items-center gap-2 text-yellow-500">
                        <i class="text-lg ti ti-message-2"></i>3
                    </div>
                    <div class="flex items-center ml-auto text-xs text-gray-600 dark:text-gray-400">
                        <i class="ti ti-point"></i>Mon, Jan 16
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    @livewire('views-count', ['adId' => $advertisement->id, 'viewsCount' => $advertisement->views->count()])
                    @livewire('likes-count', ['adId' => $advertisement->id, 'likesCount' => $advertisement->likes->count()])
                    @livewire('shares-count', ['adId' => $advertisement->id, 'sharesCount' => $advertisement->shares->count()])
                    @livewire('rating', ['adId' => $advertisement->id])
                </div>

                <div class="mt-8">
                    @livewire('comments',['adId'=>$advertisement->id])
                </div>
            </div>
        </div>
    @empty
        <p>No advertisements found.</p>
    @endforelse
</div>
