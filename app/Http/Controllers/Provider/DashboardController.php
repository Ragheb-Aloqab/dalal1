<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Building;
use App\Models\Land;
use App\Models\Provider;
use App\Services\DashboardHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $dashboardHelper;

    public function __construct(DashboardHelper $help)
    {
        $this->dashboardHelper = $help;
    }
    public function index()
    {
        $user = Auth::user();
        $providerId = $user->userable_id;
        $provider = Provider::with('advertisements.realEstate')->find($providerId);

        // Set the provider in the DashboardHelper
        $this->dashboardHelper->setProvider($provider);

        // Fetch statistics using the DashboardHelper methods
        $mostLikedData = $this->dashboardHelper->getMostLikedAdvertisements();
        $highestRatedData = $this->dashboardHelper->getHighestRatedAdvertisements();
        $realEstateCounts = $this->dashboardHelper->getRealEstateCounts();
        $followersCount = $this->dashboardHelper->getFollowersCount();
        $advertisementsCount = $this->dashboardHelper->getAdvertisementsCount();
        $followers = $provider->followers()->latest()->take(value: 6)->get();        return view('provider.dashboard', compact(
            'followers',
            'provider',
            'mostLikedData',
            'highestRatedData',
            'realEstateCounts',
            'followersCount',
            'advertisementsCount'
        ));
    }
    // public function index()
    // {
    //     $user = Auth::user()->userable_id;
    //     $provider = Provider::with('advertisements.realEstate')->find(id: $user); // Fetch the authenticated provider's data

    //     // Fetching counts of real estates through the advertisements linked to the provider
    //     $landsCount = $provider->advertisements()->whereHas('realEstate', function ($query) {
    //         $query->where('real_estateable_type', Land::class); // Correctly filter for lands
    //     })->count();

    //     $apartmentsCount = $provider->advertisements()->whereHas('realEstate', function ($query) {
    //         $query->where('real_estateable_type', Apartment::class); // Correctly filter for apartments
    //     })->count();

    //     $buildingsCount = $provider->advertisements()->whereHas('realEstate', function ($query) {
    //         $query->where('real_estateable_type', Building::class); // Correctly filter for buildings
    //     })->count();

    //     $followersCount = $provider->followers()->count();
    //     $advertisementsCount = $provider->advertisements()->count();
    //     // $conversationsCount = $provider->user->user1->conversations()->count();

    //     return view('provider.dashboard', compact('landsCount', 'apartmentsCount', 'buildingsCount', 'followersCount', 'advertisementsCount'));
    // }


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
