@props(['label', 'name', 'required' => false])

<div class="mb-4">
    <label class="block mb-2 text-sm font-medium text-dark dark:text-white" for="{{ $name }}">
        {{ $label }}
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </label>
    <input type="file" name="{{ $name }}" id="{{ $name }}"
        class="py-2.5 px-4 block w-full border @error($name) border-error @else border-gray-300 @enderror rounded-md text-sm focus:border-error focus:ring-error dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
        @if($required) required @endif
    >
    @error($name)
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
</div>
