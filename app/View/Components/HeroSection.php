<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeroSection extends Component
{
   
    public $backgroundImage;
    public $breadcrumbLinks;
    public $headerTitle;
    public $headerDescription;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($backgroundImage, $breadcrumbLinks, $headerTitle, $headerDescription)
    {
        $this->backgroundImage = $backgroundImage;
        $this->breadcrumbLinks = $breadcrumbLinks;
        $this->headerTitle = $headerTitle;
        $this->headerDescription = $headerDescription;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hero-section');
    }
}
