<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Http\Controllers\Admin;
use Illuminate\Support\ServiceProvider;
use App\Services\DashboardHelperadmin;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
      
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale('ar');
    }
}
