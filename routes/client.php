<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('client/assets/{path}', function ($path) {
    return response()->file(public_path('assets/' . $path));
})->where('path', '.*');

Route::prefix('client')->middleware('client')->group(callback: function () {
    Route::get('/index', function () {
        $notifications =    Auth::user()->notifications;
        $cons = Auth::user();
        return view('index', compact('notifications'));
    })->name('client');


    Route::get('/terms', fn() => view('terms'))->name('terms');
    Route::get('/fav', [FavoriteController::class, 'index'])->name('fav');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::get('/advertisements/{id}/favorited-by', [FavoriteController::class, 'favoritedBy'])->name('favorites.favorited_by');
    Route::post('/advertisements/{id}/favorite', [FavoriteController::class, 'store'])->name('favorites.store');
    // // Route::delete('/advertisements/{id}/unfavorite', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
    // // Route::get('/advertisement', function () {
    // //     return view('advertisement');
    // // })->name('advertisement');


    Route::resource(name: '/ads', controller: AdvertisementController::class);
    // Route::resource('/companies', controller: CompanyController::class);
    Route::get('/chats',fn()=>view('chats'))->name('chats');
    // Route::get('/adve')
});