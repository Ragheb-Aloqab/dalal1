@props([
    'name' => 'inputs', // Base name for input fields
    'label' => 'Inputs',
    'values' => [], // Initial values for the inputs
    'placeholder' => 'Enter value',
    'inputType' => 'text', // Type of input field
])
<div class="grid grid-cols-12 md:gap-6 gap-y-6">
    <div class="col-span-12 md:col-span-12">
        <label class="block my-2 text-sm font-medium text-dark dark:text-white">{{ $label }}</label>

        <div id="multi-input-container">
            @foreach ($values as $index => $value)
                <div class="relative flex items-center mb-2">
                    <!-- Delete Icon -->
                    <button type="button" onclick="removeInputField(this)"
                        class="absolute inset-y-0 left-0 flex items-center px-3 text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300"
                        aria-label="Remove input">
                        <i class="ti ti-trash"></i>
                    </button>

                    <input type="{{ $inputType }}" name="{{ $name }}[]" value="{{ $value }}"
                        placeholder="{{ $placeholder }}"
                        class="py-2.5 px-4 pl-10 block w-full border @error($name . '.' . $index) border-error @else border-gray-300 @enderror rounded-md text-sm focus:border-error focus:ring-error dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                        aria-describedby="{{ $name }}-error-{{ $index }}">
                    @error($name . '.' . $index)
                        <p class="mt-2 text-sm text-error" id="{{ $name }}-error-{{ $index }}">
                            {{ $message }}</p>
                    @enderror
                </div>
            @endforeach
        </div>

        <!-- Button to Add More Fields -->
        <button type="button" onclick="addInputField('{{ $name }}')" class="btn btn-light">
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
            inputField.classList.add('relative', 'mb-2', 'flex', 'items-center');
            inputField.innerHTML = `
                <button
                    type="button"
                    onclick="removeInputField(this)"
                    class="absolute inset-y-0 left-0 flex items-center px-3 text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300"
                    aria-label="Remove input"
                >
                    <i class="ti ti-trash"></i>
                </button>
                <input
                    type="text"
                    name="${name}[]"
                    placeholder="Enter value"
                    class="py-2.5 px-4 pl-10 block w-full border border-gray-300 rounded-md text-sm focus:border-error focus:ring-error dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                    aria-describedby="${name}-error-${newIndex}"
                >
            `;
            container.appendChild(inputField);
        }
    });
</script>
