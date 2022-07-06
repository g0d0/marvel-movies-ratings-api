<?php

namespace Domain\Services\Interfaces;

use Domain\ObjectValues\FavoriteMovie;

interface FavoriteMoviesRepositoryInterface
{
    public function all(?int $userId) : array;
    public function save(FavoriteMovie $favoriteMovie) : array;
    public function delete(FavoriteMovie $favoriteMovie) : bool;
}