<?php

namespace App\Livewire;

use App\Models\Provider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Redirect;

class FollowButton extends Component
{
    public $providerId; // Provider ID
    public $isFollowing;
    public $isAuthenticated;
    public $user;

    public function mount($providerId)
    {
        $this->providerId = $providerId;
        $this->isAuthenticated = Auth::check();

        if ($this->isAuthenticated) {
            $this->user = Auth::user();
            $this->isFollowing = $this->user->following()->where('provider_id', $providerId)->exists();
        }
    }

    public function toggleFollow()
    {
        if (!$this->isAuthenticated) {
            return redirect()->route('login');
        }


        $provider = Provider::find($this->providerId);

        if ($provider) {
            $this->user->toggleFollow($provider);
            $this->isFollowing = !$this->isFollowing;
        }
    }

    public function render()
    {
        return view('livewire.follow-button');
    }
}
