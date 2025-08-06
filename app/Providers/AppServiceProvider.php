<?php

namespace App\Providers;

use Carbon\CarbonInterval;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

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
        Passport::tokensExpireIn(CarbonInterval::days(2));
        Passport::refreshTokensExpireIn(CarbonInterval::days(3));
        Passport::personalAccessTokensExpireIn(CarbonInterval::months(6));
        Passport::enablePasswordGrant();
    }
}
