<div class="mt-8">
    <h3 class="flex items-center gap-3 mb-4 text-xl">
        Comments
        <span
            class="px-3 py-2 text-base rounded-md bg-lightprimary dark:bg-darkprimary text-primary">{{ count($comments) }}</span>
    </h3>
    @foreach($comments as $comment)
    <div class="mb-6 shadow-none card bg-lightgray dark:bg-darkprimary">
        <div class="relative card-body">
            <div class="flex items-center gap-3">
                <img src="{{asset($comment->user->avatar ? 'storage/profile/' . $comment->user->avatar : 'assets/images/profile/user-1.jpg') }}" alt="Profile"
                    class="w-8 h-8 rounded-full">
                <h6 class="text-base">
                    {{ $comment->user->name }}
                </h6>
                <i class="w-2 h-2 rounded-full bg-link dark:bg-darklink opacity-30"></i>
            </div>
            <p class="my-3 card-subtitle">
                {{ $comment->content }}
            </p>
            <button type="button" wire:click="deleteComment({{ $comment->id }})"
                class="absolute p-2 text-lg rounded-full text-warning hover:text-danger"
                style="left: 3% !important; top: 3% !important;">
                <i class="ti ti-trash"></i>
            </button>
        </div>
    </div>
    @endforeach
</div>
