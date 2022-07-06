<?php

namespace App\Http\Controllers;

use Domain\Services\ListFavoriteMoviesAction;

class MoviesRatingsController extends Controller
{
    public function index(ListFavoriteMoviesAction $listFavoriteMoviesAction)
    {
        return $listFavoriteMoviesAction();
    }
}
