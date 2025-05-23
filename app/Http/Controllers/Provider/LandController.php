<?php

namespace App\Http\Controllers\Provider;

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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        // Check if the user is a provider using the morph relation
        if ($user->userable_type !== 'App\\Models\\Provider') {
            abort(403, 'Unauthorized action.');
        }

        $reals = RealEstate::with(['realEstateable', 'advertisement'])
            ->lands()
            ->whereHas('advertisement', function ($query) use ($user) {
                $query->where('provider_id', '=', $user->userable_id);
            })
            ->get();

        return view('provider.lands.index', compact(var_name: 'reals'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $providers = Provider::all();
        $features = Feature::all();
        return view('provider.lands.create', compact('providers', 'features'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            // 'provider_id' => 'required|exists:providers,id',
            // 'ads_status' => 'required|string|in:active,inactive',
            'description' => 'required|string',
            'boundaries' => 'required|string',
            'city_id' => 'required|exists:cities,id',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'commercial_number' => 'required|string|max:255',
            'status' => 'required|string|in:sale,rent',
            'area' => 'required|numeric|min:0',
            'water' => 'required|boolean',
            'electricity' => 'required|boolean',
            'sewage' => 'required|boolean',
            'gas' => 'required|boolean',
            'access' => 'required|string',
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
                // 'provider_id' => $validatedData['provider_id'],
                // 'status' => $validatedData['ads_status'],
                'provider_id' => $user->userable_id,
                'status' => 'inactive',
            ])
        );
        $realEstate->realEstateable()->associate(
            Land::create([
                'area' => $request->input('area'),
                'water' => $request->input('water'),
                'electricity' => $request->input('electricity'),
                'sewage' => $request->input('sewage'),
                'gas' => $request->input('gas'),
                'access' => $request->input('access'),
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
        return redirect()->route('provider.lands.index')->with('success', 'تم إضافة الأرض بنجاح');
    }


    public function show(string $id)
    {

        $ad = Advertisement::with('realEstate')
            ->whereHas('realEstate', function ($query) use ($id) {
                $query->where('id', $id);
            })->firstOrFail();
        return view('provider.lands.show', compact(var_name: 'ad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $realEstate = RealEstate::with('advertisement', 'realEstateable', 'features', 'attachments')->findOrFail($id);
        return view('provider.lands.edit', [
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
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            // 'provider_id' => 'required|exists:providers,id',
            // 'ads_status' => 'required|string|in:active,inactive',
            'description' => 'required|string',
            'boundaries' => 'required|string',
            'city_id' => 'required|exists:cities,id',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'commercial_number' => 'required|string|max:255',
            'status' => 'required|string|in:sale,rent',
            'area' => 'required|numeric|min:0',
            'water' => 'required|boolean',
            'electricity' => 'required|boolean',
            'sewage' => 'required|boolean',
            'gas' => 'required|boolean',
            'access' => 'required|string',
            'tags' => 'nullable|array',
            'attachments' => 'nullable|array',
            'attachments.*' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Fetch the real estate to update
        $realEstate = RealEstate::findOrFail($id);
        $realEstate->description = $validatedData['description'];
        $realEstate->boundaries = $validatedData['boundaries'];
        $realEstate->location = $validatedData['location'];
        $realEstate->city_id = $validatedData['city_id'];
        $realEstate->status = $validatedData['status'];
        $realEstate->price = $validatedData['price'];
        $realEstate->commercial_number = $validatedData['commercial_number'];

        // Update associated advertisement
        $realEstate->advertisement()->update([
            'title' => $validatedData['title'],
            // 'provider_id' => $validatedData['provider_id'],
            // 'status' => $validatedData['ads_status'],
        ]);

        // Update associated land details
        $realEstate->realEstateable()->update([
            'area' => $request->input('area'),
            'water' => $request->input('water'),
            'electricity' => $request->input('electricity'),
            'sewage' => $request->input('sewage'),
            'gas' => $request->input('gas'),
            'access' => $request->input('access'),
        ]);

        // Handle tags update
        if (!empty($validatedData['tags'])) {
            $realEstate->features()->delete(); // Remove old tags
            foreach ($validatedData['tags'] as $tag) {
                $realEstate->features()->create(['name' => $tag]); // Add new tags
            }
        }

        // Handle attachments update
        if ($request->hasFile('attachments')) {
            // Optionally, delete old attachments here if needed
            foreach ($request->file('attachments') as $file) {
                $filePath = $file->store('attachments', 'public');
                $realEstate->attachments()->create([
                    'file_path' => $filePath,
                    'file_type' => 'image',
                ]);
            }
        }

        // Save the updated real estate
        $realEstate->save();

        // Redirect with a success message
        return redirect()->route('provider.lands.index')->with('success', 'تم تعديل الأرض بنجاح');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $land = Land::findOrFail($id);
        $realEstate = $land->realEstate;

        foreach ($realEstate->attachments as $attachment) {
            Storage::delete($attachment->file_path);
            $attachment->delete();
        }

        $land->delete();
        $realEstate->delete();

        return redirect()->route('provider.lands.index')->with('success', 'تم حذف الأرض بنجاح.');
    }
}
