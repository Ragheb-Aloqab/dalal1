@props([
    'name' => 'attachments',
    'label' => 'Upload Files',
    'placeholder' => 'Choose files',
    'existingImages' => [], // Existing images data
])

<div class="grid grid-cols-12 md:gap-6 gap-y-6">
    <div class="col-span-12">
        <label for="{{ $name }}"
            class="block mb-2 text-sm font-semibold text-gray-800 dark:text-white">{{ $label }}</label>
        <input type="file" id="{{ $name }}" name="{{ $name }}[]"
            class="block w-full px-4 py-1 text-base transition duration-200 ease-in-out border-2 border-gray-300 rounded-lg focus:border-blue-600 focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300"
            multiple onchange="previewFiles(event)" aria-describedby="{{ $name }}-error">
        @error($name)
            <p class="mt-2 text-sm text-red-500" id="{{ $name }}-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="col-span-12">
        <div id="{{ $name }}-preview" class="grid grid-cols-2 gap-4 md:grid-cols-4">
            @if (!empty($existingImages) && is_array($existingImages))
                @foreach ($existingImages as $image)
                    <div class="relative w-full group">
                        <img src="{{ asset($image->file_path) }}" alt="Uploaded Image"
                            class="object-cover w-full h-full transition-transform transform rounded-lg shadow-md group-hover:scale-105">
                        <button type="button" onclick="deleteImage('{{ $image->id }}', this)"
                            class="absolute hidden p-2 text-lg text-red-600 bg-red-600 rounded-full top-2 left-2 hover:bg-red-700 group-hover:block"
                            aria-label="Delete image">
                            <i class="ti ti-trash"></i>
                        </button>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<script>
    function previewFiles(event) {
        const previewContainer = document.getElementById(event.target.id + '-preview');
        previewContainer.innerHTML = ''; // Clear previous previews

        const files = event.target.files;
        if (files) {
            for (const file of files) {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const index = previewContainer.children.length; // Index for new image
                        const wrapper = document.createElement('div');
                        wrapper.classList.add('relative', 'w-full', 'group');
                        wrapper.innerHTML = `
                            <img src="${e.target.result}" alt="Preview Image"
                                class="object-cover w-full h-full transition-transform transform rounded-lg shadow-md group-hover:scale-105">
                            <button
                                type="button"
                                onclick="removeImage(${index})"
                                class="absolute left-0 hidden p-2 text-lg text-red-600 rounded-full top-2 hover:text-red-800 group-hover:block"
                                aria-label="Delete image"
                            >
                                <i class="ti ti-trash"></i>
                            </button>
                        `;
                        previewContainer.appendChild(wrapper);
                    };
                    reader.readAsDataURL(file);
                }
            }
        }
    }

    function removeImage(index) {
        const previewContainer = document.getElementById('{{ $name }}-preview');
        previewContainer.children[index].remove();
    }

    function deleteImage(imageId, button) {
        button.closest('div').remove();
    }
</script>
