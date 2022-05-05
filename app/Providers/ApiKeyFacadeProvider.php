<?php

namespace App\Providers;

use App\Facades\Api\ApiKey;
use Illuminate\Support\ServiceProvider;

class ApiKeyFacadeProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind("ApiKey" , function () {
            return new ApiKey;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
