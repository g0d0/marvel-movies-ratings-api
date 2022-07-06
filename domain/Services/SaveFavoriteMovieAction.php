<?php

namespace Domain\Services;

use App\Models\Movie;
use Domain\ObjectValues\FavoriteMovie;
use Domain\Services\Interfaces\FavoriteMoviesRepositoryInterface;

class SaveFavoriteMovieAction
{
    public function __construct(private FavoriteMoviesRepositoryInterface $repository)
    {
    }

    public function __invoke(FavoriteMovie $favoriteMovie) : array
    {        
        return $this->repository->save($favoriteMovie);
    }
}