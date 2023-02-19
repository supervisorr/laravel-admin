<?php

namespace App\Providers;

use App\Services\IpglobalService;
use Illuminate\Support\ServiceProvider;

class IpglobalServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Registrar IpglobalService como servicio para despues ser inyectado
         *
         */
        $this->app->singleton(IpglobalService::class, function ($app) {
            return new IpglobalService(config('services.ipglobal'));
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

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [IpglobalService::class];
    }
}
