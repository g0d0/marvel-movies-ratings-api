<?php

namespace Domain\Services;

use Domain\Services\Interfaces\MoviesRepositoryInterface;

class ListMoviesAction
{
    public function __construct(private MoviesRepositoryInterface $repository)
    {
    }

    public function __invoke() : array
    {
        return $this->repository->all();
    }
}