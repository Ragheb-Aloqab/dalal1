@props([
    'class' => '',
    'p' => 4,
])
<div
    {{ $attributes->merge(['class' => "bg-white border border-gray-200 rounded-md  dark:bg-gray-800 dark:border-gray-700 mb-2 p-$p  $class  h-auto w-full"]) }}>
    {{ $slot }}
</div>
