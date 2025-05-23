<?php

// namespace App\Livewire;


// use Livewire\Component;
// use App\Models\Advertisement;
// use App\Models\RealEstate;
// use App\Models\Apartment;
// use App\Models\Building;
// use App\Models\Land;
// use Illuminate\Http\Request;
// use Livewire\WithFileUploads;

// class ProviderAdvertisements extends Component
// {
//     public $title, $provider_id, $ads_status, $description, $boundaries, $city_id, $location, $price, $commercial_number, $status, $floor_number, $rooms_number, $bathrooms_number, $kitchens_number, $condition, $tags = [], $attachments = [];
//     public $real_estate_type; // To handle different real estate types
//     use WithFileUploads;
//     // General validation rules
//     protected function rules()
//     {
//         $rules = [
//             'title' => 'required|string|max:255',
//             'provider_id' => 'required|exists:providers,id',
//             'ads_status' => 'required|string|in:active,inactive',
//             'description' => 'required|string',
//             'boundaries' => 'required|string',
//             'city_id' => 'required|exists:cities,id',
//             'location' => 'required|string|max:255',
//             'price' => 'required|numeric',
//             'commercial_number' => 'required|string|max:255',
//             'status' => 'required|string|in:sale,rent',
//             'real_estate_type' => 'required|string|in:land,apartment,building', // Real estate type
//             'tags' => 'nullable|array',
//             'attachments' => 'nullable|array',
//             'attachments.*' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
//         ];

//         // Additional validation for apartment
//         if ($this->real_estate_type === 'apartment') {
//             $rules = array_merge($rules, [
//                 'floor_number' => 'required|numeric',
//                 'rooms_number' => 'required|numeric',
//                 'bathrooms_number' => 'required|numeric',
//                 'kitchens_number' => 'required|numeric',
//                 'condition' => 'required|string|in:new,old',
//             ]);
//         }

//         // Additional validation for building (you can add specific rules)
//         if ($this->real_estate_type === 'building') {
//             // Add custom validation for building if needed
//         }

//         // No extra fields for land, so no additional rules needed for that case

//         return $rules;
//     }

//     public function store()
//     {
//         $validatedData = $this->validate();

//         // Create the real estate advertisement
//         $realEstate = new RealEstate();
//         $realEstate->description = $validatedData['description'];
//         $realEstate->boundaries = $validatedData['boundaries'];
//         $realEstate->location = $validatedData['location'];
//         $realEstate->city_id = $validatedData['city_id'];
//         $realEstate->status = $validatedData['status'];
//         $realEstate->price = $validatedData['price'];
//         $realEstate->commercial_number = $validatedData['commercial_number'];

//         $realEstate->advertisement()->associate(
//             Advertisement::create([
//                 'title' => $validatedData['title'],
//                 'provider_id' => $validatedData['provider_id'],
//                 'status' => $validatedData['ads_status'],
//             ])
//         );

//         // Associate with the appropriate real estate model based on type
//         if ($validatedData['real_estate_type'] === 'apartment') {
//             $realEstate->realEstateable()->associate(
//                 Apartment::create([
//                     'floor_number' => $validatedData['floor_number'],
//                     'rooms_number' => $validatedData['rooms_number'],
//                     'bathrooms_number' => $validatedData['bathrooms_number'],
//                     'kitchens_number' => $validatedData['kitchens_number'],
//                     'condition' => $validatedData['condition'],

//                 ])
//             );
//         } elseif ($validatedData['real_estate_type'] === 'building') {
//             $realEstate->realEstateable()->associate(
//                 Building::create([
//                     // Add building-specific fields here
//                 ])
//             );
//         } elseif ($validatedData['real_estate_type'] === 'land') {
//             $realEstate->realEstateable()->associate(
//                 Land::create([
//                     // Add land-specific fields here
//                 ])
//             );
//         }

//         $realEstate->save();

//         // Handle tags
//         if (!empty($validatedData['tags'])) {
//             foreach ($validatedData['tags'] as $tag) {
//                 $realEstate->features()->create(['name' => $tag]);
//             }
//         }

//         // Handle attachments
//         if ($this->attachments) {
//             foreach ($this->attachments as $file) {
//                 $filePath = $file->store('attachments', 'public');
//                 $realEstate->attachments()->create([
//                     'file_path' => $filePath,
//                     'file_type' => 'image',
//                 ]);
//             }
//         }

//         session()->flash('message', 'تم إنشاء الإعلان بنجاح.');
//         // return redirect()->rote('admin.advertisements.index');
//     }

