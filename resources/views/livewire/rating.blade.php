<div class="">
    <div class="flex justify-center p-1">
        <div class="flex justify-center rating">
            @for ($i = 5; $i >= 1; $i--)
                <!-- Generate unique IDs using `adId` and index `i` -->
                <label for="rating-{{ $adId }}-{{ $i }}" class="text-xl cursor-pointer {{ $i <= $userRating ? 'rated' : '' }}">
                    <span class="block">
                        &#9733; <!-- Star character -->
                    </span>
                    <input type="radio" id="rating-{{ $adId }}-{{ $i }}" value="{{ $i }}"
                           wire:model="userRating" wire:click="rate({{ $i }})" class="hidden">
                           {{-- @if (!$isAuthenticated) disabled @endif> --}}
                </label>
            @endfor
        </div>
        <div class="px-1 mt-1 text-center">
           <span class="font-semibold">{{ number_format($averageRating, 1) }}/5</span>
        </div>
    </div>
</div>
