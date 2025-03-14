<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\FootballEqupeRepositoryInterface;
use App\Repositories\FootballEqupeRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(FootballEqupeRepositoryInterface::class, FootballEqupeRepository::class);
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}













