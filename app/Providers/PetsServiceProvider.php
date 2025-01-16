<?php

namespace App\Providers;

use App\Repository\swaggerAPI\PetsRepository;
use App\Repository\PetsRepository as PetsInterfaceRepository;

use Illuminate\Support\ServiceProvider;

class PetsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PetsInterfaceRepository::class, PetsRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //dump('Fake - boot');
    }
}