//     public function delete($advertisementId)
//     {
//         $advertisement = Advertisement::find($advertisementId);
//         if ($advertisement) {
//             $advertisement->delete();
//             session()->flash('message', 'تم حذف الإعلان بنجاح.');
//         }
//     }

//     public function render()
//     {
//         $advertisements = Advertisement::where('provider_id', $this->provider_id)->get();
//         return view('livewire.provider-advertisements', compact('advertisements'));
//     }
// }

namespace App\Livewire;

use Livewire\Component;
use App\Models\Advertisement;
use App\Models\RealEstate;
use App\Models\Apartment;
use App\Models\Building;
use App\Models\Land;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;

class ProviderAdvertisements extends Component
{
    public $advertisements, $advertisementId; // For editing
    public $title, $provider_id, $ads_status, $description, $boundaries, $city_id, $location, $price, $commercial_number, $status,
           $floor_number, $rooms_number, $bathrooms_number, $kitchens_number, $condition, $tags = [], $attachments = [];

    // New fields for land
    public $area, $water, $electricity, $sewage, $gas, $access;

    // New fields for building
    public $floors_number, $apartments_count;

    public $real_estate_type; // To handle different real estate types
    use WithFileUploads;

    // General validation rules
    protected function rules()
    {
        $rules = [
            'title' => 'required|string|max:255',
            'provider_id' => 'required|exists:providers,id',
            'ads_status' => 'required|string|in:active,inactive',
            'description' => 'required|string',
            'boundaries' => 'required|string',
            'city_id' => 'required|exists:cities,id',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'commercial_number' => 'required|string|max:255',
            'status' => 'required|string|in:sale,rent',
            'real_estate_type' => 'required|string|in:land,apartment,building', // Real estate type
            'tags' => 'nullable|array',
            'attachments' => 'nullable|array',
            'attachments.*' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
        ];

        // Additional validation for apartment
        if ($this->real_estate_type === 'apartment') {
            $rules = array_merge($rules, [
                'floor_number' => 'required|numeric',
                'rooms_number' => 'required|numeric',
                'bathrooms_number' => 'required|numeric',
                'kitchens_number' => 'required|numeric',
                'condition' => 'required|string|in:new,old',
            ]);
        }

        // Additional validation for building
        if ($this->real_estate_type === 'building') {
            $rules = array_merge($rules, [
                'floors_number' => 'required|integer',
                'apartments_count' => 'required|integer',
            ]);
        }

        // Additional validation for land
        if ($this->real_estate_type === 'land') {
            $rules = array_merge($rules, [
                'area' => 'required|numeric',
                'water' => 'boolean',
                'electricity' => 'boolean',
                'sewage' => 'boolean',
                'gas' => 'boolean',
                'access' => 'nullable|string|max:255',
            ]);
        }

        return $rules;
    }

    public function create()
    {
        // Reset all input fields
        $this->clearInputs();
        $this->advertisementId = null; // Reset the advertisement ID for creating
    }

    public function edit($advertisementId)
    {
        $advertisement = Advertisement::with(['realEstateable'])->find(id: $advertisementId);

        if ($advertisement) {
            // Set the advertisementId for editing
            $this->advertisementId = $advertisementId;
            $this->title = $advertisement->title;
            $this->provider_id = $advertisement->provider_id;
            $this->ads_status = $advertisement->status;
            $this->description = $advertisement->realEstate->description;
            $this->boundaries = $advertisement->realEstate->boundaries;
            $this->city_id = $advertisement->realEstate->city_id;
            $this->location = $advertisement->realEstate->location;
            $this->price = $advertisement->realEstate->price;
            $this->commercial_number = $advertisement->realEstate->commercial_number;
            $this->status = $advertisement->realEstate->status;

            // Set the real estate type and corresponding fields
            if ($advertisement->realEstateable_type === 'App\Models\Apartment') {
                $this->real_estate_type = 'apartment';
                $this->floor_number = $advertisement->realEstateable->floor_number;
                $this->rooms_number = $advertisement->realEstateable->rooms_number;
                $this->bathrooms_number = $advertisement->realEstateable->bathrooms_number;
                $this->kitchens_number = $advertisement->realEstateable->kitchens_number;
                $this->condition = $advertisement->realEstateable->condition;
            } elseif ($advertisement->realEstateable_type === 'App\Models\Building') {
                $this->real_estate_type = 'building';
                $this->floors_number = $advertisement->realEstateable->floors_number;
                $this->apartments_count = $advertisement->realEstateable->apartments_count;
            } elseif ($advertisement->realEstateable_type === 'App\Models\Land') {
                $this->real_estate_type = 'land';
                $this->area = $advertisement->realEstateable->area;
                $this->water = $advertisement->realEstateable->water;
                $this->electricity = $advertisement->realEstateable->electricity;
                $this->sewage = $advertisement->realEstateable->sewage;
                $this->gas = $advertisement->realEstateable->gas;
                $this->access = $advertisement->realEstateable->access;
            }

            $this->tags = $advertisement->features->pluck('name')->toArray(); // Assuming features are associated with tags
        }
    }

