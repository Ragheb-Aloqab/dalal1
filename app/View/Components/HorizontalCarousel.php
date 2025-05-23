<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HorizontalCarousel extends Component
{
    public $carouselId;

    public function __construct($carouselId)
    {
        $this->carouselId = $carouselId;
    }

    public function render()
    {
        return view('components.horizontal-carousel');
    }
}
