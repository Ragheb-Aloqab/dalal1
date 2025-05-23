<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
class Chat extends Component
{
    use WithFileUploads; // Include this trait for file uploads

    public $conversations;
    public $selectedConversationId = null;
    public $messages = [];
    public $newMessage;
    public $image; // Property for uploaded image

    public function mount()
    {
        $this->loadConversations();
    }

    public function loadConversations()
    {
        $this->conversations = Conversation::with(['user1', 'user2', 'messages'])
            ->where('user_id1', Auth::id())
            ->orWhere('user_id2', Auth::id())
            ->get()
            ->map(function ($conversation) {
                $otherUser = $conversation->user_id1 == Auth::id() ? $conversation->user2 : $conversation->user1;
                $lastMessage = $conversation->messages->last();

                return [
                    'conversation_id' => $conversation->id,
                    'other_user_name' => $otherUser->name,
                    'other_user_image' => $otherUser->profile_image ?? '',
                    'last_message' => $lastMessage->content ?? 'No messages yet',
                    'last_message_date' => $lastMessage ? $lastMessage->created_at->diffForHumans() : null,
                ];
            });
    }

    public function selectConversation($conversationId)
    {
        $this->selectedConversationId = $conversationId;
        $this->loadMessages();
    }

    public function loadMessages()
    {
        if ($this->selectedConversationId) {
            $this->messages = Message::with(['sender', 'receiver'])
                ->where('conversation_id', $this->selectedConversationId)
                ->latest()
                ->get();
        }
    }

    protected function rules()
    {
        return [
            'newMessage' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048', // Image validation rules
        ];
    }

    public function sendMessage()
    {
        // $this->validate();

        $conversation = Conversation::find($this->selectedConversationId);
        if (!$conversation) {
            return;
        }

        $receiverId = $conversation->user_id1 == Auth::id() ? $conversation->user_id2 : $conversation->user_id1;

        $messageData = [
            'conversation_id' => $this->selectedConversationId,
            'sender_id' => Auth::id(),
            'receiver_id' => $receiverId,
            'content' => $this->newMessage,
        ];

        // Handle image upload
        if ($this->image) {
            $path = $this->image->store('images', 'public');
            $messageData['image'] = $path; // Store the image path
        }

        Message::create($messageData);

        // Clear the input fields
        $this->newMessage = '';
        $this->image = null;

        // Reload messages
        $this->loadMessages();
    }
    public function render()
    {
        return view('livewire.chat');
    }
}
