<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikesCount extends Component
{
    public $adId;
    public $likesCount;
    public $userLiked = false;
    public $isAuthenticated;

    public function mount($adId, $likesCount)
    {
        $this->adId = $adId;
        $this->likesCount = $likesCount;
        $this->isAuthenticated = Auth::check();

        if ($this->isAuthenticated) {
            // Check if the authenticated user has already liked this advertisement
            $this->userLiked = Like::where('advertisement_id', $this->adId)
                                   ->where('user_id', Auth::id())
                                   ->exists();
        }
    }

    public function toggleLike()
    {
        if (!$this->isAuthenticated) {
            return redirect()->route('login');

        }
        if ($this->userLiked) {
            Like::where('advertisement_id', $this->adId)
                ->where('user_id', Auth::id())
                ->delete();

            $this->userLiked = false;
            $this->likesCount--;
        } else {
            Like::create([
                'advertisement_id' => $this->adId,
                'user_id' => Auth::id(),
            ]);

            $this->userLiked = true;
            $this->likesCount++;
        }
    }

    public function render()
    {
        return view('livewire.likes-count');
    }
}
