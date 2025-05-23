<?php

namespace App\View\Components\admin;

use App\Models\Provider;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProviderSelect extends Component
{
    /**
     * Create a new component instance.
     */
    public $providerOptions;
    public $selected;

    public function __construct($selected = null)
    {
        // Fetch providers from the database
        $this->providerOptions = Provider::all()->mapWithKeys(
            fn($provider) => [$provider->id => $provider->user->name]
        );
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.provider-select');
    }
}
