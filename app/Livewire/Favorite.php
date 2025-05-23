<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Advertisement;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Favorite extends Component
{
    public $adId;
    public $isFavorite = false;
    public $isAuthenticated;
    public $user;

    public function mount($adId)
    {
        $this->adId = $adId;
        $this->isAuthenticated = Auth::check();

        if ($this->isAuthenticated) {
            $this->user = User::findOrFail(Auth::user()->getAuthIdentifier());
            $this->isFavorite = $this->user->favorites()->where('advertisement_id', $this->adId)->exists();
        }
    }

    public function toggleFavorite()
    {
        if (!$this->isAuthenticated) {
            return  redirect()->route('login');
        }

        $user = Auth::user();
        $advertisement = Advertisement::findOrFail($this->adId);

        if ($this->isFavorite) {
            // Unfavorite the advertisement
            $this->user->favorites()->detach($advertisement->id);
            $this->isFavorite = false;
        } else {
            // Favorite the advertisement
            $this->user->favorites()->attach($advertisement->id);
            $this->isFavorite = true;
        }
    }

    public function render()
    {
        return view('livewire.favorite');
    }
}
