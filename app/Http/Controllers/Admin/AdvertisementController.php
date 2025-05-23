<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Apartment;
use App\Models\Provider;
use App\Models\RealEstate;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advertisements = Advertisement::all();
        response($advertisements->all());
        return view('admin.advertisements.index', compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $providers = Provider::with('user')->get();
        return view('admin.advertisements.create', compact('providers'));
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


        return redirect()->route('admin.advertisements.index')->with('success', 'تم إنشاء الإعلان بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ad = Advertisement::findOrFail($id);
        return view('admin.advertisements.show', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $realEstate = RealEstate::with(['realEstateable', 'features', 'attachments'])->where('advertisment_id','=',$id)->findOrFail($id);

        return view('admin.advertisements.edit', compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'provider_id' => 'required|exists:providers,id',
        ]);

        $advertisement = Advertisement::findOrFail($id);
        $advertisement->title = $request->input('title');
        $advertisement->provider_id = $request->input('provider_id');
        $advertisement->save();

        return redirect()->route('admin.advertisements.index')->with('success', 'تم تحديث الإعلان بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->delete();

        return redirect()->route('admin.advertisements.index')->with('success', 'تم حذف الإعلان بنجاح.');
    }
}
