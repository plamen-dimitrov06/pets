<?php

namespace App\Providers;

use App\Search\FindService;
use App\Search\Strategy\FindByName;
use App\Search\Strategy\FindByType;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $nameFilter = new FindByName();
        $typeFilter = new FindByType();
        $searchService = new FindService(array($nameFilter, $typeFilter));
        $this->app->instance(FindService::class, $searchService);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
