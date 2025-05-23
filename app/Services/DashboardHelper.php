<?php

namespace App\Services;

use App\Models\Apartment;
use App\Models\Building;
use App\Models\Land;
use App\Models\Advertisement;
use App\Models\RealEstate;
use App\Models\Request;
use App\Models\Contact;

use App\Models\Provider;
use App\Models\user;
use App\Models\admin;


class DashboardHelper
{
    protected $provider;

    public function __construct(Provider $provider)
    {
        $this->provider = $provider;
    }

    /**
     * Set the provider instance.
     *
     * @param Provider $provider
     * @return void
     */
    public function setProvider(Provider $provider)
    {
        $this->provider = $provider;
    }

    /**
     * Get the most liked advertisements for the provider.
     *
     * @return array
     */
    public function getMostLikedAdvertisements(): array
    {
        return $this->provider->advertisements
            ->map(function ($ad) {
                return ['name' => $ad->title, 'likes' => $ad->likes->count()];
            })
            ->sortByDesc('likes')
            ->take(5)
            ->values()
            ->toArray();
    }

    /**
     * Get the highest-rated advertisements for the provider.
     *
     * @return array
     */
    public function getHighestRatedAdvertisements(): array
    {
        return $this->provider->advertisements
            ->map(function ($ad) {
                return ['name' => $ad->title, 'rating' => $ad->averageRating()];
            })
            ->sortByDesc('rating')
            ->take(5)
            ->values()
            ->toArray();
    }

    /**
     * Get the count of lands, apartments, and buildings.
     *
     * @return array
     */
    public function getRealEstateCounts(): array
    {
        $landsCount = $this->provider->advertisements()->whereHas('realEstate', function ($query) {
            $query->where('real_estateable_type', Land::class);
        })->count();

        $apartmentsCount = $this->provider->advertisements()->whereHas('realEstate', function ($query) {
            $query->where('real_estateable_type', Apartment::class);
        })->count();

        $buildingsCount = $this->provider->advertisements()->whereHas('realEstate', function ($query) {
            $query->where('real_estateable_type', Building::class);
        })->count();

        return [
            'landsCount' => $landsCount,
            'apartmentsCount' => $apartmentsCount,
            'buildingsCount' => $buildingsCount,
        ];
    }

    /**
     * Get the count of followers.
     *
     * @return int
     */
    public function getFollowersCount(): int
    {
        return $this->provider->followers()->count();
    }

    /**
     * Get the count of advertisements.
     *
     * @return int
     */
    public function getAdvertisementsCount(): int
    {
        return $this->provider->advertisements()->count();
    }
}
