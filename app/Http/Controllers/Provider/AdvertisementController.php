<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Apartment;
use App\Models\Building;
use App\Models\Land;
use App\Models\Provider;
use App\Models\RealEstate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertisementController extends Controller
{

    public function index(Request $request)
    {
        // Get the authenticated user

        $user =  Auth::user();

        // Check if the user is a provider using the morph relation
        if ($user->userable_type !== 'App\\Models\\Provider') {
            abort(403, 'Unauthorized action.');
        }



        // Retrieve search input and status select from the request
        $search = $request->input('search');
        $status = $request->input('status');

        // Build the query to get only the provider's advertisements
        $advertisements = Advertisement::where('provider_id', $user->userable_id);

        // Apply search filter if provided
        if (!empty($search)) {
            $advertisements->where('title', 'like', '%' . $search . '%');
        }

        // Apply status filter if provided
        if (!empty($status)) {
            $advertisements->where('status', $status);
        }

        // Add pagination (e.g., 10 advertisements per page)
        $advertisements = $advertisements->paginate(10);
        //  return response($advertisements);
        // Pass the advertisements and filters to the view
        return view('provider.advertisements.index', compact('advertisements', 'search', 'status'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.advertisements.create');
    }
    public function store(Request $request)
    {
        // Retrieve the real estate type from the request
        $realEstateType = $request->input('realEstateType');

        // Get the authenticated user
        $user =  Auth::user();

        // // Ensure the user is a provider
        if (!$user || !$user->userable || !($user->userable instanceof Provider)) {
            return redirect()->back()->withErrors(['provider_id' => 'المستخدم ليس مزوداً صالحاً.']);
        }

        // Get the provider ID
        $providerId = $user->userable_id;

        // Initialize validation rules
        $validationRules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'boundaries' => 'required|string',
            'city_id' => 'required|exists:cities,id',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'commercial_number' => 'required|string|max:255',
            'status' => 'required|string|in:sale,rent',
            'tags' => 'nullable|array',
            'attachments' => 'nullable|array',
            'attachments.*' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
        ];

        // Add validation rules based on the real estate type
        switch ($realEstateType) {
            case 'land':
                $validationRules = array_merge($validationRules, [
                    'area' => 'required|numeric|min:0',
                    'water' => 'required|boolean',
                    'electricity' => 'required|boolean',
                    'sewage' => 'required|boolean',
                    'gas' => 'required|boolean',
                    'access' => 'required|string',
                ]);
                break;

            case 'building':
                $validationRules = array_merge($validationRules, [
                    'floors_number' => 'required|numeric',
                    'apartments_count' => 'required|numeric',
                ]);
                break;

            case 'apartment':
                $validationRules = array_merge($validationRules, [
                    'floor_number' => 'required|numeric',
                    'rooms_number' => 'required|numeric',
                    'bathrooms_number' => 'required|numeric',
                    'kitchens_number' => 'required|numeric',
                    'condition' => 'required|string|in:new,old',
                ]);
                break;

            default:
                return redirect()->back()->withErrors(['realEstateType' => 'نوع العقار غير صالح.']);
        }

        // Validate the request
        $validatedData = $request->validate($validationRules);

        // Create the RealEstate object
        $realEstate = new RealEstate();
        $realEstate->description = $validatedData['description'];
        $realEstate->boundaries = $validatedData['boundaries'];
        $realEstate->location = $validatedData['location'];
        $realEstate->city_id = $validatedData['city_id'];
        $realEstate->status = $validatedData['status'];
        $realEstate->price = $validatedData['price'];
        $realEstate->commercial_number = $validatedData['commercial_number'];
        $realEstate->advertisement()->associate(
            Advertisement::create([
                'title' => $validatedData['title'],
                'provider_id' => $providerId, // Use the provider ID from the authenticated user
            ])
        );

        // Handle the real estate type association
        if ($realEstateType === 'apartment') {
            $realEstate->realEstateable()->associate(
                Apartment::create([
                    'floor_number' => $validatedData['floor_number'],
                    'rooms_number' => $validatedData['rooms_number'],
                    'bathrooms_number' => $validatedData['bathrooms_number'],
                    'kitchens_number' => $validatedData['kitchens_number'],
                    'condition' => $validatedData['condition'],
                ])
            );
        } elseif ($realEstateType === 'building') {
            $realEstate->realEstateable()->associate(
                Building::create([
                    'floors_number' => $validatedData['floors_number'],
                    'apartments_count' => $validatedData['apartments_count'],
                ])
            );
        } elseif ($realEstateType === 'land') {
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

        // Handle tags
        if (!empty($validatedData['tags'])) {
            foreach ($validatedData['tags'] as $tag) {
                $realEstate->features()->create(['name' => $tag]);
            }
        }

        // Handle attachments
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $filePath = $file->store('attachments', 'public');
                $realEstate->attachments()->create([
                    'file_path' => $filePath,
                    'file_type' => 'image',
                ]);
            }
        }

        return redirect()->route('provider.advertisements.index')->with('success', 'تم إنشاء الإعلان بنجاح.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ad = Advertisement::findOrFail($id);

        return view('provider.advertisements.show', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $realEstate = RealEstate::where('advertisement_id', '=', $id)->first();
        return view('provider.advertisements.edit', [
            'realEstate' => $realEstate,
            'tags' => $realEstate->features->pluck('name'),
            'attachments' => $realEstate->attachments,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $realEstateType = $request->input('type');
        $realEstate = RealEstate::findOrFail($id);
        $validationRules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'boundaries' => 'required|string',
            'city_id' => 'required|exists:cities,id',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'commercial_number' => 'required|string|max:255',
            'status' => 'required|string|in:sale,rent',
            'tags' => 'nullable|array',
            'attachments' => 'nullable|array',
            'attachments.*' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
        ];
        switch ($realEstateType) {
            case 'land':
                $validationRules = array_merge($validationRules, [
                    'area' => 'required|numeric|min:0',
                    'water' => 'required|boolean',
                    'electricity' => 'required|boolean',
                    'sewage' => 'required|boolean',
                    'gas' => 'required|boolean',
                    'access' => 'required|string',
                ]);
                break;

            case 'building':
                $validationRules = array_merge($validationRules, [
                    'floors_number' => 'required|numeric',
                    'apartments_count' => 'required|numeric',
                ]);
                break;

            case 'apartment':
                $validationRules = array_merge($validationRules, [
                    'floor_number' => 'required|numeric',
                    'rooms_number' => 'required|numeric',
                    'bathrooms_number' => 'required|numeric',
                    'kitchens_number' => 'required|numeric',
                    'condition' => 'required|string|in:new,old',
                ]);
                break;

            default:
                return redirect()->back()->withErrors(['type' => 'نوع العقار غير صالح.']);
        }

        $validatedData = $request->validate($validationRules);

        $realEstate->description = $validatedData['description'];
        $realEstate->boundaries = $validatedData['boundaries'];
        $realEstate->location = $validatedData['location'];
        $realEstate->city_id = $validatedData['city_id'];
        $realEstate->status = $validatedData['status'];
        $realEstate->price = $validatedData['price'];
        $realEstate->commercial_number = $validatedData['commercial_number'];
        $realEstate->advertisement->update([
            'title' => $validatedData['title'],
        ]);
        if ($realEstateType === 'apartment') {
            $realEstate->realEstateable->update([
                'floor_number' => $validatedData['floor_number'],
                'rooms_number' => $validatedData['rooms_number'],
                'bathrooms_number' => $validatedData['bathrooms_number'],
                'kitchens_number' => $validatedData['kitchens_number'],
                'condition' => $validatedData['condition'],
            ]);
        } elseif ($realEstateType === 'building') {
            $realEstate->realEstateable->update([
                'floors_number' => $validatedData['floors_number'],
                'apartments_count' => $validatedData['apartments_count'],
            ]);
        } elseif ($realEstateType === 'land') {
            $realEstate->realEstateable->update([
                'area' => $validatedData['area'],
                'water' => $validatedData['water'],
                'electricity' => $validatedData['electricity'],
                'sewage' => $validatedData['sewage'],
                'gas' => $validatedData['gas'],
                'access' => $validatedData['access'],
            ]);
        }

        $realEstate->save();
        if (!empty($validatedData['tags'])) {
            $realEstate->features()->delete(); // Remove existing tags if needed
            foreach ($validatedData['tags'] as $tag) {
                $realEstate->features()->create(['name' => $tag]);
            }
        }

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $filePath = $file->store('attachments', 'public');
                $realEstate->attachments()->create([
                    'file_path' => $filePath,
                    'file_type' => 'image',
                ]);
            }
        }
        return redirect()->route('provider.advertisements.index')->with('success', 'تم تحديث الإعلان بنجاح.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $advertisement = Advertisement::findOrFail($id);
        $advertisement->delete();

        return redirect()->route(route: 'provider.advertisements.index')->with('success', 'تم حذف الإعلان بنجاح.');
    }
}
