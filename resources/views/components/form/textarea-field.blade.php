@props([
    'id' => '',
    'name' => '',
    'label' => '',
    'value' => '',
    'rows' => 4,
    'required' => false,
    'placeholder' => '',
])

<div class="relative mb-0">
    <label for="{{ $id }}" class="block mb-2 text-sm font-semibold text-gray-800 dark:text-white">
        {{ $label }}
    </label>

    <textarea id="{{ $id }}" name="{{ $name }}" rows="{{ $rows }}" {{ $required ? 'required' : '' }}
        placeholder="{{ $placeholder }}"
        class="py-2.5 px-4 block w-full border-2 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error($name) border-red-500 @else border-gray-300 @enderror dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-500 dark:focus:ring-blue-500"
        aria-describedby="{{ $id }}-error">{{ old($name, $value) }}</textarea>

    @error($name)
    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
            <i class="text-lg leading-tight text-red-500 ti ti-alert-circle"></i>
        </div>
        <p class="mt-1 text-sm text-red-500" id="{{ $id }}-error">{{ $message }}</p>
    @enderror
</div>
