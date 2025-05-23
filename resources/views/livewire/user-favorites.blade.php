<div>
    @forelse ($favorites as $ad)
        <x-card class="mb-2">
            <x-ads-card :ads="$ad" />
        </x-card>
    @empty
        <div class="flex items-center justify-center h-full p-4">
            <p class="text-center text-text-600">
                لا توجد مفضلات حتى الآن.
            </p>
        </div>
    @endforelse
</div>
