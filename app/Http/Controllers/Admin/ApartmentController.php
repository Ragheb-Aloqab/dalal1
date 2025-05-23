<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Apartment;
use App\Models\Attachment;
use App\Models\Building;
use App\Models\City;
use App\Models\Feature;
use App\Models\Land;
use App\Models\Provider;
use App\Models\RealEstate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reals = RealEstate::with(['realEstateable','advertisement'])->apartments()->get();
        return view('admin.apartments.index', compact(var_name: 'reals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $providers = Provider::all();
        $cities = City::all();
        return view('admin.apartments.create', compact('providers', 'cities'));
    }

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
            'floor_number' => 'required|numeric',
            'rooms_number' => 'required|numeric',
            'bathrooms_number' => 'required|numeric',
            'kitchens_number' => 'required|numeric',
            'condition' => 'required|string|in:new,old',
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
            Apartment::create([
                'floor_number' => $validatedData['floor_number'],
                'rooms_number' => $validatedData['rooms_number'],
                'bathrooms_number' => $validatedData['bathrooms_number'],
                'kitchens_number' => $validatedData['kitchens_number'],
                'condition' => $validatedData['condition'],
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
        return redirect()->route('admin.apartments.index')->with('success', 'تم إضافة الشقة بنجاح');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return response(RealEstate::where('real_estateable_id','=',$id)->get());
        $apartment = Apartment::with('realEstate.provider', 'realEstate.features', 'realEstate.attachments')->findOrFail($id);
        return view('admin.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $realEstate = RealEstate::with('advertisement', 'realEstateable', 'features', 'attachments')->findOrFail($id);
        return view('admin.apartments.edit', [
            'realEstate' => $realEstate,
            'tags' => $realEstate->features->pluck('name'),
            'attachments' => $realEstate->attachments,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
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
            'floor_number' => 'required|numeric',
            'rooms_number' => 'required|numeric',
            'bathrooms_number' => 'required|numeric',
            'kitchens_number' => 'required|numeric',
            'condition' => 'required|string|in:new,old',
            'tags' => 'nullable|array',
            'attachments' => 'nullable|array',
            'attachments.*' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
        ]);
        $realEstate = RealEstate::findOrFail($id);
        $realEstate->description = $validatedData['description'];
        $realEstate->boundaries = $validatedData['boundaries'];
        $realEstate->location = $validatedData['location'];
        $realEstate->city_id = $validatedData['city_id'];
        $realEstate->status = $validatedData['status'];
        $realEstate->price = $validatedData['price'];
        $realEstate->commercial_number = $validatedData['commercial_number'];
        $realEstate->advertisement()->update([
            'title' => $validatedData['title'],
            'provider_id' => $validatedData['provider_id'],
            'status' => $validatedData['ads_status'],
        ]);
        $realEstate->realEstateable()->update([
            'floor_number' => $validatedData['floor_number'],
            'rooms_number' => $validatedData['rooms_number'],
            'bathrooms_number' => $validatedData['bathrooms_number'],
            'kitchens_number' => $validatedData['kitchens_number'],
            'condition' => $validatedData['condition'],
        ]);
        if (!empty($validatedData['tags'])) {
            $realEstate->features()->delete(); // Remove old tags
            foreach ($validatedData['tags'] as $tag) {
                $realEstate->features()->create(['name' => $tag]); // Add new tags
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
        $realEstate->save();
        return redirect()->route('admin.apartments.index')->with('success', 'تم تحديث بيانات الشقة بنجاح');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $apartment = Apartment::findOrFail($id);
        $realEstate = $apartment->realEstate;

        foreach ($realEstate->attachments as $attachment) {
            Storage::delete($attachment->file_path);
            $attachment->delete();
        }

        $apartment->delete();
        $realEstate->delete();

        return redirect()->route('admin.apartments.index')->with('success', 'تم حذف الشقة بنجاح.');
    }
}
