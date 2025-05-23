<?php

namespace App\Livewire;

use App\Models\Provider;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class CompanyCards extends Component
{
    use WithPagination;

    public $search = '';
    public $city = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCity()
    {
        $this->resetPage();
    }

    public function render()
    {
        $companies = Provider::with('user') // Load the associated user for each provider
            ->when($this->city, function ($query) {
                // Filter providers based on the user's city relationship
                $query->whereHas('user.city', function ($q) {
                    $q->where('id',  $this->city);
                });
            })
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%') // Replace with actual provider column names
                        ->orWhere('location', 'like', '%' . $this->search . '%') // Add more provider columns as needed
                        ->orWhere('commercial_number', 'like', '%' . $this->search . '%')
                        ->orWhere('personal_id_image', 'like', '%' . $this->search . '%')
                        ->orWhereHas('user', function ($q) {
                            $q->where('name', 'like', '%' . $this->search . '%')
                                ->orWhere('email', 'like', '%' . $this->search . '%')
                                ->orWhere('phone', 'like', '%' . $this->search . '%');
                        });
                });
            })
            ->paginate(10); // Paginate the results


        // $companies = Provider::with('user') // Load the associated user for each provider
        //     ->when($this->city, function ($query) {
        //         // Filter providers based on the user's city relationship
        //         $query->whereHas('user.city', function ($q) {
        //             $q->where('name', 'like', '%' . $this->city . '%');
        //         });
        //     })
        //     ->when($this->search, function ($query) {
        //         // Search through name, email, and phone of the user associated with the provider
        //         $query->whereHas('user', function ($q) {
        //             $q->where('name', 'like', '%' . $this->search . '%')
        //                 ->orWhere('email', 'like', '%' . $this->search . '%')
        //                 ->orWhere('phone', 'like', '%' . $this->search . '%');
        //         });
        //     })
        //     ->paginate(10); // Paginate the results


        return view('livewire.company-cards', ['companies' => $companies]);
    }
}
