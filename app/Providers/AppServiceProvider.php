<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\JsonResource;
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
        JsonResource::withoutWrapping(); // to remove respone data wrap from response for all resources.
    }
}
