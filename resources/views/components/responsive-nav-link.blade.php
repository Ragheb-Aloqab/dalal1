{{-- responsive component --}}
@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'block w-full ps-3 pe-2 py-2 border-l-4 border-primary-500 text-start text-base font-medium text-primary-600 bg-primary-50 focus:outline-none focus:text-primary-700 focus:bg-primary-100 focus:border-primary-600 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-2 py-2 border-l-4 border-transparent text-start text-base font-medium text-text-600 hover:text-text-700 hover:bg-background-50 hover:border-background-300 focus:outline-none focus:text-text-700 focus:bg-background-50 focus:border-background-300 transition duration-150 ease-in-out';
@endphp
<li>
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
</li>
