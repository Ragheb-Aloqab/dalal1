<?php

namespace App\Livewire;

use App\Models\Advertisement;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class AdvertisementFilter extends Component
{
    use WithPagination;

    public $cityId;
    public $search;
    public $providerId;
    public $type;
    public $location;
    public $minPrice;
    public $maxPrice;
    public $realType = 'all';
    public $selectedRealType = 'apartment';


    public function search()
    {
        $ads = Advertisement::with('realEstate') // Load related real estate details
            ->when($this->providerId, function ($query) {
                $query->where('provider_id', $this->providerId); // Filter by provider_id
            })
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('description', 'like', '%' . $this->search . '%')
                          ->orWhere('boundaries', 'like', '%' . $this->search . '%')
                          ->orWhere('phone', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->cityId, function ($query) {
                $query->whereHas('realEstate', function ($query) {
                    $query->where('city_id', $this->cityId)->orWhere('status', $this->type);
                    // $query->where('status', $this->cityId);

                });

            })
            ->when($this->type, function ($query) {
                $query->whereHas('realEstate', function ($query) {

                    if($this->realType!="all"){
                        $query->where('status', $this->realType);
                    }
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
        Carbon::setLocale('ar');
        return view('livewire.advertisement-filter', [
            'ads' => $ads
        ]);
    }
}
