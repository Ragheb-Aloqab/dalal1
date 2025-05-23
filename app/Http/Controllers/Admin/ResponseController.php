<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use App\Models\Request as ModelsRequest;
use App\Models\Response;
use Illuminate\Http\Request;

class ResponseController extends Controller
{

      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $responses = Response::with(['provider', 'request'])->get(); // Eager load relationships
        return view('admin.responses.index', compact('responses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $providers = Provider::all(); // Fetch all providers
        $requests = ModelsRequest::all(); // Fetch all requests

        return view('admin.responses.create', compact('providers', 'requests'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'provider_id' => 'required|exists:providers,id',
            'request_id' => 'required|exists:requests,id',
            'has_ads' => 'required|boolean',
            'answer' => 'required|string',
        ]);

        Response::create($request->all());

        return redirect()->route('admin.responses.index')->with('success', 'تم إنشاء الرد بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = Response::with(['provider', 'request'])->findOrFail($id); // Eager load relationships
        return view('admin.responses.show', compact('response'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $response = Response::findOrFail($id); // Fetch the response
        $providers = Provider::all(); // Fetch all providers
        $requests = ModelsRequest::all(); // Fetch all requests

        return view('admin.responses.edit', compact('response', 'providers', 'requests'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'provider_id' => 'required|exists:providers,id',
            'request_id' => 'required|exists:requests,id',
            'has_ads' => 'required|boolean',
            'answer' => 'required|string',
        ]);

        $response = Response::findOrFail($id);
        $response->update($request->all());

        return redirect()->route('admin.responses.index')->with('success', 'تم تحديث الرد بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Response::findOrFail($id);
        $response->delete();

        return redirect()->route('admin.responses.index')->with('success', 'تم حذف الرد بنجاح.');
    }
}
