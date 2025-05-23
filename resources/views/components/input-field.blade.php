@props(['label', 'name', 'type' => 'text', 'value' => ''])

<div>
    <!-- Input Label -->
    <x-input-label for="{{ $name }}" :value="$label" />

    <!-- Text Input Field -->
    <x-text-input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}"
        class="block w-full mt-1 border-secondary-300 bg-background-50 text-text-900 focus:border-primary-500 focus:ring-primary-500 dark:border-secondary-700 dark:bg-background-800 dark:text-white dark:focus:border-primary-400 dark:focus:ring-primary-400"
        :value="old($name, $value)" required autofocus autocomplete="{{ $name }}" />

    <!-- Input Error -->
    <x-input-error class="mt-2 text-red-600" :messages="$errors->get($name)" />
</div>
