<?php

namespace App\Livewire;

use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserFavorites extends Component
{
    public $favorites;

    public function mount()
    {
        $userId = Auth::id();
        $this->favorites = Advertisement::whereHas('favoritedBy', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();
    }
    public function render()
    {
        return view('livewire.user-favorites');
    }
}
