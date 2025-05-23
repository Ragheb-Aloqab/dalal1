<div>
    <h3 class="flex items-center gap-3 px-2 mb-4 text-xl">
        Comments
        <span
            class="px-1 py-2 text-base rounded-md bg-lightprimary dark:bg-darkprimary text-primary">{{ count($comments) }}</span>
    </h3>
    <div class="mt-4">
        @foreach ($comments as $comment)
            <div class="p-2 mb-1 border border-gray-200 rounded-md">
                <div class="flex justify-between">
                    <div class="flex items-center gap-2">
                        <img src="{{ asset($comment->user->avatar ? 'storage/profile/' . $comment->user->avatar : 'assets/images/profile/user-1.jpg') }}"
                            alt="Profile" class="w-8 h-8 rounded-full">
                        <h6 class="px-2 text-base">
                            {{ $comment->user->name }}
                        </h6>
                    </div>
                    <button type="button" wire:click="deleteComment({{ $comment->id }})"
                        class="p-2 text-lg rounded-full text-warning hover:cursor-pointer"
                       >
                        <i class="text-red-600 ti ti-trash"></i>
                    </button>
                </div>

                <p class="my-1 card-subtitle">
                    {{ Str::limit($comment->content, 60, '  .......') }}
                </p>
                <small>{{ $comment->created_at->diffForHumans() }}</small>
            </div>
        @endforeach
    </div>
    <!-- Add Comment Form -->
    <form wire:submit.prevent="submitComment">
        <input type="text" wire:model="content" placeholder="Add your comment..." name="content"
            class="block w-full mt-1 rounded-md border-secondary-300 focus:border-primary-500 focus:ring-primary-500">
        @error('content')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <div class="w-full">
            <button type="submit" class="p-1 mt-2 text-white bg-blue-500 rounded-md">Submit</button>
        </div>
    </form>
    <!-- Pagination Links -->
    {{-- {{ $comments->links() }} --}}
</div>
