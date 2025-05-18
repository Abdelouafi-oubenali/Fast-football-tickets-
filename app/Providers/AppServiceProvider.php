<?php

namespace App\Providers;

use App\Repositories\MatchRepository;
use App\Repositories\TicktesRepostry;
use App\Repositories\StadeReposittory;
use Illuminate\Support\ServiceProvider;
use App\Repositories\FootballEqupeRepository;
use App\Repositories\StadRepositoryInterface;
use App\Repositories\MatchRepositoryInterface;
use App\Repositories\TicketsRepositryIntirface;
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
        $this->app->bind(MatchRepositoryInterface::class, MatchRepository::class);
        $this->app->bind(TicketsRepositryIntirface::class, TicktesRepostry::class);

    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}













