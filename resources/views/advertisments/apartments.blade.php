<x-app-layout>

    <x-container>
        <div class="container p-4 mx-auto">
            <h1 class="mb-4 text-2xl font-bold">Search Apartments</h1>

            <form action="{{ route('advertisements.apartments') }}" method="GET" class="space-y-4">
                <!-- Price Min -->
                <div class="flex flex-col">
                    <label for="price_min" class="font-semibold">Min Price</label>
                    <input type="number" name="price_min" id="price_min" value="{{ request('price_min') }}"
                        class="p-2 border rounded">
                </div>

                <!-- Price Max -->
                <div class="flex flex-col">
                    <label for="price_max" class="font-semibold">Max Price</label>
                    <input type="number" name="price_max" id="price_max" value="{{ request('price_max') }}"
                        class="p-2 border rounded">
                </div>

                <!-- City -->
                <div class="flex flex-col">
                    <label for="city_id" class="font-semibold">City</label>
                    <input type="text" name="city_id" id="city_id" value="{{ request('city_id') }}"
                        class="p-2 border rounded">
                </div>

                <!-- Rooms Number -->
                <div class="flex flex-col">
                    <label for="rooms_number" class="font-semibold">Min Rooms</label>
                    <input type="number" name="rooms_number" id="rooms_number" value="{{ request('rooms_number') }}"
                        class="p-2 border rounded">
                </div>

                <!-- Bathrooms Number -->
                <div class="flex flex-col">
                    <label for="bathrooms_number" class="font-semibold">Min Bathrooms</label>
                    <input type="number" name="bathrooms_number" id="bathrooms_number"
                        value="{{ request('bathrooms_number') }}" class="p-2 border rounded">
                </div>

                <!-- Condition -->
                <div class="flex flex-col">
                    <label for="condition" class="font-semibold">Condition</label>
                    <select name="condition" id="condition" class="p-2 border rounded">
                        <option value="">Any</option>
                        <option value="new" {{ request('condition') == 'new' ? 'selected' : '' }}>New</option>
                        <option value="used" {{ request('condition') == 'used' ? 'selected' : '' }}>Used</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded">Search</button>
            </form>
        </div>
        <x-card class="your-custom-class">
            <x-grid md="4" lg="4" gap="0" class="md:gap-1 sm:gap-x-0">
                <div class="col-span-1">
                    <x-card>
                        lsdjflk
                    </x-card>
                </div>
                <div class="col-span-3">
                    @forelse ($ads as $ad)
                        <x-card class="mb-2">
                            <x-ads-card :ads="$ad" />
                        </x-card>
                    @empty
                    @endforelse
                </div>
                {{ $ads->links() }}

            </x-grid>
        </x-card>
    </x-container>

</x-app-layout>
