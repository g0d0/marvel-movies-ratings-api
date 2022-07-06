<?php

namespace App\Providers;

use App\Repositories\FavoriteMoviesRepository;
use App\Repositories\MoviesRepository;
use Domain\Services\Interfaces\FavoriteMoviesRepositoryInterface;
use Domain\Services\Interfaces\MoviesRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FavoriteMoviesRepositoryInterface::class, FavoriteMoviesRepository::class);
        $this->app->bind(MoviesRepositoryInterface::class, MoviesRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
