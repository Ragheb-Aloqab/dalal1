<div>
    @if ($isAuthenticated)
        <button wire:click="toggleFavorite" class="focus:outline-none">
            @if ($isFavorite)
                <i class="text-lg text-red-500 ti ti-heart-filled"></i> <!-- Favorited icon -->
            @else
                <i class="text-lg text-red-500 ti ti-heart"></i> <!-- Not favorited icon -->
            @endif
        </button>
    @else
        <button class="focus:outline-none" wire:click="toggleFavorite">
            <i class="text-lg text-red-500 ti ti-heart"></i> <!-- Not favorited icon for non-auth users -->
        </button>
    @endif
</div>
