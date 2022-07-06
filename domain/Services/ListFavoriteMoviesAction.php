<?php

namespace Domain\Services;

use Domain\Services\Interfaces\FavoriteMoviesRepositoryInterface;

class ListFavoriteMoviesAction
{
    public function __construct(private FavoriteMoviesRepositoryInterface $repository)
    {
    }

    public function __invoke(?int $userId) : array
    {
        return $this->repository->all($userId);
    }
}