<!-- resources/views/components/image-gallery.blade.php -->
@props([
    'images' => [],
])

@php
    $totalImages = count($images);
@endphp

<div class="w-full h-[60vh]  relative"> <!-- Height set to 60vh -->
    @if ($totalImages == 1)
        <!-- Full width for one image -->
        <div class="mb-4">
            <img class="object-cover w-full h-full rounded-md" src="{{ Storage::url($images[0]->file_path) }}" alt="">
        </div>
    @elseif ($totalImages == 2)
        <!-- Two images side by side -->
        <div class="grid grid-cols-2 gap-1 mb-4">
            @foreach ($images as $image)
                <img class="object-cover w-full h-full rounded-md" src="{{ Storage::url($image->file_path) }}" alt="">
            @endforeach
        </div>
    @elseif ($totalImages >= 3)
        <!-- Display the first image larger with max height -->
        <div class="grid grid-cols-1 gap-1 mb-4 md:grid-cols-4">
            <div class="col-span-3">
                <img class="object-cover max-h-[70%] w-full rounded-md" src="{{ Storage::url($images[0]->file_path) }}" alt="">
            </div>
            <div class="col-span-1 max-h-[70%]">
                <div class="grid h-full grid-cols-3 gap-1 md:grid-cols-1"> <!-- Set to full height -->
                    @for ($i = 1; $i < min($totalImages, 3); $i++)
                            <img class="object-cover w-full h-32 rounded-md" src="{{ Storage::url($images[$i]->file_path) }}" alt=""> <!-- Use h-full to fill parent -->
                    @endfor
                    @if ($totalImages > 3)
                        <!-- Show overlay with number of remaining images -->
                        <div class="relative ">
                            <img class="object-cover w-full rounded-md " src="{{ Storage::url($images[4]->file_path) }}" alt="">
                            <div class="absolute inset-0 flex items-center justify-center font-bold text-white bg-black bg-opacity-50 rounded-md">
                                +{{ $totalImages - 3 }}
                                <button class="px-2 text-primary-500" onclick="openModal()">
                                    <i class="text-lg ti ti-eye text-info dark:text-blue-300"></i>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    @endif

    <!-- Modal -->
    <div id="imageModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center">
            <div class="relative w-full max-w-4xl p-4 overflow-hidden bg-white rounded-lg shadow-xl">
                <button onclick="closeModal()" class="absolute text-gray-600 top-2 right-2">
                    &times;
                </button>
                <div class="grid grid-cols-2 gap-2 md:grid-cols-3 lg:grid-cols-4">
                    @foreach ($images as $image)
                        <img class="object-cover h-auto max-w-full rounded-md" src="{{ Storage::url($image->file_path) }}" alt="">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('imageModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('imageModal').classList.add('hidden');
    }
</script>
