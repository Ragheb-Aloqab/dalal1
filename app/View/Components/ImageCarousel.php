<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\RealEstate; // Make sure to import your RealEstate model

class ImageCarousel extends Component
{
    public $attachments;

    public function __construct(int $realEstateId)
    {
        // Fetch attachments for the given real estate ID
        $this->attachments = RealEstate::find($realEstateId)->attachments; // Adjust this based on your model relationships
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.image-carousel', [
            'attachments' => $this->attachments, // Pass the attachments to the view
        ]);
    }
}
