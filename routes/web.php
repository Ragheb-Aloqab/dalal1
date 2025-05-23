<?php

// use App\Http\Controllers\AdvertisementController;

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\Ai\ChatController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\GeminiController;
use App\Http\Controllers\ProfileController;
use App\Models\About;
use App\Models\Condition;
use App\Models\Contact;
use App\Models\Fqs;
use App\Models\Help;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });


Route::get('/', function () {
    return view('index');
})->name('/');


Route::get('/admin', function () {
    return view('admin.dashboard');
});


Route::resource('/cities', CityController::class);
Route::get('/about', function () {
    $abouts = About::all();
    return view('about', compact('abouts'));
})->name('abouts');
Route::get('/term', function () {
    $terms = Condition::all();
    return view('terms', compact('terms'));
})->name('terms.page');

Route::get('/contact', function () {
    $contacts = Contact::all();
    return view('contact', data: compact(var_name: 'contacts'));
})->name(name: 'contacts');

Route::get('/faq', function () {
    $faqs = Fqs::all();
    return view(view: 'faq', data: compact(var_name: 'faqs'));
})->name(name: 'faqs');

Route::get('/help', action: function () {
    $helps = Help::all();
    return view(view: 'help', data: compact(var_name: 'helps'));
})->name(name: 'helps');


// Route::get('/advertisements/lands', action: [AdvertisementController::class, 'lands'])->name('advertisements.lands');
// Route::get('/advertisements/apartments', [AdvertisementController::class, 'apartments'])->name('advertisements.apartments');
// Route::get('/advertisements/buildings', action: [AdvertisementController::class, 'buildings'])->name('advertisements.buildings');

Route::resource('/advertisements', AdvertisementController::class);
Route::middleware('auth')->group(function () {
    Route::get('/profile', action: [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/ch1', action: function () {

    return view('chatbots');
});
//Route::get('/sendchat', [ChatController::class, 'chat'])->name('sendchat');


Route::get('/search', [AdvertisementController::class, 'search'])->name('search');


Route::resource('/companies', controller: CompanyController::class);


require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/provider.php';
require __DIR__ . '/client.php';



