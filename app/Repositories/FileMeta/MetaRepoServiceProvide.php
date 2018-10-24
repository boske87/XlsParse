<?php
namespace App\Repositories\FileMeta;

use Illuminate\Support\ServiceProvider;

class MetaRepoServiceProvide extends ServiceProvider
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
        $this->app->bind('App\Repositories\FileMeta\MetaRepositoryInterface', 'App\Repositories\FileMeta\MetaRepository');
    }
}