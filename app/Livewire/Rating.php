<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Rating as RatingModel;
use Illuminate\Support\Facades\Auth;

class Rating extends Component
{
    public $adId;
    public $userRating;
    public $averageRating;
    public $isAuthenticated;

    public function mount($adId)
    {
        $this->adId = $adId;
        $this->isAuthenticated = Auth::check();

        if ($this->isAuthenticated) {
            // Get the user's rating for this ad if it exists
            $rating = RatingModel::where('advertisement_id', $this->adId)
                                 ->where('user_id', Auth::id())
                                 ->first();

            $this->userRating = $rating ? $rating->rating : null;
        }

        // Calculate the average rating
        $this->averageRating = RatingModel::where('advertisement_id', $this->adId)
                                          ->avg('rating');
    }

    public function rate($value)
    {
        if (!$this->isAuthenticated) {
            return redirect()->route('login');
        }

        // Update or create the rating for this user and ad
        RatingModel::updateOrCreate(
            [
                'advertisement_id' => $this->adId,
                'user_id' => Auth::id(),
            ],
            ['rating' => $value]
        );

        // Update the user's rating and recalculate the average rating
        $this->userRating = $value;
        $this->averageRating = RatingModel::where('advertisement_id', $this->adId)
                                          ->avg('rating');
    }

    public function render()
    {
        return view('livewire.rating');
    }
}
