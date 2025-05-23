<?php

namespace App\Livewire;

use Illuminate\Notifications\DatabaseNotification;
use Livewire\Component;

class UserNotification extends Component
{
    public $notifications;

    public function mount()
    {
        // Load notifications for the authenticated user
        $this->notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->get();
    }

    public function markAsRead($notificationId)
    {
        $notification = DatabaseNotification::find($notificationId);
        if ($notification) {
            $notification->markAsRead();
            $this->notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->get();
        }
    }

    public function render()
    {
        return view('livewire.user-notification');
    }
}
