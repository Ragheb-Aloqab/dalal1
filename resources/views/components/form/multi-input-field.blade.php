@props([
    'name' => 'inputs',
    'label' => 'Inputs',
    'values' => [],
    'placeholder' => 'Enter value',
    'inputType' => 'text',
])
<div class="grid grid-cols-12 md:gap-6 gap-y-6">
    <div class="col-span-12 md:col-span-12">
        <label class="block mb-2 text-sm font-semibold text-gray-800 dark:text-white">{{ $label }}</label>
        <div id="multi-input-container">
            @foreach ($values as $index => $value)
                <div class="relative flex items-center mb-4">
                    <!-- Delete Icon -->
                    <button type="button" onclick="removeInputField(this)"
                        class="absolute inset-y-0 left-0 flex items-center px-3 text-red-600 transition duration-200 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300"
                        aria-label="Remove input">
                        <i class="ti ti-trash"></i>
                    </button>
                    <input type="{{ $inputType }}" name="{{ $name }}[]" value="{{ $value }}"
                        placeholder="{{ $placeholder }}"
                        class="py-2.5 px-4 pl-10 block w-full border-2 @error($name . '.' . $index) border-red-500 @else border-gray-300 @enderror rounded-lg text-base focus:border-red-600 focus:ring focus:ring-red-600 focus:ring-opacity-50 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300"
                        aria-describedby="{{ $name }}-error-{{ $index }}">
                    @error($name . '.' . $index)
                        <p class="mt-2 text-sm text-red-500" id="{{ $name }}-error-{{ $index }}">
                            {{ $message }}</p>
                    @enderror
                </div>
            @endforeach
        </div>

        <!-- Button to Add More Fields -->
        <button type="button" onclick="addInputField('{{ $name }}')"
            class="px-4 py-2 mt-2 text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            إضافة حقل
        </button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add event listener to dynamically added elements
        window.removeInputField = function(button) {
            button.closest('div.relative').remove();
        }

        window.addInputField = function(name) {
            const container = document.getElementById('multi-input-container');
            const newIndex = container.querySelectorAll('input').length;
            const inputField = document.createElement('div');
            inputField.classList.add('relative', 'my-1', 'flex', 'items-center');
            inputField.innerHTML = `
                <button
                    type="button"
                    onclick="removeInputField(this)"
                    class="absolute inset-y-0 left-0 flex items-center px-3 text-red-600 transition duration-200 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300"
                    aria-label="Remove input"
                >
                    <i class="ti ti-trash"></i>
                </button>
                <input
                    type="text"
                    name="${name}[]"
                    placeholder="Enter value"
                    class="block w-full py-2.5 px-4 pl-10 text-base border-2 border-gray-300 rounded-lg focus:border-blue-600 focus:ring focus:ring-blue-600 focus:ring-opacity-50 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300"
                    aria-describedby="${name}-error-${newIndex}"
                >
            `;
            container.appendChild(inputField);
        }
    });
</script>
