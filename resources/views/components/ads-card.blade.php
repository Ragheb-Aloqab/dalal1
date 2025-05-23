@props([
    'ad' => null,
    'provider' => false,
])

<article class="relative md:gap-4 md:grid md:grid-cols-3" wire:key="ad-{{ $ad->id }}">
    <div class="absolute top-0 left-0 flex items-center gap-2 text-warning dark:text-yellow-300">
        @if ($provider)
            @if (auth()->user()->isProvider())
                <a href="{{ route('provider.advertisements.edit', $ad->id) }}" class="mx-4">
                    <i class="text-lg text-gray-500 ti ti-trash hover:text-red-700" style="cursor: pointer;"></i>
                </a>
                <i class="text-lg text-red-500 ti ti-trash hover:text-red-700" wire:click="delete({{ $ad->id }})"
                    style="cursor: pointer;"></i>
            @endif
        @else
            @livewire('favorite', ['adId' => $ad->id], key('favorite-' . $ad->id))
        @endif
    </div>
    <div>
        <div class="flex items-center mb-2">
            <x-avatar :avatar="$ad->provider->logo ?? ''" :name="$ad->provider->user->name ?? 'Unknown'" width="10" height="10" />
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
                            <span class="p-0.5 text-sm text-white bg-blue-700 rounded">
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
                <x-realEstate.apartment-info :apartment="$ad->realEstate->realEstateable" iconColor="#ff5722" :filled="true" />
            @endif

            @if ($ad->realEstate->isBuilding())
                <x-realEstate.building-info :building="$ad->realEstate->realEstateable" iconColor="#ff5722" :filled="true" />
            @endif

            @if ($ad->realEstate->isLand())
                <x-realEstate.land-info :land="$ad->realEstate->realEstateable" iconColor="#ff5722" :filled="true" />
            @endif
        </div>

        <p class="my-1 text-gray-500 dark:text-gray-400">
            {{ Str::limit($ad->realEstate->description, 150, '......') }}

        </p>
        <p class="my-1 text-gray-500 dark:text-gray-400">
            {{ Str::limit($ad->realEstate->boundaries, 150, '......') }}
        </p>
        <div class="flex items-center gap-4 mt-2">
            @livewire('likes-count', ['adId' => $ad->id, 'likesCount' => $ad->likes->count()], key('likes-count-' . $ad->id))
            @livewire('shares-count', ['adId' => $ad->id, 'sharesCount' => $ad->shares->count()], key('shares-count-' . $ad->id))
            @livewire('views-count', ['adId' => $ad->id, 'viewsCount' => $ad->views->count()], key('views-count-' . $ad->id))

            <div class="flex items-center gap-2 text-warning dark:text-yellow-300">
                <i class="text-lg ti ti-message-2 text-warning dark:text-yellow-300"></i>
                {{ $ad->comments->count() }}
            </div>
            @livewire('rating', ['adId' => $ad->id, 'viewsCount' => $ad->views->count()], key('ratings-count-' . $ad->id))
            <div class="flex items-center text-xs ms-auto text-bodytext dark:text-gray-400">
                <a
                    href="{{ $provider ? route('provider.advertisements.show', $ad->id) : route('advertisements.show', $ad->id) }}"  class="transition-colors duration-300 text-primary-500 hover:text-primary-600 dark:text-primary-400 dark:hover:text-primary-500">عرض</a>
            </div>
        </div>
    </div>
</article>
