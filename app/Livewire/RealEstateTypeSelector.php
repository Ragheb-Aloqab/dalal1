<?php

namespace App\Livewire;

use Livewire\Component;

class RealEstateTypeSelector extends Component
{
    public $realEstateType;
    // Step 1: Initialize the property in the mount method
    public function mount($realEstateType = null)
    {
        $this->realEstateType = $realEstateType; // Accepts value from request
    }
    public function render()
    {
        return view('livewire.real-estate-type-selector');
    }
}
