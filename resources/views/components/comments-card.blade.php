@props([
    'comments' => null,
])
<div class="mt-2">
    <h3 class="flex items-center gap-3 mb-4 text-xl">
        Comments
        <span class="px-3 py-1 text-base rounded-md bg-lightprimary dark:bg-darkprimary text-primary">{{ count($comments) }}</spanclass=>
    </h3>
    @foreach ($comments as $comment)
        <div class="p-2 mb-1 border border-gray-200 rounded-md">
            <div class="flex items-center gap-2">
                <img src="{{ asset($comment->user->avatar ? 'storage/profile/' . $comment->user->avatar : 'assets/images/profile/user-1.jpg') }}"
                    alt="Profile" class="w-8 h-8 rounded-full">
                <h6 class="text-base">
                    {{ $comment->user->name }}
                </h6>
            </div>
            <p class="my-1 card-subtitle">
                {{ Str::limit($comment->content, 60, '  .......') }}
            </p>
        </div>
    @endforeach
</div>
