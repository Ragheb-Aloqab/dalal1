<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Apartment;
use App\Models\Attachment;
use App\Models\Building;
use App\Models\Feature;
use App\Models\Land;
use App\Models\Provider;
use App\Models\RealEstate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RealEstateController extends Controller
{
    /**
     * Display a listing of the real estate.
     */
    public function index()
    {
        $reals = RealEstate::with(['realEstateable', 'advertisement'])->get(); // Get all real estate listings
        return view('admin.real-estates.index', compact(var_name: 'reals'));
    }

    /**
     * Show the form for creating a new real estate listing.
     */
    public function create()
    {
        $features = Feature::all();
        $providers = Provider::all();
        return view('admin.real-estates.create', compact('features', 'providers'));
    }

    /**
     * Store a newly created real estate listing in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'description' => 'required|string',
            'boundaries' => 'required|string',
            // 'province' => 'required|string',
            'location' => 'required|string',
            'price' => 'required|numeric',
            'status' => 'required|in:rent,sale',
            'commercial_number' => 'required|string',
            'provider_id' => 'required|exists:providers,id',
        ]);

        $id = null;
        $type = null;

        if ($request->real_estate_type == "apartment") {
            $request->validate([
                'floor_number' => 'required|integer',
                'rooms_number' => 'required|integer',
                'bathrooms_number' => 'required|integer',
                'kitchens_number' => 'required|integer',
                'condition' => 'required|in:new,old',
            ]);

            $apartment = Apartment::create([
                'floor_number' => $request->floor_number,
                'rooms_number' => $request->rooms_number,
                'bathrooms_number' => $request->bathrooms_number,
                'kitchens_number' => $request->kitchens_number,
                'condition' => $request->condition,
            ]);

            $id = $apartment->id;
            $type = Apartment::class;
        } elseif ($request->real_estate_type == "building") {
            $request->validate([
                'floors_number' => 'required|integer',
                'apartments_count' => 'required|integer',
            ]);

            $building = Building::create([
                'floors_number' => $request->floors_number,
                'apartments_count' => $request->apartments_count,
            ]);

            $id = $building->id;
            $type = Building::class;
        } elseif ($request->real_estate_type == "land") {
            $request->validate([
                'area' => 'required|numeric',
                'water' => 'required|boolean',
                'electricity' => 'required|boolean',
                'sewage' => 'required|boolean',
                'gas' => 'required|boolean',
                'access' => 'nullable|string',
            ]);

            $land = Land::create([
                'area' => $request->area,
                'water' => $request->water,
                'electricity' => $request->electricity,
                'sewage' => $request->sewage,
                'gas' => $request->gas,
                'access' => $request->access,
            ]);

            $id = $land->id;
            $type = Land::class;
        }

        // Check if $id and $type are not null
        if ($id && $type) {
            $advertisement = Advertisement::create([
                'provider_id' => $request->provider_id,
            ]);
            $realEstate = new RealEstate();
            $realEstate->description = $request->description;
            $realEstate->boundaries = $request->boundaries;
            $realEstate->location = $request->location;
            // $realEstate->city_id = 1;
            $realEstate->status = $request->status;
            $realEstate->price = $request->price;
            $realEstate->commercial_number = $request->commercial_number;
            $realEstate->advertisement_id = $advertisement->id;
            $realEstate->real_estateable_type = $type;  // Assigning the polymorphic type
            $realEstate->real_estateable_id = $id;      // Assigning the polymorphic ID
            $realEstate->save();

            // Create and associate Feature instances
            if ($request->has('features')) {

                foreach ($request->input('features') as $value) {
                    if ($value)
                        Feature::create(['name' => $value, 'real_estate_id' => $realEstate->id]);
                }
            }

            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    $path = $file->store('attachments', 'public');
                    Attachment::create([
                        'attachable_id' => $realEstate->id,
                        'attachable_type' => RealEstate::class,
                        'file_path' => $path,
                        'file_type' => $file->getClientOriginalExtension() === 'mp4' ? 'video' : 'image',
                    ]);
                }
            }

            return redirect()->route('admin.real-estates.index')->with('success', 'added');
        } else {
            return response(['error' => 'Real Estate creation failed.'], 400);
        }
    }

    /**
     * Display the specified real estate listing.
     */
    public function show($id)
    {
        $realEstate = RealEstate::with(['realEstateable', 'features', 'attachments'])->findOrFail($id);

        return view('admin.real-estates.show', compact('realEstate'));
    }

    /**
     * Show the form for editing the specified real estate listing.
     */
    public function edit($id)
    {
        $realEstate = RealEstate::with(['realEstateable', 'features', 'attachments'])->findOrFail($id);

        return view('admin.real-estates.edit', compact('realEstate'));
    }

    /**
     * Update the specified real estate listing in storage.
     */
    public function update(Request $request, RealEstate $realEstate)
    {
        $validatedData = $request->validate([
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
            'floor_number' => 'required_if:type,apartment|numeric',
            'rooms_number' => 'required_if:type,apartment|numeric',
            'bathrooms_number' => 'required_if:type,apartment|numeric',
            'kitchens_number' => 'required_if:type,apartment|numeric',
            'condition' => 'required_if:type,apartment|string|in:new,old',
            'floors_number' => 'required_if:type,building|numeric',
            'apartments_count' => 'required_if:type,building|numeric',
            'area' => 'required_if:type,land|numeric',
            'water' => 'required_if:type,land|boolean',
            'electricity' => 'required_if:type,land|boolean',
            'sewage' => 'required_if:type,land|boolean',
            'gas' => 'required_if:type,land|boolean',
            'access' => 'required_if:type,land|string',
        ]);

        $realEstate->update([
            'description' => $validatedData['description'],
            'boundaries' => $validatedData['boundaries'],
            'location' => $validatedData['location'],
            'city_id' => $validatedData['city_id'],
            'status' => $validatedData['status'],
            'price' => $validatedData['price'],
            'commercial_number' => $validatedData['commercial_number'],
        ]);

        $realEstate->advertisement()->update([
            'title' => $validatedData['title'],
            'provider_id' => $validatedData['provider_id'],
            'status' => $validatedData['ads_status'],
        ]);

        if ($realEstate->isApartment() || $request->input('type') == 'apartment') {
            $realEstate->realEstateable->update([
                'floor_number' => $validatedData['floor_number'],
                'rooms_number' => $validatedData['rooms_number'],
                'bathrooms_number' => $validatedData['bathrooms_number'],
                'kitchens_number' => $validatedData['kitchens_number'],
                'condition' => $validatedData['condition'],
            ]);
        } elseif ($realEstate->isBuilding() || $request->input('type') == 'building') {
            $realEstate->realEstateable->update([
                'floors_number' => $validatedData['floors_number'],
                'apartments_count' => $validatedData['apartments_count'],
            ]);
        } elseif ($realEstate->isLand() || $request->input('type') == 'land') {
            $realEstate->realEstateable->update([
                'area' => $validatedData['area'],
                'water' => $validatedData['water'],
                'electricity' => $validatedData['electricity'],
                'sewage' => $validatedData['sewage'],
                'gas' => $validatedData['gas'],
                'access' => $validatedData['access'],
            ]);
        }

        $realEstate->features()->delete();
        if (!empty($validatedData['tags'])) {
            foreach ($validatedData['tags'] as $tag) {
                $realEstate->features()->create(['name' => $tag]);
            }
        }

        if ($request->hasFile('attachments')) {
            foreach ($realEstate->attachments as $attachment) {
                Storage::disk('public')->delete($attachment->file_path);
                $attachment->delete();
            }

            foreach ($request->file('attachments') as $file) {
                $filePath = $file->store('attachments', 'public');
                $realEstate->attachments()->create([
                    'file_path' => $filePath,
                    'file_type' => 'image',
                ]);
            }
        }

        return redirect()->route('admin.real-estates.index')->with('success', 'تم تحديث العقار بنجاح.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $advertisement = Advertisement::find($id);
        if ($advertisement) {
            $advertisement->delete();
            return redirect()->route('admin.real-estates.index')->with('success', 'deleted');
        } else {
            return redirect()->route('admin.real-estates.index')->with('error', 'deleted');
        }
    }
}
