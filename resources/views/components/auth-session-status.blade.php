{{-- auth-session component --}}
@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-text-500']) }}>
        {{ $status }}
    </div>
@endif
