<x-app-layout>

    <x-container>
        <div class="container px-4 mx-auto">
            <h1 class="mb-4 text-2xl font-bold">Search Lands</h1>

            <form action="{{ route('advertisements.lands') }}" method="GET" class="space-y-4">
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

                <!-- Area -->
                <div class="flex flex-col">
                    <label for="area" class="font-semibold">Min Area (sqm)</label>
                    <input type="number" name="area" id="area" value="{{ request('area') }}"
                        class="p-2 border rounded">
                </div>

                <!-- Water Line -->
                <div class="flex flex-col">
                    <label for="water" class="font-semibold">Water Line</label>
                    <select name="water" id="water" class="p-2 border rounded">
                        <option value="">Any</option>
                        <option value="1" {{ request('water') == '1' ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ request('water') == '0' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <!-- Electricity Line -->
                <div class="flex flex-col">
                    <label for="electricity" class="font-semibold">Electricity Line</label>
                    <select name="electricity" id="electricity" class="p-2 border rounded">
                        <option value="">Any</option>
                        <option value="1" {{ request('electricity') == '1' ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ request('electricity') == '0' ? 'selected' : '' }}>No</option>
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
