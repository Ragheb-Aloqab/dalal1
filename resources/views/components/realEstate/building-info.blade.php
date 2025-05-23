
@props(['building', 'iconColor' => '#2c3e50'])

<div class="flex items-center space-x-2 text-center">
    {{-- Floors Icon --}}
    <div class="flex items-center px-3 mx-2 text-center bg-gray-200 rounded-full">
        <i class="ti ti-building" style="color: {{ $iconColor }};"></i>
        <span class="px-1 text-lg">{{ $building->floors_number }} طوابق</span>
    </div>

    {{-- Apartments Icon --}}
    <div class="flex items-center px-3 mx-2 text-center bg-gray-200 rounded-full">
        <i class="ti ti-key" style="color: {{ $iconColor }};"></i>
        <span class="px-1 text-lg">{{ $building->apartments_count }} شقق</span>
    </div>
</div>
