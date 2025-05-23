<div class="">
    <!-- Sticky Search Bar -->
    <div class="sticky top-0 z-50 p-6 border-b bg-background-50 border-secondary-300 dark:bg-background-900 dark:border-secondary-700">
        <x-content>
            <div class="flex flex-col gap-4 md:flex-row">
                <!-- City Selector -->
                <div class="flex-1">
                    @php
                        $cities = App\Models\City::all(); // Retrieve all cities directly in the Blade view
                    @endphp
                    <select id="city_id" name="city_id" wire:model.live="city"
                        class="block w-full mt-1 rounded-md bg-background-50 border-accent-300 text-text-700 dark:bg-background-800 dark:text-text-300 dark:border-secondary-600 focus:border-primary-500 focus:ring-primary-500"
                        required>
                        <option value="">{{ __('اختر المدينة') }}</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                {{ $city->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Search Input -->
                <div class="flex-1">
                    <input type="text" wire:model.live="search"
                        placeholder="البحث بالاسم أو البريد الإلكتروني أو الهاتف أو الموقع أو ....."
                        class="block w-full mt-1 rounded-md bg-background-50 border-accent-300 text-text-700 dark:bg-background-800 dark:text-text-300 dark:border-secondary-600 focus:border-primary-500 focus:ring-primary-500">
                </div>
            </div>
        </x-content>
    </div>

    <x-content>
        <!-- Cards Section -->
        <div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-2 lg:grid-cols-4">
            @forelse ($companies as $company)
                <x-card :p="0">
                    <div class="block border rounded-lg shadow-lg bg-background-50 dark:bg-background-800 border-accent-300 dark:border-secondary-700">
                        <a href="{{ route('companies.show', $company->id) }}">
                            <img class="object-cover w-full h-48 rounded-t-lg"
                                src="{{ $company->image ? Storage::url($company->image) : 'https://tecdn.b-cdn.net/img/new/standard/nature/184.jpg' }}"
                                alt="{{ $company->name }}" />
                        </a>
                        <div class="p-4 text-text-700 dark:text-text-300">
                            <div class="flex flex-col gap-2">
                                <div class="text-lg font-semibold text-primary-600 dark:text-primary-400">{{ $company->name }}</div>
                                <div class="flex flex-col">
                                    <p class="text-sm">{{ $company->user->phone }}</p>
                                    <p class="text-sm">{{ $company->user->city->name }}</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between mt-4">
                                <div class="flex-1">
                                    <p class="text-sm">{{ Str::limit($company->description, 60) }}</p>
                                </div>
                                <svg class="w-5 h-5 transition-transform duration-300 cursor-pointer text-primary-600 dark:text-primary-400 hover:scale-110"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </x-card>
            @empty
                <p class="col-span-1 text-center text-text-600 dark:text-text-300">لا توجد شركات متاحة.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $companies->links() }}
        </div>
    </x-content>
</div>
