<?php

namespace App\Livewire;

use App\Models\Follow;
use Livewire\Component;

class Followers extends Component
{
    public $providerId;
    public $search = '';

    // Mount method to accept provider_id
    public function mount($providerId)
    {
        $this->providerId = $providerId;
    }

    // Method to fetch followers with optional search
    public function getFollowersProperty()
    {
        return Follow::with('user') // Assuming the follow model is related to the User model
            ->where('provider_id', $this->providerId)
            ->when($this->search, function($query) {
                $query->whereHas('user', function($q) {
                    $q->where('name', 'like', '%'.$this->search.'%');
                });
            })
            ->get();
    }

    public function render()
    {
        return view('livewire.followers', [
            'followers' => $this->followers,
        ]);
    }
}
