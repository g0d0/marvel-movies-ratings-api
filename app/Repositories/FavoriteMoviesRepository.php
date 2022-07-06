<?php

namespace App\Repositories;

use App\Models\FavoriteMovie;
use App\Models\Movie;
use Domain\ObjectValues\FavoriteMovie as FavoriteMovieObjectValue;
use Domain\Services\Interfaces\FavoriteMoviesRepositoryInterface;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class FavoriteMoviesRepository implements FavoriteMoviesRepositoryInterface
{
    public function all(?int $userId) : array
    {
        $q = Movie::query()
            ->select(
                'favorite_movies.id AS starred',
                'movies.id',
                'movies.name',
                'rating'
            )
            ->leftJoin('favorite_movies', function ($query) use ($userId) {
                $query->where('favorite_movies.movie_id', '=', 'movies.id')
                      ->where('favorite_movies.user_id', '=', $userId);
            });


        logger(Str::replaceArray('?', $q->getBindings(), $q->toSql()));

        return $q->get()->toArray();
    }
    
    public function save(FavoriteMovieObjectValue $favoriteMovie) : array
    {
        return DB::transaction(function () use ($favoriteMovie) {
            /** @var array */
            $params = $favoriteMovie->toArray();
            
            /** @var Movie */
            $movie = Movie::select('id', 'rating')->whereId($params['movie_id'])->first();            
            $movie->rating = $movie->rating + 1;
            $movie->save();

            return FavoriteMovie::create($params)->toArray();
        });
    }

    public function delete(FavoriteMovieObjectValue $favoriteMovie) : bool
    {
        return DB::transaction(function () use ($favoriteMovie) {
            /** @var array */
            $params = $favoriteMovie->toArray();
            FavoriteMovie::where($params)->delete();

            /** @var Movie */
            $movie = Movie::select('rating')->whereId($params['movie_id'])->first();
            $movie->rating = $movie->rating - 1;
            $movie->save();
            return true;
        });
    }
}