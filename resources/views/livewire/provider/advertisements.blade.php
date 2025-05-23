<x-container>
    <x-card class="your-custom-class">
        <div class="mb-4">
            <div>
                <!-- Filters -->
                <input wire:model.debounce.300ms="filters.title" type="text" placeholder="Search by title" />
                <select wire:model="filters.status">
                    <option value="">Select Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="expired">Expired</option>
                </select>
            </div>

        </div>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-4 lg:grid-cols-4">
            <div class="col-span-3">
                @forelse ($advertisements as $ad)
                    <div class="p-4 mb-4 border border-gray-300 rounded-lg shadow-md">
                        <x-ads-card :ads="$ad" :provider="true"/>
                    </div>
                @empty
                    <div class="text-gray-500">No advertisements found.</div>
                @endforelse

                <div class="mt-4">
                    {{ $advertisements->links() }} <!-- Render pagination links -->
                </div>
            </div>

            <div class="col-span-1">

                <x-card :p="0" class="relative">
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('assets/images/svgs/search-icon-map.svg') }}" alt="Search Icon"
                            class="w-full h-auto" />
                        <button type="button"
                            class="absolute inline-flex items-center px-2 py-0.5 text-sm font-medium text-blue-700 border border-blue-700 rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-transparent dark:focus:ring-blue-800 opacity-80 bg-transparent hover:bg-transparent bottom-4"
                            style="color: #006169">
                            <span
                                class="inline-flex items-center justify-center w-8 h-8 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full ms-2">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-map-pin-search" width="44" height="44"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="#135245FF" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M14.916 11.707a3 3 0 1 0 -2.916 2.293" />
                                    <path
                                        d="M11.991 21.485a1.994 1.994 0 0 1 -1.404 -.585l-4.244 -4.243a8 8 0 1 1 13.651 -5.351" />
                                    <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                    <path d="M20.2 20.2l1.8 1.8" />
                                </svg>
                            </span>
                            البحث باستخدام الخريطة
                        </button>
                    </div>
                </x-card>


            </div>
        </div>
    </x-card>
</x-container>


