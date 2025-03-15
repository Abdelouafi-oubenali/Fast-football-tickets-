<?php

namespace App\Providers;

use App\Repositories\StadeReposittory;
use Illuminate\Support\ServiceProvider;
use App\Repositories\FootballEqupeRepository;
use App\Repositories\StadRepositoryInterface;
use App\Repositories\FootballEqupeRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(FootballEqupeRepositoryInterface::class, FootballEqupeRepository::class);
        $this->app->bind(StadRepositoryInterface::class, StadeReposittory::class);

    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}













