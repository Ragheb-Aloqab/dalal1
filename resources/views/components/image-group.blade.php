 <div class="grid grid-cols-2 gap-1 ">
     @foreach ($images as $index => $image)
         @if ($index < 3)
             <div class="relative group">
                 <div
                     class="absolute flex items-center justify-center w-full h-full transition-opacity duration-300 rounded-md opacity-0 bg-gray-900/50 group-hover:opacity-100">
                     <button onclick="openModal({{ $index }})"
                         class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/30 hover:bg-white/50 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50">
                         <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 16 18">
                             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M8 1v11m0 0 4-4m-4 4L4 8m11 4v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3" />
                         </svg>
                     </button>
                 </div>
                 <img src="{{ Storage::url($image) }}" class="rounded-md" />
             </div>
         @elseif ($index == 3)
             <div class="relative group">
                 <button onclick="openModal({{ $index }})"
                     class="absolute flex items-center justify-center w-full h-full transition-all duration-300 rounded-md bg-gray-900/70 hover:bg-gray-900/50">
                     <span class="text-xl font-medium text-white">+{{ count($images) - 4 }}</span>
                 </button>
                 <img src="{{ Storage::url($image) }}" class="rounded-md" />
             </div>
         @endif
     @endforeach
 </div>

 <div id="imageModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-gray-900 bg-opacity-75">
     <div class="flex items-center justify-center min-h-screen">
         <div class="relative w-3/4 p-0 bg-white rounded-lg">
             <button onclick="closeModal()" class="absolute top-0 right-0 m-2 text-gray-500 hover:text-gray-700">
                 &#10005;
             </button>
             <img id="modalImage" src="" class="h-auto max-w-full mx-auto rounded-lg" />
         </div>
     </div>
 </div>

 <script>
     function openModal(index) {
         const images = @json($images); // Get only the file_path
         document.getElementById('modalImage').src = '/storage/' + images[index]; // Use storage path
         document.getElementById('imageModal').classList.remove('hidden');
     }

     function closeModal() {
         document.getElementById('imageModal').classList.add('hidden');
     }
 </script>
