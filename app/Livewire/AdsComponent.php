<?php

namespace App\Livewire;

use Livewire\Component;

class AdsComponent extends Component
{
    public $ads;
    public $provider;

    public function mount($ads, $provider = false)
    {
        $this->ads = $ads;
        $this->provider = $provider;
    }

    // public function delete($id)
    // {
    //     // Logic to delete the ad
    //     // For example:
    //     // Ad::find($id)->delete();
    //     // $this->emit('adDeleted', $id); // Emit an event if needed
    // }

    public function render()
    {
        return view('livewire.ads-component');
    }
}
