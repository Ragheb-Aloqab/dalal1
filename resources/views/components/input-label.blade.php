{{-- input-label component --}}
@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-text-700']) }}>
    {{ $value ?? $slot }}
</label>
