<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteMoviesController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\MoviesRatingsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/sanctum/token', [AuthController::class, 'token']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::resource('/movies', MoviesController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::resource('/favorite-movies', FavoriteMoviesController::class)->only(['store', 'destroy']);
    Route::resource('/movies-ratings', MoviesRatingsController::class)->only(['index']);
});

Route::resource('/favorite-movies', FavoriteMoviesController::class)->only(['index']);