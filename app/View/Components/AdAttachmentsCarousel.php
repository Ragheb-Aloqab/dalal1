<?php

namespace App\View\Components;

use App\Models\Advertisement;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdAttachmentsCarousel extends Component
{


    public $attachments;

    public function __construct($adId)
    {
        // Retrieve the advertisement and its related real estate attachments
        $ad = Advertisement::with('realEstate.attachments')
            ->findOrFail($adId);

        // Filter attachments to include only images
        $this->attachments = $ad->realEstate->attachments
            ->where('file_type', 'image');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ad-attachments-carousel');
    }
}
