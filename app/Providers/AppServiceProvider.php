<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Load migrations from subdirectories
        $this->loadMigrationsFrom([
            database_path('migrations'), // Default migrations directory
            database_path('migrations/vehicle_modules/chassis'), 
            database_path('migrations/vehicle_modules/drives'),
            database_path('migrations/vehicle_modules/seats'),
            database_path('migrations/vehicle_modules/steering_wheels'),
            database_path('migrations/vehicle_modules/wheels'),
        ]);
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}
