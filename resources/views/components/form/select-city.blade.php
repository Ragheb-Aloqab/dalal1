@props([
    'id' => 'city_id',
    'name' => 'city_id',
    'label' => 'City',
    'cityOptions' => [],
    'required' => false,
    'selected' => null, // To specify selected option
])

<div class="relative mb-1">
    <label for="{{ $id }}" class="block mb-2 text-sm font-semibold text-gray-800 dark:text-white">
        {{ $label }} @if ($required)
            <span class="text-red-500"></span>
        @endif
    </label>

    <select id="{{ $id }}" name="{{ $name }}" {{ $required ? 'required' : '' }}
        class="py-2.5 px-4 block w-full border-2 @error($name) border-red-500 @else border-gray-300 @enderror rounded-md text-sm focus:border-blue-600 focus:ring focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300"
        aria-describedby="{{ $id }}-error">
        @foreach ($cityOptions as $value => $text)
            <option value="{{ $value }}" {{ old($name, $selected) == $value ? 'selected' : '' }}>
                {{ $text }}
            </option>
        @endforeach
    </select>

    @error($name)
        <div class="absolute inset-y-0 left-0 flex items-center pl-3">
             <i
                class="text-lg font-medium leading-tight text-red-500 ti ti-alert-circle"></i>
        </div>
        <p class="mt-2 text-sm text-red-500" id="{{ $id }}-error">{{ $message }}</p>
    @enderror
</div>
