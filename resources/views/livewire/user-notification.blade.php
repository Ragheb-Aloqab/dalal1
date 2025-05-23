<div>
    <h2 class="font-bold text-lg">Notifications</h2>
    <ul>
        @foreach ($notifications as $notification)
            <li class="flex justify-between p-2 border-b">
                <span class="{{ $notification->read_at ? 'text-gray-500' : 'font-bold' }}">
                    {{ $notification->data['message'] }}
                </span>
                <button wire:click="markAsRead({{ $notification->id }})"
                        class="text-blue-500 hover:text-blue-700">
                    Mark as Read
                </button>
            </li>
        @endforeach
    </ul>
</div>
