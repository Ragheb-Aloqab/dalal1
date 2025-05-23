<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Advertisement; // Make sure to use the correct namespace for your model
use App\Models\City;
use Livewire\WithPagination;

class CitiesFilter extends Component
{
    use WithPagination;

    public $cityId;
    public $search;
    public $providerId;
    public $type;
    public $location;
    public $minPrice;
    public $maxPrice;
    public $city;

    public function mount($cityId)
    {
        $this->cityId = $cityId;

       $this->city =  City::find($cityId);
    }

    public function search()
    {
        $ads = Advertisement::with('realEstate') // Load related real estate details
            ->when($this->providerId, function ($query) {
                $query->where('provider_id', $this->providerId); // Filter by provider_id
            })
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('description', 'like', '%' . $this->search . '%')
                          ->orWhere('email', 'like', '%' . $this->search . '%')
                          ->orWhere('phone', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->cityId, function ($query) {
                $query->whereHas('realEstate', function ($query) {
                    $query->where('city_id', $this->cityId);
                });
            })
            ->when($this->type, function ($query) {
                $query->whereHas('realEstate', function ($query) {
                    $query->where('status', $this->type);
                });
            })
            ->when($this->location, function ($query) {
                $query->whereHas('realEstate', function ($query) {
                    $query->where('location', 'like', '%' . $this->location . '%');
                });
            })
            ->when($this->minPrice, function ($query) {
                $query->whereHas('realEstate', function ($query) {
                    $query->where('price', '>=', $this->minPrice);
                });
            })
            ->when($this->maxPrice, function ($query) {
                $query->whereHas('realEstate', function ($query) {
                    $query->where('price', '<=', $this->maxPrice);
                });
            })
            ->paginate(5);

        return $ads;
    }

    public function render()
    {
        $ads = $this->search();

        return view('livewire.cities-filter',[
            'ads'=>$ads
        ]);
    }
}
