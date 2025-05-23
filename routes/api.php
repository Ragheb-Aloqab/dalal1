<?php

use App\Http\Controllers\Ai\ChatController;
use App\Http\Controllers\Api\AbouteController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ProviderController;
use App\Http\Controllers\Api\ConectController;
use App\Http\Controllers\Api\FollowController;
use App\Http\Controllers\Api\FqsController;
use App\Http\Controllers\Api\HelpController;
use App\Http\Controllers\Api\ConditionController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProfileUserAndProvider;
use App\Http\Controllers\Api\RealEstateController;
use App\Http\Controllers\Api\RequestController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\favoritesUserController;
use App\Http\Controllers\GeminiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Apply CORS middleware to the following routes
Route::middleware(['cors'])->group(function () {
    Route::post('/providers', [ProviderController::class, 'store']);

    // Routes for Settings, Help, and About
    Route::get('/settings', [SettingController::class, 'index']);
    Route::get('/help', [HelpController::class, 'index']);
    Route::get('/fqs', [FqsController::class, 'index']);
    Route::get('/condition', [ConditionController::class, 'index']);
    Route::get('/connect', [ConectController::class, 'index']);
    Route::get('/about', [AbouteController::class, 'index']);

    // RequestController routes
    Route::get('/requests', [RequestController::class, 'index'])->name('requests.index');
    Route::get('/requests/{id}', [RequestController::class, 'show'])->name('requests.show');
    Route::post('/requests', [RequestController::class, 'store'])->name('requests.store');
    Route::put('/requests/{id}', [RequestController::class, 'update'])->name('requests.update');
    Route::delete('/requests/{id}', [RequestController::class, 'destroy'])->name('requests.destroy');

    // CommentController routes
    Route::get('/advertisements/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::get('/comments/{id}', [CommentController::class, 'show']);
    Route::put('/comments/{id}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');

    // RealEstateController routes
    Route::get('realestates/{id}', [RealEstateController::class, 'show']);
    Route::get('/realestates', [RealEstateController::class, 'showAll']);
    Route::post('real-estates', [RealEstateController::class, 'store']);
    Route::get('/searchrealestatesss', [RealEstateController::class, 'searchrealestatesss']);

    // Real estate filtering routes
    Route::get('/indexland', [RealEstateController::class, 'indexland']);
    Route::get('/indexapartment', [RealEstateController::class, 'indexapartment']);
    Route::get('/indexbuilding', [RealEstateController::class, 'indexbuilding']);
    Route::get('/showAllRentals', [RealEstateController::class, 'showAllRentals']);
    Route::get('/showAllSales', [RealEstateController::class, 'showAllSaless']);

    // Feedback route
    Route::get('/feedbacks', [AuthController::class, 'index'])->name('admin.feedback');

    // User registration and login routes
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/sendverificationcode', [AuthController::class, 'sendVerificationCode']);
    Route::post('/verifyemail', [AuthController::class, 'verify']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

    // Notification route
    Route::get('/notifications', [NotificationController::class, 'index']);

    // FollowController routes
    Route::post('/follow', [FollowController::class, 'follow'])->name('follows.follow');
    Route::post('/unfollow', [FollowController::class, 'unfollow'])->name('follows.unfollow');
    Route::post('/is-following', [FollowController::class, 'isFollowing'])->name('follows.isFollowing');
    Route::get('/index', [FollowController::class, 'index'])->name('follows.ff');

    // Protected routes with middleware
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/profileuser', [UserController::class, 'getUserProfile']);
        Route::put('/updateUserProfiles', [UserController::class, 'updateUserProfiles']);
        Route::post('/addFavorite', [favoritesUserController::class, 'store']);
        Route::post('/removeFavorite', [favoritesUserController::class, 'removeFavorite']);
        Route::post('/getFavoriteAdvertisements', [favoritesUserController::class, 'getFavoriteAdvertisements']);
        Route::post('/is-favorite', [favoritesUserController::class, 'isFavorite']);
        Route::post('/comments', [CommentController::class, 'store']);
        Route::delete('/delete_account', [UserController::class, 'deleteAccount']);
        Route::get('/user', function (Request $request) {
            return response()->json([
                'success' => true,
                'data' => $request->user()
            ]);
        });
    });
});
Route::get('/sendchat', [ChatController::class, 'chat'])->name('sendchat');
Route::post('/chat-with-gemini', [GeminiController::class, 'chatWithGemini']);