    public function store()
    {
        // Fetch provider_id from authenticated user
        $this->provider_id = auth()->user()->provider->id;

        $validatedData = $this->validate();

        // Create or update the real estate advertisement
        $realEstate = $this->advertisementId ? RealEstate::find($this->advertisementId) : new RealEstate();
        $realEstate->description = $validatedData['description'];
        $realEstate->boundaries = $validatedData['boundaries'];
        $realEstate->location = $validatedData['location'];
        $realEstate->city_id = $validatedData['city_id'];
        $realEstate->status = $validatedData['status'];
        $realEstate->price = $validatedData['price'];
        $realEstate->commercial_number = $validatedData['commercial_number'];

        // Create or update the advertisement
        $advertisement = $this->advertisementId ? Advertisement::find($this->advertisementId) : new Advertisement();
        $advertisement->title = $validatedData['title'];
        $advertisement->provider_id = $validatedData['provider_id'];
        $advertisement->status = $validatedData['ads_status'];

        // Associate with the appropriate real estate model based on type
        if ($validatedData['real_estate_type'] === 'apartment') {
            $realEstate->realEstateable()->associate(
                Apartment::create([
                    'floor_number' => $validatedData['floor_number'],
                    'rooms_number' => $validatedData['rooms_number'],
                    'bathrooms_number' => $validatedData['bathrooms_number'],
                    'kitchens_number' => $validatedData['kitchens_number'],
                    'condition' => $validatedData['condition'],
                ])
            );
        } elseif ($validatedData['real_estate_type'] === 'building') {
            $realEstate->realEstateable()->associate(
                Building::create([
                    'floors_number' => $validatedData['floors_number'],
                    'apartments_count' => $validatedData['apartments_count'],
                ])
            );
        } elseif ($validatedData['real_estate_type'] === 'land') {
            $realEstate->realEstateable()->associate(
                Land::create([
                    'area' => $validatedData['area'],
                    'water' => $validatedData['water'],
                    'electricity' => $validatedData['electricity'],
                    'sewage' => $validatedData['sewage'],
                    'gas' => $validatedData['gas'],
                    'access' => $validatedData['access'],
                ])
            );
        }

        $realEstate->save();
        $advertisement->advertisement()->associate($realEstate);
        $advertisement->save();

        // Handle tags
        if (!empty($validatedData['tags'])) {
            $realEstate->features()->delete(); // Clear previous tags
            foreach ($validatedData['tags'] as $tag) {
                $realEstate->features()->create(['name' => $tag]); // Assuming features are a separate model
            }
        }

        // Handle file uploads
        if ($this->attachments) {
            foreach ($this->attachments as $attachment) {
                $realEstate->attachments()->create(['file_path' => $attachment->store('attachments')]); // Store the file and save the path
            }
        }

        $this->clearInputs(); // Reset inputs after storing
    }

    public function clearInputs()
    {
        $this->title = '';
        $this->provider_id = '';
        $this->ads_status = '';
        $this->description = '';
        $this->boundaries = '';
        $this->city_id = '';
        $this->location = '';
        $this->price = '';
        $this->commercial_number = '';
        $this->status = '';
        $this->floor_number = '';
        $this->rooms_number = '';
        $this->bathrooms_number = '';
        $this->kitchens_number = '';
        $this->condition = '';
        $this->tags = [];
        $this->attachments = [];
        $this->real_estate_type = '';
        // Clear land-specific fields
        $this->area = '';
        $this->water = '';
        $this->electricity = '';
        $this->sewage = '';
        $this->gas = '';
        $this->access = '';

        // Clear building-specific fields
        $this->floors_number = '';
        $this->apartments_count = '';
    }

    public function render()
    {
        $user = User::findOrFail(auth()->user()->id);
        $this->advertisements = Advertisement::where('provider_id', $user->provider()->id)->get();
        return view('livewire.provider-advertisements', [
            'advertisements' => $this->advertisements,
        ]);
    }
}
