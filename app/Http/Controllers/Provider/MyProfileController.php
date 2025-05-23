<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use App\Models\RealEstate;
use Illuminate\Http\Request;

class MyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user()->userable;
        $provider = Provider::findOrFail($user->id);
        $lands =  RealEstate::with(['realEstateable', 'advertisement'])
            ->lands()
            ->whereHas('advertisement', function ($query) use ($user) {
                $query->where('provider_id', '=', $user->id);
            })
            ->count();
        $apartments =  RealEstate::with(['realEstateable', 'advertisement'])
            ->apartments()
            ->whereHas('advertisement', function ($query) use ($user) {
                $query->where('provider_id', '=', $user->id);
            })
            ->count();
        $buildings =  RealEstate::with(['realEstateable', 'advertisement'])
            ->buildings()
            ->whereHas('advertisement', function ($query) use ($user) {
                $query->where('provider_id', '=', $user->id);
            })
            ->count();


        return view('provider.my-profile.index', compact('provider','lands','apartments','buildings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
