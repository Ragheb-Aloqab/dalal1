<?php

use App\Http\Controllers\provider\AdvertisementController;
use App\Http\Controllers\Provider\ApartmentController;
use App\Http\Controllers\Provider\LandController;
use App\Http\Controllers\Provider\BuildingController;
use App\Http\Controllers\Provider\ChattingController;
use App\Http\Controllers\Provider\RequestController;
use App\Http\Controllers\provider\DashboardController;
use App\Http\Controllers\Provider\MyProfileController;
use App\Http\Controllers\Provider\NotificationController;
use App\Models\Provider\Conversation;
use Illuminate\Support\Facades\Route;

Route::get('provider/assets/{path}', function ($path) {
    return response()->file(public_path('assets/' . $path));
})->where('path', '.*');
Route::group(
    [
        'middleware' => ['provider']
    ],
    function () {
        Route::group(
            ['prefix' => 'provider', 'as' => 'provider.'],
            function () {
                Route::resource('/dashboard', DashboardController::class);
                // Route::get('/dashboard', fn() => view('provider.dashboard'))->name('dashboard.index');
                Route::resource('/advertisements', AdvertisementController::class);
                Route::resource('/apartments',  ApartmentController::class);
                Route::resource('/requests', controller: RequestController::class);
                Route::resource('/buildings', controller: BuildingController::class);
                Route::resource('/lands', LandController::class);
                Route::resource('/chats', ChattingController::class);
                Route::resource('/my-profile', MyProfileController::class);
                Route::resource('/notifications',NotificationController::class);
                Route::view('/index','provider.index')->name('index');
            }
        );
    }
);
// Route::prefix('provider')->middleware('provider')->group(function () {
//     // Route::get('/dashboard', fn() => view('provider.index'))->name('provider');

//     Route::get('/conversations', [ConversationController::class, 'index'])
//         ->name('con');
//     Route::view('not', 'provider.notify')->name('not');
//     // Route::resource('/advertisments',)
//     Route::post('/notify', [NotificationController::class, 'createNew'])->name('provider.notify');
// });
