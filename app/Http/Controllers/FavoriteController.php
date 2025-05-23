<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the favorited advertisements for the authenticated user.
     */
    public function index()
    {
        $user = Auth::user();
        $favorites = $user->favoriteAdvertisements;

        return view('favorites.index', compact('favorites'));
    }

    /**
     * Display a list of users who have favorited a specific advertisement.
     */
    public function favoritedBy($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $favoritedByUsers = $advertisement->favoritedBy;

        return view('favorites.favorited_by', compact('advertisement', 'favoritedByUsers'));
    }

    /**
     * Add an advertisement to the authenticated user's favorites.
     */
    public function store($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $user = Auth::user();

        // Check if the advertisement is already favorited
        if ($user->favoriteAdvertisements->contains($advertisement->id)) {
            return redirect()->back()->with('message', 'Already favorited!');
        }

        // Add favorite
        // $user->favoriteAdvertisements()->attach($advertisement->id);

        return redirect()->back()->with('message', 'Advertisement added to favorites!');
    }

    /**
     * Remove an advertisement from the authenticated user's favorites.
     */
    public function destroy($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        $user = Auth::user();

        // Remove favorite
        if ($user->favoriteAdvertisements->contains($advertisement->id)) {
            // $user->favoriteAdvertisements()->detach($advertisement->id);
            return redirect()->back()->with('message', 'Advertisement removed from favorites!');
        }

        return redirect()->back()->with('message', 'Advertisement is not in your favorites!');
    }
}
