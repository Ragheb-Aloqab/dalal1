@props(['md' => 1, 'lg' => 3, 'gap' => 6])
<div {{ $attributes->merge(['class' => "grid grid-cols-1 md:grid-cols-{$md} lg:grid-cols-{$lg} gap-{$gap}"]) }}>
    {{ $slot }}
</div>
