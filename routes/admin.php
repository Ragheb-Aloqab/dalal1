<?php


use App\Http\Controllers\Admin\{
    AboutController,
    AdminController,
    AdminNotificationController,
    AdminProfileController,
    AdvertisementController,
    ApartmentController,
    AttachmentController,
    BuildingController,
    ChattingController,
    ClientController,
    CommentController,
    ConditionController,
    ContactController,
    ConversationController,
    DashboardController,
    FeatureController,
    FeedbackController,
    FqsController,
    HelpController,
    LandController,
    MyProfileController,
    NotificationController,
    ProfileController,
    ProfilesController,
    ProviderController,
    RealEstateController,
    RequestController,
    ResponseController,
    SettingController,
    SliderController,
    UserController
};
use Illuminate\Support\Facades\Route;

Route::get('admin/assets/{path}', function ($path) {
    return response()->file(public_path('assets/' . $path));
})->where('path', '.*');

Route::group(
    [

        'middleware' => ['admin']
    ],
    function () {
        Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
            Route::resource('/dashboard', DashboardController::class);
            Route::get('/error', function () {
                return view('admin.error-page');
            })->name('error-page');

            Route::get('/chat', fn() => view('admin.chat'))->name('chat');
            Route::get('/notifications/create', [AdminNotificationController::class, 'create'])->name('admin.notifications.create');
            Route::post('/notifications', [AdminNotificationController::class, 'store'])->name('admin.notifications.store');
            Route::resource('/real-estates', RealEstateController::class);

            // Generated routes for all controllers
            Route::resource('/about', AboutController::class);
            Route::resource('/admins', AdminController::class);
            Route::resource('/admin-profiles', AdminProfileController::class);
            Route::resource('/advertisements', AdvertisementController::class);
            Route::resource('/apartments', ApartmentController::class);
            Route::resource('/attachments', AttachmentController::class);
            Route::resource('/buildings', BuildingController::class);
            Route::resource('/chatting', ChattingController::class);
            Route::resource('/clients', ClientController::class);
            Route::resource('/comments', CommentController::class);
            Route::resource('/conditions', ConditionController::class);
            Route::resource('/contacts', ContactController::class);
            Route::resource('/conversations', ConversationController::class);
            Route::resource('/features', FeatureController::class);
            Route::resource('/feedback', FeedbackController::class);
            Route::resource('/fqs', FqsController::class);
            Route::resource('/helps', HelpController::class);
            Route::resource('/lands', LandController::class);
            Route::resource('/my-profile', MyProfileController::class);
            Route::resource('/notifications', NotificationController::class);
            Route::resource('/profile', ProfileController::class);
            Route::resource('/profiles', ProfilesController::class);
            Route::resource('/requests', RequestController::class);
            Route::resource('/responses', ResponseController::class);
            Route::resource('/settings', SettingController::class);
            Route::resource('/sliders', SliderController::class);
            Route::resource('/users', UserController::class);
            Route::resource('/providers',ProviderController::class);
        });
    }
);



