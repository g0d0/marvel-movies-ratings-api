<?php

namespace Domain\Services\Interfaces;

use Domain\ObjectValues\Movie;

interface MoviesRepositoryInterface
{
    public function all() : array;
    public function create(Movie $movie) : array;
    public function destroy(int $id) : bool;
}