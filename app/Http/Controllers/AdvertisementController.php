<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\UserInteraction;
use App\Services\RealEstateSearchService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ads = Advertisement::with(['comments'])->paginate(10);
        return view('advertisments.index', compact('ads'));
    }

    // public function buildings(Request $request)
    // {
    //     $filters = [
    //         'price_min' => $request->input('price_min'),
    //         'price_max' => $request->input('price_max'),
    //         'city_id' => $request->input('city_id'),
    //         'floors_number' => $request->input('floors_number'),
    //         'apartments_count' => $request->input('apartments_count'),
    //     ];


    //     // Add pagination here
    //     $ads = Advertisement::searchBuilding($filters)->paginate(10); // 10 ads per page

    //     return view('advertisments.buildings', compact('ads'));
    // }

    // public function lands(Request $request)
    // {
    //     // $filters = [
    //     //     'price_min' => $request->input('price_min'),
    //     //     'price_max' => $request->input('price_max'),
    //     //     'city_id' => $request->input('city_id'),
    //     //     'area' => $request->input('area'),
    //     //     'water' => $request->input('water'),
    //     //     'electricity' => $request->input('electricity'),
    //     // ];

    //     // Add pagination here
    //     $ads = Advertisement::searchLand($request)->paginate(10); // 10 ads per page

    //     return view('advertisments.lands', compact('ads'));
    // }

    // public function apartments(Request $request)
    // {
    //     $filters = [
    //         'price_min' => $request->input('price_min'),
    //         'price_max' => $request->input('price_max'),
    //         'city_id' => $request->input('city_id'),
    //         'rooms_number' => $request->input('rooms_number'),
    //         'bathrooms_number' => $request->input('bathrooms_number'),
    //         'condition' => $request->input('condition'),
    //     ];

    //     // Add pagination here
    //     $ads = Advertisement::searchApartment($filters)->paginate(10); // 10 ads per page

    //     return view('advertisments.apartments', compact('ads'));
    // }
    // // public function search(Request $request)
    // // {
    // //     $queryText = $request->input('query');

    // //     // Parse the query
    // //     $searchParams = parse_search_query($queryText);

    // //     // Fetch advertisements with initial filters
    // //     $query = Advertisement::with([
    // //         'realEstate',
    // //         'realEstate.realEstateable',
    // //         'realEstate.city',
    // //         'realEstate.features',
    // //         'provider',
    // //     ])->where('status', 'active');

    // //     $filters = $searchParams['filters'];

    // //     // Apply price filters
    // //     if (isset($filters['min_price'])) {
    // //         $query->whereHas('realEstate', function ($q) use ($filters) {
    // //             $q->where('price', '>=', $filters['min_price']);
    // //         });
    // //     }

    // //     if (isset($filters['max_price'])) {
    // //         $query->whereHas('realEstate', function ($q) use ($filters) {
    // //             $q->where('price', '<=', $filters['max_price']);
    // //         });
    // //     }

    // //     // Apply status filter
    // //     if (isset($filters['status'])) {
    // //         $query->whereHas('realEstate', function ($q) use ($filters) {
    // //             $q->where('status', $filters['status']);
    // //         });
    // //     }

    // //     // Apply city filter
    // //     if (isset($filters['city'])) {
    // //         $cities = $filters['city'];
    // //         $query->whereHas('realEstate.city', function ($q) use ($cities) {
    // //             $q->whereIn('name', $cities);
    // //         });
    // //     }

    // //     // Apply property type filter
    // //     if (isset($filters['property_type'])) {
    // //         $types = $filters['property_type'];
    // //         $query->whereHas('realEstate', function ($q) use ($types) {
    // //             $q->whereIn('real_estateable_type', array_map(function ($type) {
    // //                 return 'App\\Models\\' . ucfirst($type);
    // //             }, $types));
    // //         });
    // //     }

    // //     // Apply features filter
    // //     if (isset($filters['features'])) {
    // //         $features = $filters['features'];
    // //         $query->whereHas('realEstate.features', function ($q) use ($features) {
    // //             $q->whereIn('name', $features);
    // //         });
    // //     }

    // //     // Apply rooms number filter
    // //     if (isset($filters['rooms_number'])) {
    // //         $roomsNumber = $filters['rooms_number'];
    // //         $query->whereHas('realEstate.realEstateable', function ($q) use ($roomsNumber) {
    // //             $q->where('rooms_number', $roomsNumber);
    // //         });
    // //     }

    // //     // Apply bathrooms number filter
    // //     if (isset($filters['bathrooms_number'])) {
    // //         $bathroomsNumber = $filters['bathrooms_number'];
    // //         $query->whereHas('realEstate.realEstateable', function ($q) use ($bathroomsNumber) {
    // //             $q->where('bathrooms_number', $bathroomsNumber);
    // //         });
    // //     }

    // //     // Apply area filter
    // //     if (isset($filters['area'])) {
    // //         $area = $filters['area'];
    // //         $query->whereHas('realEstate.realEstateable', function ($q) use ($area) {
    // //             $q->where('area', $area);
    // //         });
    // //     }

    // //     $advertisements = $query->get();

    // //     $results = [];

    // //     foreach ($advertisements as $ad) {
    // //         $score = score_advertisement($ad, $searchParams);

    // //         if ($score > 0) {
    // //             $results[] = [
    // //                 'advertisement' => $ad,
    // //                 'score' => $score,
    // //             ];
    // //         }
    // //     }

    // //     // Sort results
    // //     usort($results, function ($a, $b) {
    // //         return $b['score'] - $a['score'];
    // //     });

    // //     // Extract advertisements
    // //     $advertisements = array_column($results, 'advertisement');

    // //     // Paginate the results
    // //     $currentPage = LengthAwarePaginator::resolveCurrentPage();
    // //     $perPage = 10; // Number of items per page
    // //     $currentItems = array_slice($advertisements, ($currentPage - 1) * $perPage, $perPage);
    // //     $advertisementsPaginated = new LengthAwarePaginator($currentItems, count($advertisements), $perPage, $currentPage, [
    // //         'path' => LengthAwarePaginator::resolveCurrentPath()
    // //     ]);

    // //     return view('advertisments.search_results', [
    // //         'advertisements' => $advertisementsPaginated,
    // //         'query' => $queryText,
    // //     ]);
    // // }



    // // public function search(Request $request)
    // // {
    // //     $queryText = $request->input('q');

    // //     // Parse the query
    // //     $searchParams = parse_search_query($queryText);

    // //     // Fetch advertisements with initial filters
    // //     $query = Advertisement::with([
    // //         'realEstate',
    // //         'realEstate.realEstateable',
    // //         'realEstate.city',
    // //         'realEstate.features',
    // //         'provider',
    // //     ])->where('status', 'active');

    // //     $filters = $searchParams['filters'];

    // //     // Apply price filters
    // //     if (isset($filters['min_price'])) {
    // //         $query->whereHas('realEstate', function ($q) use ($filters) {
    // //             $q->where('price', '>=', $filters['min_price']);
    // //         });
    // //     }

    // //     if (isset($filters['max_price'])) {
    // //         $query->whereHas('realEstate', function ($q) use ($filters) {
    // //             $q->where('price', '<=', $filters['max_price']);
    // //         });
    // //     }

    // //     // Apply status filter
    // //     if (isset($filters['status'])) {
    // //         $query->whereHas('realEstate', function ($q) use ($filters) {
    // //             $q->where('status', $filters['status']);
    // //         });
    // //     }

    // //     // Apply city filter
    // //     if (isset($filters['city'])) {
    // //         $cities = $filters['city'];
    // //         $query->whereHas('realEstate.city', function ($q) use ($cities) {
    // //             $q->whereIn('name', $cities);
    // //         });
    // //     }

    // //     // Apply property type filter
    // //     if (isset($filters['property_type'])) {
    // //         $types = $filters['property_type'];
    // //         $query->whereHas('realEstate', function ($q) use ($types) {
    // //             $q->whereIn('real_estateable_type', array_map(function ($type) {
    // //                 return 'App\\Models\\' . ucfirst($type);
    // //             }, $types));
    // //         });
    // //     }

    // //     // Apply features filter
    // //     if (isset($filters['features'])) {
    // //         $features = $filters['features'];
    // //         $query->whereHas('realEstate.features', function ($q) use ($features) {
    // //             $q->whereIn('name', $features);
    // //         });
    // //     }

    // //     // Apply rooms number filter
    // //     if (isset($filters['rooms_number'])) {
    // //         $roomsNumber = $filters['rooms_number'];
    // //         $query->whereHas('realEstate.realEstateable', function ($q) use ($roomsNumber) {
    // //             $q->where('rooms_number', $roomsNumber);
    // //         });
    // //     }

    // //     // Apply bathrooms number filter
    // //     if (isset($filters['bathrooms_number'])) {
    // //         $bathroomsNumber = $filters['bathrooms_number'];
    // //         $query->whereHas('realEstate.realEstateable', function ($q) use ($bathroomsNumber) {
    // //             $q->where('bathrooms_number', $bathroomsNumber);
    // //         });
    // //     }

    // //     // Apply area filter
    // //     if (isset($filters['area'])) {
    // //         $area = $filters['area'];
    // //         $query->whereHas('realEstate.realEstateable', function ($q) use ($area) {
    // //             $q->where('area', $area);
    // //         });
    // //     }

    // //     $advertisements = $query->get();

    // //     $results = [];

    // //     foreach ($advertisements as $ad) {
    // //         $score = score_advertisement($ad, $searchParams);

    // //         if ($score > 0) {
    // //             $results[] = [
    // //                 'advertisement' => $ad,
    // //                 'score' => $score,
    // //             ];
    // //         }
    // //     }

    // //     // Sort results
    // //     usort($results, function ($a, $b) {
    // //         return $b['score'] - $a['score'];
    // //     });

    // //     // Extract advertisements
    // //     $advertisements = array_column($results, 'advertisement');

    // //     return view('advertisments.search_results', [
    // //         'advertisements' => $advertisements,
    // //         'query' => $queryText,
    // //     ]);
    // // }

    // // public function search(Request $request)
    // // {
    // //     $queryText = $request->input('q');

    // //     // Parse the query
    // //     $searchParams = parse_search_query($queryText);

    // //     // Fetch advertisements with initial filters (optimize query)
    // //     $query = Advertisement::with('realEstate', 'realEstate.realEstateable', 'realEstate.city')
    // //         ->where('status', 'active');

    // //     // Apply price filters at the database level
    // //     $filters = $searchParams['filters'];

    // //     if (isset($filters['min_price'])) {
    // //         $query->whereHas('realEstate', function ($q) use ($filters) {
    // //             $q->where('price', '>=', $filters['min_price']);
    // //         });
    // //     }

    // //     if (isset($filters['max_price'])) {
    // //         $query->whereHas('realEstate', function ($q) use ($filters) {
    // //             $q->where('price', '<=', $filters['max_price']);
    // //         });
    // //     }

    // //     $advertisements = $query->get();

    // //     $results = [];

    // //     foreach ($advertisements as $ad) {
    // //         $score = score_advertisement($ad, $searchParams);

    // //         if ($score > 0) {
    // //             $results[] = [
    // //                 'advertisement' => $ad,
    // //                 'score' => $score,
    // //             ];
    // //         }
    // //     }

    // //     // Sort results by score in descending order
    // //     usort($results, function ($a, $b) {
    // //         return $b['score'] - $a['score'];
    // //     });

    // //     // Extract advertisements from results
    // //     $advertisements = array_column($results, 'advertisement');

    // //     return view('advertisments.search_results', [
    // //         'advertisements' => $advertisements,
    // //         'query' => $queryText,
    // //     ]);
    // // }


    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     $ads = Advertisement::findOrFail($id);
    //     if (Auth::check()) {
    //         UserInteraction::updateOrCreate(
    //             [
    //                 'user_id' => Auth::id(),
    //                 'advertisement_id' => $ads->id,
    //                 'interaction_type' => 'view',
    //             ],
    //             ['updated_at' => now()]
    //         );
    //     }
    //     return view('advertisments.show', compact('ads'));
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     //
    // }


    protected $searchService;

    // /**
    //  * Inject the RealEstateSearchService.
    //  *
    //  * @param RealEstateSearchService $searchService
    //  */
    public function __construct(RealEstateSearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    /**
     * Handle the search request.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $query = $request->input('query', '');

        if (empty($query)) {
            return redirect()->back()->with('error', 'Please enter a search query.');
        }

        $advertisements = $this->searchService->search($query);

        return view('advertisments.search_results', compact('advertisements', 'query'));
    }
}
