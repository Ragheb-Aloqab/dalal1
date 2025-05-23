<?php

namespace App\View\Components\form;

use App\Models\City;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectCity extends Component
{
    /**
     * Create a new component instance.
     */
    public $cityOptions;
    public $selected;

    public function __construct($selected = null)
    {
        // Fetch cities from the database
        $this->cityOptions = City::pluck('name', 'id');
        $this->selected = $selected;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.form.select-city');
    }
}
