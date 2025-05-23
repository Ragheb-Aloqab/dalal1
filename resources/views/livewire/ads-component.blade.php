<div>
    <x-card class="mb-2">
        <article class="relative md:gap-4 md:grid md:grid-cols-3" wire:key="ad-{{ $ads->id }}">
            <div class="absolute top-0 left-0 flex items-center gap-2 text-warning dark:text-yellow-300">
                @if ($provider)
                    @if (auth()->user()->isProvider())
                        <a href="{{ route('provider.advertisements.edit', $ads->id) }}" class="mx-4">
                            <i class="text-lg text-gray-500 ti ti-trash hover:text-red-700" style="cursor: pointer;"></i>
                        </a>
                        <i class="text-lg text-red-500 ti ti-trash hover:text-red-700"
                            wire:click="delete({{ $ads->id }})" style="cursor: pointer;"></i>
                    @endif
                @else
                    @livewire('favorite', ['adId' => $ads->id], key($ads->id))
                @endif
            </div>
            <div>
                <div class="flex items-center mb-2">
                    <x-avatar :avatar="$ads->provider->logo ?? ''" :name="$ads->provider->user->name ?? 'Unknown'" width="10" height="10" />
                    <div class="font-medium ms-4 dark:text-white">
                        <p>{{ $ads->provider->name ?? 'Unknown Provider' }}</p>
                        <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                            {{ $ads->provider->user->name ?? 'Anonymous' }}
                        </div>
                    </div>
                    <div class="pb-4 mx-2">
                        @livewire('follow-button', ['providerId' => $ads->provider->id], key($ads->provider->id))
                    </div>
                </div>
                <x-image-group :images="$ads->realEstate->attachments()->pluck('file_path')->toArray()" />
            </div>
            <div class="col-span-2 mt-4 md:mt-4">
                <div class="flex items-start mb-2">
                    <div class="w-full pe-4">
                        <footer class="w-full">
                            <div class="flex justify-between">
                                <p class="mb-1 text-sm text-gray-500 dark:text-gray-400">
                                    تم النشر
                                    <time
                                        datetime="{{ $ads->created_at }}">{{ $ads->created_at->diffForHumans() }}</time>
                                </p>
                                <p class="items-center inline py-0 mx-2 -mt-1 font-semibold">
                                    <span class="p-1 text-sm text-white bg-blue-700 rounded">
                                        {{ $ads->realEstate->price }} ريال
                                    </span>
                                </p>
                            </div>
                        </footer>
                        <h4 class="w-full text-xl font-semibold text-gray-900 dark:text-white">
                            {{ Str::limit($ads->title, 50, '......') }}
                        </h4>
                    </div>
                </div>
                <div class="py-1">
                    @if ($ads->realEstate->isApartment())
                        <x-realEstate.apartment-info :apartment="$ads->realEstate->realEstateable" iconColor="#ff5722" :filled="true" />
                    @endif
                    @if ($ads->realEstate->isBuilding())
                        <x-realEstate.building-info :building="$ads->realEstate->realEstateable" iconColor="#ff5722" :filled="true" />
                    @endif
                    @if ($ads->realEstate->isLand())
                        <x-realEstate.land-info :land="$ads->realEstate->realEstateable" iconColor="#ff5722" :filled="true" />
                    @endif
                </div>
                <p class="mb-1 text-gray-500 dark:text-gray-400">
                    {{ Str::limit($ads->realEstate->description, 150, '......') }}
                    <br>
                    {{ Str::limit($ads->realEstate->boundaries, 150, '......') }}
                </p>
                <div class="flex items-center gap-4 mt-2">
                    @livewire('likes-count', ['adId' => $ads->id, 'likesCount' => $ads->likes->count()], key($ads->id))
                    @livewire('shares-count', ['adId' => $ads->id, 'sharesCount' => $ads->shares->count()], key($ads->id))
                    @livewire('views-count', ['adId' => $ads->id, 'viewsCount' => $ads->views->count()], key($ads->id))
                    <div class="flex items-center gap-2 text-warning dark:text-yellow-300">
                        <i class="text-lg ti ti-message-2 text-warning dark:text-yellow-300"></i>
                        {{ $ads->comments->count() }}
                    </div>
                    <div class="flex items-center text-xs ms-auto text-bodytext dark:text-gray-400">
                        <a
                            href="{{ $provider ? route('advertisements.show', $ads->id) : route('ads.show', $ads->id) }}">show</a>
                    </div>
                </div>
            </div>
        </article>
    </x-card>
</div>
