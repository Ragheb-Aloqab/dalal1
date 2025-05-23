<x-app-layout-provider>
    <div class="container p-4 mx-auto">
        <h1 class="mb-6 text-2xl font-bold">All Conversations</h1>

        @foreach ($conversations as $conversation)
            <div class="p-4 mb-8 bg-white rounded-lg shadow-md">
                <h2 class="mb-4 text-xl font-semibold">Conversation between {{ $conversation->provider->user->name }} and {{ $conversation->client->name }}</h2>
                <h2 class="mb-4 text-xl font-semibold">Conversation between {{ $conversation->client->user->name }} and {{ $conversation->client->name }}</h2>

                @foreach ($conversation->messages as $message)
                    <div class="mb-4">
                        <div class="text-sm text-gray-500">
                            <strong>{{ $message->sender->name }}:</strong>
                            <span>{{ $message->created_at->format('Y-m-d H:i:s') }}</span>
                        </div>
                        <div class="text-gray-800">
                            {{ $message->content }}
                            @if($message->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $message->image) }}" alt="Image" class="w-full h-auto rounded-lg">
                                </div>
                            @endif
                        </div>
                        @if($message->read)
                            <div class="mt-1 text-xs text-green-500">Read at: {{ $message->read_at }}</div>
                        @else
                            <div class="mt-1 text-xs text-red-500">Unread</div>
                        @endif
                    </div>
                    <hr class="my-2">
                @endforeach
            </div>
        @endforeach
    </div>
</x-app-layout-provider>
