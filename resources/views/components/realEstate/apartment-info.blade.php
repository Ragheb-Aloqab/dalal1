{{-- apartment-list.blade.php
@props(['apartment', 'iconColor' => '#2c3e50', 'filled' => false])

<div class="grid grid-cols-12 gap-6">

    <div class="col-span-12 p-4 border rounded-lg shadow-md md:col-span-4">
        <div class="flex items-center mb-2">
            <h3 class="text-lg font-semibold">{{ $apartment->title }}</h3>
        </div>

        <div class="flex items-center mb-2">
            <i class="w-6 h-6 mr-2 ti ti-building" style="color: {{ $iconColor }};"></i>
            <span>{{ __('رقم الطابق:') }} {{ $apartment->floor_number }}</span>
        </div>

        <div class="flex items-center mb-2">
            <i class="ti ti-bed{{ $filled ? '-filled' : '' }} w-6 h-6 mr-2" style="color: {{ $iconColor }};"></i>
            <span>{{ __('عدد الغرف:') }} {{ $apartment->rooms_number }}</span>
        </div>

        <div class="flex items-center mb-2">
            <i class="ti ti-bath{{ $filled ? '-filled' : '' }} w-6 h-6 mr-2" style="color: {{ $iconColor }};"></i>
            <span>{{ __('عدد الحمامات:') }} {{ $apartment->bathrooms_number }}</span>
        </div>

        <div class="flex items-center mb-2">
            <i class="w-6 h-6 mr-2 ti ti-kitchen" style="color: {{ $iconColor }};"></i>
            <span>{{ __('عدد المطابخ:') }} {{ $apartment->kitchens_number }}</span>
        </div>

        <div class="flex items-center">
            <i class="w-6 h-6 mr-2 ti ti-home" style="color: {{ $iconColor }};"></i>
            <span>{{ __('الحالة:') }} {{ $apartment->condition }}</span>
        </div>
    </div>
</div> --}}

{{-- apartment-list.blade.php --}}
{{-- apartment-list.blade.php --}}
{{-- apartment-list.blade.php --}}
@props(['apartment', 'iconColor' => '#2c3e50', 'filled' => false])



<div class="flex items-center space-x-2 text-center"> {{-- Add space between icons --}}
    {{-- Floor Number Button --}}
    <div class="flex items-center px-3 mx-2 text-center bg-gray-200 rounded-full">
        <i class="text-lg ti ti-building" style="color: {{ $iconColor }};"></i>
        <span class="px-1 text-lg">{{ $apartment->floor_number }}</span>
    </div>

    {{-- Rooms Number Button --}}
    <div class="flex items-center px-3 mx-2 text-center bg-gray-200 rounded-full">
        <i class="ti ti-bed{{ $filled ? '-filled' : '' }}" style="color: {{ $iconColor }};"></i>
        <span class="px-1 text-lg">{{ $apartment->rooms_number }}</span>
    </div>

    {{-- Bathrooms Number Button --}}
    <div class="flex items-center px-3 mx-2 text-center bg-gray-200 rounded-full">
        <i class="ti ti-bath{{ $filled ? '-filled' : '' }}" style="color: {{ $iconColor }};"></i>
        <span class="px-1 text-lg">{{ $apartment->bathrooms_number }}</span>
    </div>

    {{-- Kitchens Number Button --}}
    <div class="flex items-center px-3 mx-2 text-center bg-gray-200 rounded-full">
        <i class="ti ti-soup" style="color: {{ $iconColor }};"></i>
        <span class="px-1 text-lg">{{ $apartment->kitchens_number }}</span>
    </div>

    {{-- Condition Button --}}
    <div class="flex items-center px-3 mx-2 text-center bg-gray-200 rounded-full">
        <i class="ti ti-home" style="color: {{ $iconColor }};"></i>
        <span class="px-1 text-lg">{{ $apartment->condition }}</span>
    </div>
</div>
