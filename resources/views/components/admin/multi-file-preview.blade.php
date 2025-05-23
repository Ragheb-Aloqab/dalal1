@props([
    'name' => 'attachments',
    'label' => 'Upload Files',
    'placeholder' => 'Choose files',
    'existingImages' => [], // Existing images data
])
<div class="grid grid-cols-12 md:gap-6 gap-y-6">
    <div class="col-span-12">
        <label for="{{ $name }}"
            class="block mb-2 text-sm font-medium text-dark dark:text-white">{{ $label }}</label>
        <input type="file" id="{{ $name }}" name="{{ $name }}[]"
            class="py-2.5 px-4 block w-full form-control" multiple onchange="previewFiles(event)"
            aria-describedby="{{ $name }}-error">
        @error($name)
            <p class="mt-2 text-sm text-error" id="{{ $name }}-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="col-span-12">
        <div id="{{ $name }}-preview" class="grid grid-cols-4 gap-2">
            <!-- Preview existing images if provided -->
            @if (!empty($existingImages) && is_array($existingImages))
                @foreach ($existingImages as $image)
                    <div class="relative w-full group">
                        <img src="{{ asset($image->file_path) }}" alt="Uploaded Image"
                            class="object-cover w-full h-full rounded-lg shadow-md">
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
                                class="object-cover w-full h-full rounded-lg shadow-md">
                            <button
                                type="button"
                                onclick="removeImage(${index})"
                                class="absolute left-0 hidden p-2 text-lg rounded-full text-warning top-2 hover:text-warning group-hover:block"
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
