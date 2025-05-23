<div class="grid grid-cols-12 md:gap-6 gap-y-6">
    <div class="col-span-12 mt-2">
        <label for=""
            class="block text-sm font-medium text-dark dark:text-white">الوسائط</label>
    </div>
    <div class="col-span-12 ">
        <div class="grid grid-cols-4 gap-2">
            @foreach ($existingImages as $image)
                <div class="relative w-full group">
                    <img src="{{ Storage::url($image->file_path) }}" alt="Uploaded Image"
                        class="object-cover w-full h-full rounded-lg shadow-md">
                    <button type="button" wire:click="deleteImage('{{ $image->id }}')"
                        class="absolute hidden text-lg rounded-full text-warning hover:text-warning group-hover:block"
                        style="right: 70% !important;top:8% !important"><i class="ti ti-trash"></i>
                    </button>
                </div>
            @endforeach
        </div>
    </div>
</div>
