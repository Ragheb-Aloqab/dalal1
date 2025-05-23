<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Advertisement;

class AdsCardsContainer extends Component
{
    use WithPagination; // Use the WithPagination trait

    public $search = '';
    public $city = '';
    public $propertyType = '';
    public $providerId; // This will be set from outside, e.g., through props

    protected $queryString = ['search', 'city', 'propertyType', 'providerId'];

    public function mount($providerId = null) // Receive provider ID in the mount method
    {
        $this->providerId = $providerId; // Set the provider ID
    }

    public function render()
    {
        $ads = Advertisement::with('realEstate') // Load related real estate details
            ->when($this->providerId, function ($query) {
                $query->where('provider_id', $this->providerId); // Filter by provider_id
            })
            ->where(column: function ($query) {
                if ($this->search) {
                    $query->where('description', 'like', '%' . $this->search . '%')
                          ->orWhere('email', 'like', '%' . $this->search . '%')
                          ->orWhere('phone', 'like', '%' . $this->search . '%');
                }
                if ($this->city) {
                    $query->whereHas('realEstate', function ($query) {
                        $query->where('city_id', $this->city);
                    });
                }
                if ($this->propertyType) {
                    $query->whereHas('realEstate', function ($query) {
                        $query->where('status', $this->propertyType);
                    });
                }
            })
            ->paginate(perPage: 5); // Set the pagination limit

        return view('livewire.ads-cards-container', ['ads' => $ads]);
    }

    public function updatingSearch()
    {
        $this->resetPage(); // Reset pagination on search
    }

    public function updatingCity()
    {
        $this->resetPage(); // Reset pagination on city change
    }

    public function updatingPropertyType()
    {
        $this->resetPage(); // Reset pagination on property type change
    }
}
