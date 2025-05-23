<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::clients()->get();
        return view('admin.clients.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|numeric|digits_between:8,15',
            'city_id' => 'required|exists:cities,id',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
        ]);
        $randomPassword = Str::random(10);
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public'); // Save to public storage
        } else {
            $avatarPath = null;
        }
        $client  = Client::create();
        $user = new User();
        $user->name =  $validatedData['name'];
        $user->email =  $validatedData['email'];
        $user->password = Hash::make($randomPassword);
        $user->phone =  $validatedData['phone'];
        $user->avatar = $avatarPath;
        $user->city_id = $validatedData['city_id'];
        $user->userable()->associate($client);
        $user->save();

        return redirect()->route('admin.clients.index')->with('success', 'تم إنشاء العميل بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        if ($user->isClient()) {
            return view('admin.clients.show', data: compact('user'));
        } else {
            redirect()->route('admin.error-page')->with('success', 'السجل غير موجود');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $user = User::findOrFail($id);

        if ($user->isClient()) {
            return view('admin.clients.edit', data: compact('user'));
        } else {
            redirect()->route('admin.error-page')->with('success', 'السجل غير موجود');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $id,
            'password' => 'nullable|string|min:8',
        ]);

        $client = User::findOrFail($id);
        $client->name = $request->input('name');
        $client->email = $request->input('email');

        if ($request->filled('password')) {
            $client->password = bcrypt($request->input('password'));
        }

        $client->save();

        return redirect()->route('admin.clients.index')->with('success', 'تم تحديث العميل بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $user = User::findOrFail($id);
        $client = Client::findOrFail($user->userable->id);
        $client->delete();
        $user->delete();
        return redirect()->route('admin.clients.index')->with('success', 'تم حذف العميل بنجاح.');
    }
}
