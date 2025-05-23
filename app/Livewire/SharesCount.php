<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Share;
use Illuminate\Support\Facades\Auth;

class SharesCount extends Component
{
    public $adId;
    public $sharesCount;
    public $isAuthenticated;

    public function mount($adId, $sharesCount)
    {
        $this->adId = $adId;
        $this->sharesCount = $sharesCount;
        $this->isAuthenticated = Auth::check();
    }

    public function share()
    {
        if (!$this->isAuthenticated) {
            return;
        }

        // Create a new share record
        Share::create([
            'advertisement_id' => $this->adId,
            'user_id' => Auth::id(),
        ]);

        $this->sharesCount++;
    }

    public function render()
    {
        return view('livewire.shares-count');
    }
}
