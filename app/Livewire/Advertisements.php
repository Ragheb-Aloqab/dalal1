<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Advertisement;
use App\Models\Comment;
class Advertisements extends Component
{
    public $providerId;
    public $advertisements = [];
    public function mount($providerId)
    {
        $this->providerId = $providerId;
        $this->loadAdvertisements();
    }
    public function loadAdvertisements()
    {
        $this->advertisements = Advertisement::with(['provider.user', 'realEstate.attachments'])
            ->where('provider_id', '=', $this->providerId)
            ->get();
    }
    public function deleteAds($id)
    {
        if ($ads = Advertisement::find($id)) {
            $ads->delete();
        }
    }
    public function render()
    {
        return view('livewire.advertisements', ['advertisements' => $this->advertisements]);
    }
}
