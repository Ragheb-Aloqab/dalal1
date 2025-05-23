<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProviderController extends Controller
{
    // public function store(Request $request)
    // {
    //     // Validate the request
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email',
    //         'phone' => 'required|string|max:20',
    //         'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    //         'city_id' => 'required|exists:cities,id',
    //         'location' => 'required|string|max:255',
    //         'password'=>'required|string|max:25',
    //         'commercial_number' => 'required|string|unique:providers,commercial_number',
    //         'commercial_certificate_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    //         'personal_id_number' => 'required|string|unique:providers,personal_id_number',
    //         'personal_id_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    //         'account_status' => 'required|in:active,inactive,suspended',
    //     ]);

    //     // Check if validation fails
    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => 'error',
    //             'errors' => $validator->errors(),
    //         ], 422);
    //     }

    //     // Store the user
    //     $user = new User();
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->phone = $request->phone;
    //     $user->password = $request->password; // Default password, change as needed
    //     $user->city_id = $request->city_id;

    //     if ($request->hasFile('avatar')) {
    //         $user->avatar = $request->file('avatar')->store('avatars');
    //     }

    //     // Save the user
    //     $user->save();

    //     // Store provider details
    //     $provider = new Provider();
    //     $provider->location = $request->location;
    //     $provider->commercial_number = $request->commercial_number;
    //     $provider->personal_id_number = $request->personal_id_number;
    //     $provider->account_status = $request->account_status;

    //     if ($request->hasFile('commercial_certificate_image')) {
    //         $provider->commercial_certificate_image = $request->file('commercial_certificate_image')->store('providers');
    //     }

    //     if ($request->hasFile('personal_id_image')) {
    //         $provider->personal_id_image = $request->file('personal_id_image')->store('providers');
    //     }

    //     $provider->save();

    //     // Associate the provider with the user
    //     $user->userable()->associate($provider);
    //     $user->save();

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Provider created successfully.',
    //         'data' => $user,
    //     ], 201);
    // }
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:8',
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
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Store the user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password); // تأكيد تشفير كلمة المرور
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

        // Create token for the user
        $token = $user->createToken('auth_token')->plainTextToken;

        // Return success response with the token
        return response()->json([
            'success' => 'Provider created successfully.',
            'token' => $token,
            'user' => $user
        ], 201);
    }

}