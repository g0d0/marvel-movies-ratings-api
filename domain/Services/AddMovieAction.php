<?php

namespace Domain\Services;

use Domain\ObjectValues\Movie;
use Domain\Services\Interfaces\MoviesRepositoryInterface;

class AddMovieAction
{
    public function __construct(private MoviesRepositoryInterface $repository)
    {
    }

    public function __invoke(Movie $movie) : array
    {
        return $this->repository->create($movie);
    }
}