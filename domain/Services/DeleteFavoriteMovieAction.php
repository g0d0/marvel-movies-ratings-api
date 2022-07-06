<?php

namespace Domain\Services;

use Domain\ObjectValues\FavoriteMovie;
use Domain\Services\Interfaces\FavoriteMoviesRepositoryInterface;

class DeleteFavoriteMovieAction
{
    public function __construct(private FavoriteMoviesRepositoryInterface $repository)
    {
    }

    public function __invoke(FavoriteMovie $favoriteMovie) : bool
    {
        return $this->repository->delete($favoriteMovie);
    }
}