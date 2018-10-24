<?php
namespace App\Repositories\Clients;

use Illuminate\Support\ServiceProvider;

class ClientsRepoServiceProvide extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Clients\ClientsRepositoryInterface', 'App\Repositories\Clients\ClientsRepository');
    }
}