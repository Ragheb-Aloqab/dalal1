<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Request as UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = UserRequest::with('user')->get();

        return view('admin.requests.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users =  User::all();
        return view('admin.requests.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        UserRequest::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('admin.requests.index')
                         ->with('success', 'تم إنشاء الطلب بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $request = UserRequest::findOrFail($id);
        return view('admin.requests.show', compact('request'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $request = UserRequest::findOrFail($id);
        return view('admin.requests.edit', compact('request'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        $userRequest = UserRequest::findOrFail($id);
        $userRequest->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('admin.requests.index')
                         ->with('success', 'تم تحديث الطلب بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $userRequest = UserRequest::findOrFail($id);
        $userRequest->delete();

        return redirect()->route('admin.requests.index')
                         ->with('success', 'تم حذف الطلب بنجاح.');
    }
}
