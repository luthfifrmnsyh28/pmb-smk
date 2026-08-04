<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Carbon::setLocale('id');

        Gate::before(function ($user, $ability) {
            return $user->hasRole($ability) ? true : null;
        });

        // 🔥 FIX DI SINI
        if (Schema::hasTable('settings')) {
            View::share('setting', Setting::first());
        }
    }
}