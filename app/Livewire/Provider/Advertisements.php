<?php

namespace App\Livewire\Provider;

use Livewire\Component;
use App\Models\Advertisement;
use Livewire\WithPagination;

class Advertisements extends Component
{
    use WithPagination;
    public $isInsideLivewire = true;
    public $filters = [
        'status' => null,
        'title' => null,
        'city_id' => null,
    ];

    public function updatingFilters()
    {
        // Reset pagination if any filter changes
        $this->resetPage();
    }

    public function render()
    {
        $advertisements = Advertisement::withCount(['views', 'shares', 'likes', 'comments'])
            ->when($this->filters['status'], function ($query) {
                $query->where('status', $this->filters['status']);
            })
            ->when($this->filters['title'], function ($query) {
                $query->where('title', 'like', '%' . $this->filters['title'] . '%');
            })
            ->paginate(10);

        return view('livewire.provider.advertisements', [
            'advertisements' => $advertisements,
        ]);
    }

    public function delete($advertisementId)
    {
        Advertisement::find($advertisementId)->delete();
        session()->flash('message', 'Advertisement deleted successfully.');
    }
}
