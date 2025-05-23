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

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reals = RealEstate::with(['realEstateable','advertisement'])->buildings()->get();
        return view('admin.buildings.index', compact(var_name: 'reals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $providers = Provider::all();
        $features = Feature::all();
        return view('admin.buildings.create', compact('providers', 'features'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
            'floors_number' => 'required|numeric',
            'apartments_count' => 'required|numeric',
            'tags' => 'nullable|array',
            'attachments' => 'nullable|array',
            'attachments.*' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
        ]);
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
                'provider_id' => $validatedData['provider_id'],
                'status' => $validatedData['ads_status'],
            ])
        );
        $realEstate->realEstateable()->associate(
            Building::create([
                'floors_number' => $validatedData['floors_number'],
                'apartments_count' => $validatedData['apartments_count'],

            ])
        );
        $realEstate->save();
        if (!empty($validatedData['tags'])) {
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

        return redirect()->route('admin.buildings.index')->with('success', 'تم إنشاء المبنى بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $building = Building::with('realEstate.provider', 'realEstate.features', 'realEstate.attachments')->findOrFail($id);
        return view('admin.buildings.show', compact('building'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $realEstate = RealEstate::with('advertisement', 'realEstateable', 'features', 'attachments')->findOrFail($id);
        return view('admin.buildings.edit', [
            'realEstate' => $realEstate,
            'tags' => $realEstate->features->pluck('name'),
            'attachments' => $realEstate->attachments,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RealEstate $building)
    {
        // Validate the request data
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
            'floors_number' => 'required|numeric',
            'apartments_count' => 'required|numeric',
            'tags' => 'nullable|array',
            'attachments' => 'nullable|array',
            'attachments.*' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Update the RealEstate fields
        $building->description = $validatedData['description'];
        $building->boundaries = $validatedData['boundaries'];
        $building->location = $validatedData['location'];
        $building->city_id = $validatedData['city_id'];
        $building->status = $validatedData['status'];
        $building->price = $validatedData['price'];
        $building->commercial_number = $validatedData['commercial_number'];

        $building->advertisement->update([
            'title' => $validatedData['title'],
            'provider_id' => $validatedData['provider_id'],
            'status' => $validatedData['ads_status'],
        ]);

        $building->realEstateable->update([
            'floors_number' => $validatedData['floors_number'],
            'apartments_count' => $validatedData['apartments_count'],
        ]);
        if (!empty($validatedData['tags'])) {
            $building->features()->delete();  // Clear existing tags
            foreach ($validatedData['tags'] as $tag) {
                $building->features()->create(['name' => $tag]);
            }
        }

        // Handle file uploads
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $filePath = $file->store('attachments', 'public');
                $building->attachments()->create([
                    'file_path' => $filePath,
                    'file_type' => 'image',
                ]);
            }
        }

        $building->save();

        return redirect()->route('admin.buildings.index')->with('success', 'تم تحديث المبنى بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $building = Building::findOrFail($id);
        $realEstate = $building->realEstate;

        foreach ($realEstate->attachments as $attachment) {
            Storage::delete($attachment->file_path);
            $attachment->delete();
        }

        $building->delete();
        $realEstate->delete();

        return redirect()->route('admin.buildings.index')->with('success', 'تم حذف المبنى بنجاح.');
    }
}
