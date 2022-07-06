<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Domain\ObjectValues\Movie as MovieObjectValue;
use Domain\Services\AddMovieAction;
use Domain\Services\ListMoviesAction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MoviesController extends Controller
{

    public function index(ListMoviesAction $listMoviesAction)
    {
        return $listMoviesAction();
    }

    public function create()
    {
    }

    public function store(Request $request, AddMovieAction $addMovieAction)
    {
        return response()
            ->json(
                $addMovieAction(new MovieObjectValue($request->name))
                , Response::HTTP_CREATED
            );
    }

    public function show(Movie $movie)
    {
    }

    public function edit(Movie $movie)
    {
    }

    public function update(Request $request, Movie $movie)
    {
    }

    public function destroy(Movie $movie)
    {
    }
}
