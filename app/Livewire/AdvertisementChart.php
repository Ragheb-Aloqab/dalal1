<?php

namespace App\Livewire;

use App\Models\Advertisement;
use Livewire\Component;

class AdvertisementChart extends Component
{
    public $landsCount;
    public $buildingsCount;
    public $apartmentsCount;
    public $averageRating;
    public $totalViews;
    public $totalLikes;
    public $totalShares;

    public function mount()
    {
        $this->landsCount = Advertisement::withLands()->count();
        $this->buildingsCount = Advertisement::withBuildings()->count();
        $this->apartmentsCount = Advertisement::withApartments()->count();
        $this->averageRating = Advertisement::all()->avg('rating');
        $this->totalViews = Advertisement::withCount('views')->get()->sum('views_count');
        $this->totalLikes = Advertisement::withCount('likes')->get()->sum('likes_count');
        $this->totalShares = Advertisement::withCount('shares')->get()->sum('shares_count');
    }

    public function render()
    {
        
        return view('livewire.advertisement-chart');
    }
}
