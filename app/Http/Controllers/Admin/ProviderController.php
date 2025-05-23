<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::providers()->get();
        return view('admin.providers.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.providers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'city_id' => 'required|exists:cities,id',
            'location' => 'required|string|max:255',
            'commercial_number' => 'required|string|unique:providers,commercial_number',
            'commercial_certificate_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'personal_id_number' => 'required|string|unique:providers,personal_id_number',
            'personal_id_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'account_status' => 'required|in:active,inactive,suspended',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Store the user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt('password'); // Default password, change as needed
        $user->city_id = $request->city_id;

        if ($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')->store('avatars');
        }



        // Store provider details
        $provider = new Provider();
        $provider->location = $request->location;
        $provider->commercial_number = $request->commercial_number;
        $provider->personal_id_number = $request->personal_id_number;
        $provider->account_status = $request->account_status;

        if ($request->hasFile('commercial_certificate_image')) {
            $provider->commercial_certificate_image = $request->file('commercial_certificate_image')->store('providers');
        }

        if ($request->hasFile('personal_id_image')) {
            $provider->personal_id_image = $request->file('personal_id_image')->store('providers');
        }

        $provider->save();

        // Associate the provider with the user
        $user->userable()->associate($provider);
        $user->save();

        return redirect()->route('admin.providers.index')->with('success', 'Provider created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        if ($user->isProvider()) {
            $provider = Provider::with(['user', 'followers'])->findOrFail($user->userable_id);

            // return response($provider);
            return view('admin.providers.show', compact('provider'));
        } else {
            redirect()->route('admin.error-page')->with('success', 'السجل غير موجود');
        }

        $provider = Provider::findOrFail($id);

        // return view('admin.providers.show', compact('provider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        if ($user->isAdmin()) {

            $provider = Provider::with('user')->findOrFail($user->userable_id);
            return view('admin.providers.edit', compact('provider'));
        } else {
            redirect()->route('admin.error-page')->with('success', 'السجل غير موجود');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|string|max:20',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'city_id' => 'required|exists:cities,id',
            'location' => 'required|string|max:255',
            'commercial_number' => 'required|string|unique:providers,commercial_number,' . $id,
            'commercial_certificate_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'personal_id_number' => 'required|string|unique:providers,personal_id_number,' . $id,
            'personal_id_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'account_status' => 'required|in:active,inactive,suspended',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the provider and user
        $provider = Provider::findOrFail($id);
        $user = User::where('userable_type', Provider::class)
            ->where('userable_id', $provider->id)
            ->firstOrFail();

        // Update the user
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->city_id = $request->city_id;

        if ($request->hasFile('avatar')) {
            // Delete the old avatar if it exists
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }
            $user->avatar = $request->file('avatar')->store('avatars');
        }

        $user->save();

        // Update provider details
        $provider->location = $request->location;
        $provider->commercial_number = $request->commercial_number;
        $provider->personal_id_number = $request->personal_id_number;
        $provider->account_status = $request->account_status;

        if ($request->hasFile('commercial_certificate_image')) {
            // Delete the old commercial certificate image if it exists
            if ($provider->commercial_certificate_image) {
                Storage::delete($provider->commercial_certificate_image);
            }
            $provider->commercial_certificate_image = $request->file('commercial_certificate_image')->store('providers');
        }

        if ($request->hasFile('personal_id_image')) {
            // Delete the old personal ID image if it exists
            if ($provider->personal_id_image) {
                Storage::delete($provider->personal_id_image);
            }
            $provider->personal_id_image = $request->file('personal_id_image')->store('providers');
        }
        $provider->save();
        return redirect()->route('admin.providers.index')->with('success', 'Provider updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $provider = Provider::findOrFail($user->userable_id);
        if ($provider->commercial_certificate_image) {
            Storage::delete($provider->commercial_certificate_image);
        }
        if ($provider->personal_id_image) {
            Storage::delete($provider->personal_id_image);
        }
        $provider->delete();
        $user->delete();

        return redirect()->route('admin.providers.index')->with('success', 'Provider deleted successfully.');
    }
}
