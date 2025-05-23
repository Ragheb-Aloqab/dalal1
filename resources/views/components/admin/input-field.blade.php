@props(['label', 'name', 'type' => 'text', 'value' => ''])

<div class="mb-2">
    <!-- Label -->
    <label for="{{ $name }}"
        class="block mb-2 text-sm font-medium text-dark dark:text-white">{{ $label }}</label>

    <!-- Input Field -->
    <div class="relative">
        <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
            class="py-2.5 px-4 block w-full border @error($name) border-error @else border-gray-300 @enderror rounded-md text-sm focus:border-error focus:ring-error dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
            value="{{ old($name, $value) }}" required aria-describedby="{{ $name }}-error">

        <!-- Error Icon -->
        @error($name)
            <div class="absolute inset-y-0 flex items-center pointer-events-none end-0 pe-3">
                <i class="text-lg font-medium leading-tight ti ti-alert-circle text-error"></i>
            </div>
        @enderror
    </div>

    <!-- Error Message -->
    @error($name)
        <p class="mt-2 text-sm text-error" id="{{ $name }}-error">{{ $message }}</p>
    @enderror
</div>
