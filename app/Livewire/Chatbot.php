<?php

namespace App\Livewire;

use App\Models\RealEstate;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Chatbot extends Component
{
    public $messages = [];
    public $userInput = '';
    public $isChatVisible = false;
    public $isThinking = false;

    public function sendMessage()
    {
        $this->messages[] = ['sender' => 'user', 'content' => $this->userInput];

        $query = $this->userInput;
        $this->userInput = '';
        $this->isThinking = true;

        $realEstateData = $this->querySearch($query);
        $payload = [
            'query' => $query,
            'real_estate_data' => $realEstateData
        ];

        try {
            $response = Http::post('http://127.0.0.1:8000/real-estate-query', $payload);

            if ($response->successful()) {
                $fastApiResponse = $response->json();
                $this->messages[] = ['sender' => 'bot', 'content' => $fastApiResponse['message']];
                $this->isChatVisible = true;
            } else {
                $this->messages[] = ['sender' => 'bot', 'content' => 'FastAPI responded with an error.'];
            }
        } catch (\Exception $e) {
            $this->messages[] = ['sender' => 'bot', 'content' => 'Unable to communicate with FastAPI.'];
        }

        $this->isThinking = false;
    }

    public function toggleChat()
    {
        $this->isChatVisible = !$this->isChatVisible;
    }

    public function querySearch($query)
    {
        $realEstates = RealEstate::with(['realEstateable', 'city:id,name', 'advertisement:id,title,provider_id', 'advertisement.provider:id,name', 'features:name,real_estate_id'])
            ->select(['id', 'real_estateable_type', 'real_estateable_id', 'location', 'price', 'description', 'boundaries', 'status', 'commercial_number', 'advertisement_id', 'city_id'])
            ->get();

        $data = $realEstates->map(function ($realEstate) {
            $propertyType = match ($realEstate->real_estateable_type) {
                'App\Models\Apartment' => 'شقة',
                'App\Models\Land' => 'أرض',
                'App\Models\Building' => 'بناية',
                default => 'نوع غير معروف',
            };

            $formattedPrice = number_format($realEstate->price, 0, ',', ',') . ' ريال يمني';
            $advertisement = $realEstate->advertisement;
            $advertisementTitle = $advertisement->title ?? 'بدون عنوان';
            $providerName = $advertisement->provider->name ?? 'بدون مزود';
            $typeSpecificFeatures = [];

            if ($realEstate->realEstateable) {
                if ($realEstate->isApartment()) {
                    $apartment = $realEstate->realEstateable;
                    $typeSpecificFeatures = [
                        'floor_number' => $apartment->floor_number,
                        'rooms_number' => $apartment->rooms_number,
                        'bathrooms_number' => $apartment->bathrooms_number,
                        'kitchens_number' => $apartment->kitchens_number,
                        'condition' => $apartment->condition,
                    ];
                } elseif ($realEstate->isLand()) {
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
                    $building = $realEstate->realEstateable;
                    $typeSpecificFeatures = [
                        'floors_number' => $building->floors_number,
                        'apartments_count' => $building->apartments_count,
                    ];
                }
            }

            $amenities = $realEstate->features->pluck('name')->toArray();
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
                'city_name' => $realEstate->city->name ?? 'بدون محافظة',
                'amenities' => $amenities,
                'status' => $status,
            ], $typeSpecificFeatures);
        });

        return $data->toJson();
    }

    public function render()
    {
        return view('livewire.chatbot');
    }
}
