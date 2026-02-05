<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\JobOffer;
use App\Policies\JobOfferPolicy;

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
        //
    }

    protected $policies = [
        JobOffer::class => JobOfferPolicy::class,
    ];

}
