<?php

namespace App\Http\Controllers;

use App\Models\FavoriteMovie;
use App\Models\User;
use Domain\ObjectValues\FavoriteMovie as FavoriteMovieObjectValue;
use Domain\Services\DeleteFavoriteMovieAction;
use Domain\Services\ListFavoriteMoviesAction;
use Domain\Services\SaveFavoriteMovieAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FavoriteMoviesController extends Controller
{

    public function __construct()
    {
    }

    public function index(ListFavoriteMoviesAction $listFavoriteMoviesAction)
    {
        return $listFavoriteMoviesAction(auth()->user()?->id);
    }

    public function create()
    {
    }

    public function store(Request $request, SaveFavoriteMovieAction $saveFavoriteMovieAction) : JsonResponse
    {
        $favoriteMovie = $saveFavoriteMovieAction(
            new FavoriteMovieObjectValue(
                auth()->user()->id,
                $request->movie_id
            )
        );

        return response()->json($favoriteMovie, Response::HTTP_CREATED);
    }

    public function show(FavoriteMovie $favoriteMovie)
    {
    }

    public function edit(FavoriteMovie $favoriteMovie)
    {
    }

    public function update(Request $request, FavoriteMovie $favoriteMovie)
    {
    }

    public function destroy(FavoriteMovie $favoriteMovie, DeleteFavoriteMovieAction $deleteFavoriteMovieAction) 
    {
        $deleteFavoriteMovieAction(
            new FavoriteMovieObjectValue(
                $favoriteMovie->user_id,
                $favoriteMovie->movie_id
            )
        );
        return response('', Response::HTTP_OK);
    }
}
