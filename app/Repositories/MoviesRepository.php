<?php

namespace App\Repositories;

use App\Models\Movie;
use Domain\ObjectValues\Movie as MovieObjectValue;
use Domain\Services\Interfaces\MoviesRepositoryInterface;

class MoviesRepository implements MoviesRepositoryInterface
{
    public function all() : array
    {
        return Movie::query()
            ->select([
                'id',
                'name',
            ])
            ->get()
            ->toArray();
    }

    public function create(MovieObjectValue $movie) : array
    {
        return Movie::create($movie->toArray())->toArray();
    }

    public function destroy(int $id) : bool
    {
        return Movie::whereId($id)->delete();
    }
}