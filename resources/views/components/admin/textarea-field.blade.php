@props([
    'id' => '',
    'name' => '',
    'label' => '',
    'value' => '',
    'rows' => 4,
    'required' => false,
    'placeholder' => '',
])
<div class="relative mb-2">
    <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-dark dark:text-white">
        {{ $label }}
    </label>

    <textarea id="{{ $id }}" name="{{ $name }}" rows="{{ $rows }}" {{ $required ? 'required' : '' }}
        placeholder="{{ $placeholder }}"
        class="py-2.5 px-4 block w-full border @error($name) border-error @else border-gray-300 @enderror rounded-md text-sm focus:border-error focus:ring-error dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
        aria-describedby="{{ $id }}-error">{{ old($name, $value) }}</textarea>

    @error($name)
        <div class="absolute inset-y-0 flex items-center pointer-events-none end-0 pe-3">
            <i class="text-lg font-medium leading-tight ti ti-alert-circle text-error"></i>
        </div>
        <p class="mt-2 text-sm text-error" id="{{ $id }}-error">{{ $message }}</p>
    @enderror
</div>
