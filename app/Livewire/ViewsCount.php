<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\View;
use Illuminate\Support\Facades\Auth;

class ViewsCount extends Component
{
    public $adId;
    public $viewsCount;

    public function mount($adId, $viewsCount)
    {
        $this->adId = $adId;
        $this->viewsCount = $viewsCount;

        if (Auth::check()) {
            // Increment view count on mount (assuming each load counts as a view)
            $this->recordView();
        }
    }

    public function recordView()
    {
        // Create a new view record

        // View::create([
        //     'advertisement_id' => $this->adId,
        //     'user_id' => Auth::id(),
        // ]);

        // $this->viewsCount++;

        // Check if the user has already viewed the advertisement
        $existingView = View::where('advertisement_id', $this->adId)
            ->where('user_id', Auth::id())
            ->first();

        // If no existing view record is found, create a new one
        if (!$existingView) {
            View::create([
                'advertisement_id' => $this->adId,
                'user_id' => Auth::id(),
            ]);

            // Increment the views count
            $this->viewsCount++;
        }
    }

    public function render()
    {
        return view('livewire.views-count');
    }
}
