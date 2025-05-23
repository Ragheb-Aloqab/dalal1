@props(['land', 'iconColor' => '#2c3e50'])

<div class="flex items-center space-x-2 text-center">
    {{-- Area Icon --}}
    <div class="flex items-center px-3 mx-2 text-center bg-gray-200 rounded-full">
        <i class="ti ti-ruler-2" style="color: {{ $iconColor }};"></i>
        <span class="px-1 text-lg">{{ $land->area }} قدم مربع</span>
    </div>

    {{-- Water Availability Icon --}}
    <div class="flex items-center px-3 mx-2 text-center bg-gray-200 rounded-full">
        <i class="ti ti-droplet" style="color: {{ $iconColor }};"></i>
        <span class="px-1 text-lg">{{ $land->water ? 'متوفر' : 'غير متوفر' }}</span>
    </div>

    {{-- Electricity Availability Icon --}}
    <div class="items-center px-3 mx-2 text-center bg-gray-200 rounded-full sm:flex xs:hidden ">
        <i class="ti ti-bolt" style="color: {{ $iconColor }};"></i>
        <span class="px-1 text-lg">{{ $land->electricity ? 'متوفر' : 'غير متوفر' }}</span>
    </div>


