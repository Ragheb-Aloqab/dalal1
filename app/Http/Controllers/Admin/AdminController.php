<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::admins()->get();
        return view('admin.admins.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $providers = Provider::all();
        return view('admin.admins.create', compact('providers'));
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

        $user = new User();
        $user->name =  $validatedData['name'];
        $user->email =  $validatedData['email'];
        $user->password = $randomPassword;
        $user->phone =  $validatedData['phone'];
        $user->city_id = $validatedData['city_id'];
        $user->avatar = $avatarPath;
        $user->userable()->associate(model: Admin::create([]));
        $user->save();

        return redirect()->route('admin.admins.index')->with('success', 'تم إنشاء المسؤول بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        if ($user->isAdmin()) {
            return view('admin.admins.show', data: compact('user'));
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

        if ($user->isAdmin()) {
            return view('admin.admins.edit', data: compact('user'));
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
            'email' => 'required|email|unique:admins,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->filled('password')) {
            $admin->password = bcrypt($request->password);
        }
        $admin->save();

        return redirect()->route('admin.admins.index')->with('success', 'تم تحديث المسؤول بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $admin = Admin::findOrFail($user->userable->id);
        $admin->delete();
        $user->delete();

        return redirect()->route('admin.admins.index')->with('success', 'تم حذف المسؤول بنجاح.');
    }
}
