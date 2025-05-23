<div class="container px-4 py-8 mx-auto">
    @if (session()->has('message'))
        <div class="p-3 text-white bg-green-500 rounded">
            {{ session('message') }}
        </div>
    @endif

    <h2 class="mb-6 text-2xl font-bold">Advertisements</h2>

    <!-- Add Advertisement Form -->
    <form wire:submit.prevent="store" enctype="multipart/form-data" class="p-6 space-y-6 bg-white rounded-md shadow-md">
        <!-- Title -->
        <input type="text" wire:model="title" placeholder="Title" required
            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
        @error('title')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <!-- Provider ID -->
        <input type="text" wire:model="provider_id" placeholder="Provider ID" required
            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
        @error('provider_id')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <!-- Advertisement Status -->
        <select wire:model="ads_status" required
            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
        @error('ads_status')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <!-- Description -->
        <textarea wire:model="description" placeholder="Description" required
            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-200"></textarea>
        @error('description')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <!-- Boundaries -->
        <input type="text" wire:model="boundaries" placeholder="Boundaries" required
            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
        @error('boundaries')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <!-- City ID -->
        <input type="text" wire:model="city_id" placeholder="City ID" required
            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
        @error('city_id')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <!-- Location -->
        <input type="text" wire:model="location" placeholder="Location" required
            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
        @error('location')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <!-- Price -->
        <input type="number" wire:model="price" placeholder="Price" required
            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
        @error('price')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <!-- Commercial Number -->
        <input type="text" wire:model="commercial_number" placeholder="Commercial Number" required
            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
        @error('commercial_number')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <!-- Status (Sale/Rent) -->
        <select wire:model="status" required
            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
            <option value="sale">Sale</option>
            <option value="rent">Rent</option>
        </select>
        @error('status')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <!-- Real Estate Type Selection -->
        <select wire:model.live="real_estate_type" required
            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
            <option value="">Select Real Estate Type</option>
            <option value="apartment">Apartment</option>
            <option value="building">Building</option>
            <option value="land">Land</option>
        </select>
        @error('real_estate_type')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <!-- Apartment Fields (conditional) -->
        @if ($real_estate_type === 'apartment')
            <div class="grid grid-cols-2 gap-4">
                <input type="number" wire:model="floor_number" placeholder="Floor Number" required
                    class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
                @error('floor_number')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                <input type="number" wire:model="rooms_number" placeholder="Rooms Number" required
                    class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
                @error('rooms_number')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                <input type="number" wire:model="bathrooms_number" placeholder="Bathrooms Number" required
                    class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
                @error('bathrooms_number')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                <input type="number" wire:model="kitchens_number" placeholder="Kitchens Number" required
                    class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
                @error('kitchens_number')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                <select wire:model="condition" required
                    class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
                    <option value="new">New</option>
                    <option value="old">Old</option>
                </select>
                @error('condition')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        @endif

        <!-- Building Fields (conditional) -->
        @if ($real_estate_type === 'building')
            <div class="grid grid-cols-2 gap-4">
                <input type="number" wire:model="total_floors" placeholder="Total Floors" required
                    class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
                @error('total_floors')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                <input type="number" wire:model="total_units" placeholder="Total Units" required
                    class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
                @error('total_units')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                <select wire:model="building_age" required
                    class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
                    <option value="new">New</option>
                    <option value="old">Old</option>
                </select>
                @error('building_age')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        @endif

        <!-- Land Fields (conditional) -->
        @if ($real_estate_type === 'land')
            <div class="grid grid-cols-2 gap-4">
                <input type="text" wire:model="land_area" placeholder="Land Area (sq meters)" required
                    class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
                @error('land_area')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                <select wire:model="land_type" required
                    class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
                    <option value="residential">Residential</option>
                    <option value="commercial">Commercial</option>
                    <option value="agricultural">Agricultural</option>
                </select>
                @error('land_type')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        @endif

        <!-- Add Attachments -->
        <input type="file" wire:model="attachments" multiple
            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
        @error('attachments')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

        <!-- Submit Button -->
        <button type="submit" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-md">
            Add Advertisement
        </button>
    </form>

    {{-- <!-- Delete Advertisement -->
    <h2 class="mt-10 mb-6 text-2xl font-bold">Delete Advertisement</h2>
    <form wire:submit.prevent="delete" class="p-6 space-y-6 bg-white rounded-md shadow-md">
        <input type="text" wire:model="advertisement_id" placeholder="Advertisement ID to delete"
            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-200">
        @error('advertisement_id') <span class="text-red-500">{{ $message }}</span> @enderror

        <button type="submit" class="px-4 py-2 font-semibold text-white bg-red-500 rounded-md">
            Delete Advertisement
        </button>
    </form> --}}
    <ul class="mt-8 space-y-4">
        @foreach ($advertisements as $advertisement)
            <li class="flex items-center justify-between p-4 bg-white rounded-md shadow-md">
                <span>{{ $advertisement->title }}</span>
                <button wire:click="delete({{ $advertisement->id }})"
                    class="text-red-600 hover:text-red-800 focus:outline-none focus:ring focus:ring-red-300">
                    Delete
                </button>
            </li>
        @endforeach
    </ul>
</div>
