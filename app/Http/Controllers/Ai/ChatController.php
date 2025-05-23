<?php

namespace App\Http\Controllers\Ai;

use App\Http\Controllers\Controller;
use App\Models\RealEstate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function index()
    {
        // Fetch all RealEstate records with necessary relationships and counts
        $realEstates = RealEstate::with(['realEstateable'])->select([
            'id',
            'real_estateable_type',
            'real_estateable_id',
            'location',
            'price',
            'description',
            'boundaries',
            'status',
            'commercial_number',
            'advertisement_id',
            'city_id',
        ])
            ->with([
                'realEstateable',
                'city:id,name',
                'advertisement:id,title,provider_id',
                'advertisement.provider:id,name',
                'realEstateable', // Eager load type-specific models
                'features:name,real_estate_id', // Assuming features have 'name' and belong to real_estate_id
            ])
            ->withCount([
                // 'advertisement.likes as likes_count',
                // 'advertisement.shares as shares_count',
                // 'advertisement.views as views_count',
                // 'advertisement.feedbacks as comments_count',
            ])
            ->get(); // Retrieve all records without pagination

        // return $realEstates;
        // Transform the data into the desired JSON structure
        $data = $realEstates->map(function ($realEstate) {
            // Determine the property type in Arabic
            $propertyType = match ($realEstate->real_estateable_type) {
                'App\Models\Apartment' => 'شقة',
                'App\Models\Land' => 'أرض',
                'App\Models\Building' => 'بناية',
                default => 'نوع غير معروف',
            };

            // Format the price with commas and append currency
            $formattedPrice = number_format($realEstate->price, 0, ',', ',') . ' ريال يمني';

            // Advertisement details
            $advertisement = $realEstate->advertisement;
            $advertisementTitle = $advertisement->title ?? 'بدون عنوان';
            $providerName = $advertisement->provider->name ?? 'بدون مزود';
            $likesCount = $realEstate->likes_count ?? 0;
            $sharesCount = $realEstate->shares_count ?? 0;
            $viewsCount = $realEstate->views_count ?? 0;
            $commentsCount = $realEstate->comments_count ?? 0;

            // Handle type-specific features
            $typeSpecificFeatures = [];
            if ($realEstate->realEstateable) {
                // dd($realEstate->realEstateable);
                if ($realEstate->isApartment()) {
                    /** @var \App\Models\Apartment $apartment */
                    $apartment = $realEstate->realEstateable;
                    $typeSpecificFeatures = [
                        'floor_number' => $apartment->floor_number,
                        'rooms_number' => $apartment->rooms_number,
                        'bathrooms_number' => $apartment->bathrooms_number,
                        'kitchens_number' => $apartment->kitchens_number,
                        'condition' => $apartment->condition,
                    ];
                } elseif ($realEstate->isLand()) {
                    /** @var \App\Models\Land $land */
                    $land = $realEstate->realEstateable;
                    $typeSpecificFeatures = [
                        'area' => $land->area,
                        'water' => $land->water,
                        'electricity' => $land->electricity,
                        'sewage' => $land->sewage,
                        'gas' => $land->gas,
                        'access' => $land->access,
                    ];
                } elseif ($realEstate->isBuilding()) {
                    /** @var \App\Models\Building $building */
                    $building = $realEstate->realEstateable;
                    $typeSpecificFeatures = [
                        'floors_number' => $building->floors_number,
                        'apartments_count' => $building->apartments_count,
                    ];
                }
            }

            // Get amenities from features relationship
            $amenities = $realEstate->features->pluck('name')->toArray();

            // Format status
            $status = $realEstate->status === 'rent' ? 'للإيجار' : 'للبيع';

            return array_merge([
                'id' => $realEstate->id,
                'property_type' => $propertyType,
                'location' => $realEstate->location,
                'price' => $formattedPrice,
                'description' => $realEstate->description,
                'commercial_number' => $realEstate->commercial_number,
                'advertisement_title' => $advertisementTitle,
                'provider_name' => $providerName,
                'likes_count' => $likesCount,
                'shares_count' => $sharesCount,
                'views_count' => $viewsCount,
                'comments_count' => $commentsCount,
                'city_name' => $realEstate->city->name ?? 'بدون محافظة',
                'amenities' => $amenities,
                'status' => $status,
            ], $typeSpecificFeatures);
        });

        // return response($typeSpecificFeatures);
        // Return the data as a JSON response without pagination metadata
        return response()->json([
            'data' => $data,
        ], 200);
    }

    public function chat(Request $request)
    {
        $validated = $request->validate([
            'query' => 'required|string',
        ]);

        $apiKey = env('GEMINI_API_KEY');
        $query = $validated['query'];

        // هنا تستخدم بيانات وهمية إذا حابب، أو تجهز أي بيانات تانية لو ضروري
        // $realEstateData = [...];  // اختياري حسب الحاجة

        // استدعاء API جيميني
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=' . $apiKey, [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $query]
                    ]
                ]
            ]
        ]);

        if ($response->successful()) {
            $geminiResponse = $response->json();

            // استخرج النص الناتج من الاستجابة
            if (isset($geminiResponse['candidates'][0]['content']['parts'][0]['text'])) {
                $generatedText = $geminiResponse['candidates'][0]['content']['parts'][0]['text'];

                // أرجع النص مع أي بيانات إضافية تحب
                return response()->json([
                    'status' => 'success',
                    'response' => $generatedText,
                    // 'real_estate_data' => $realEstateData, // لو بدك ترجع بيانات العقارات مثلا
                ], 200);
            } else {
                return response()->json([
                    'status' => 'fail',
                    'message' => 'Unexpected Gemini response format',
                    'error' => $geminiResponse
                ], 500);
            }
        } else {
            return response()->json([
                'status' => 'fail',
                'message' => 'Gemini API error',
                'error' => $response->json()
            ], $response->status());
        }
    }
}
