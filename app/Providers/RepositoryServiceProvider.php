<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Http\Interfaces\DashboardInterface',
            'App\Http\Repositories\DashboardRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\EnduserInterface',
            'App\Http\Repositories\EnduserRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\IconInterface',
            'App\Http\Repositories\IconRepository'
        );
          $this->app->bind(
            'App\Http\Interfaces\LinksInterface',
            'App\Http\Repositories\LinksRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\QrCodeGeneratorInterface',
            'App\Http\Repositories\QrCodeGeneratorRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\RoleAdminInterface',
            'App\Http\Repositories\RoleAdminRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\UserInterface',
            'App\Http\Repositories\UserRepository'
        );
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
