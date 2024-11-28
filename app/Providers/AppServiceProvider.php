<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('admin', function () {
            return Auth::check() && Auth::user()->group_id == 1;
        });

        Gate::define('corporate', function () {
            return Auth::check() && (Auth::user()->group_id == 1 || Auth::user()->group_id == 4 || Auth::user()->group_id == 5);
        });

        Gate::define('personal', function () {
            return Auth::check() && (Auth::user()->group_id == 1 || Auth::user()->group_id == 3 || Auth::user()->group_id == 4 || Auth::user()->group_id == 5);
        });

        Gate::define('registered', function () {
            return Auth::check() && (Auth::user()->group_id == 1 || Auth::user()->group_id == 2 || Auth::user()->group_id == 3 || Auth::user()->group_id == 4 || Auth::user()->group_id == 5);
        });
    }
}
