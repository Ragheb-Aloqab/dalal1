<button wire:click="toggleFollow"
        class="text-white  text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300 {{ $isFollowing ? 'bg-red-600' : 'bg-blue-600' }} ">
    {{ $isFollowing ? 'Unfollow' : 'Follow' }}
</button>
