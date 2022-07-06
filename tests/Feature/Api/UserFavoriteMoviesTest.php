<?php

namespace Tests\Feature\Api;

use App\Models\FavoriteMovie;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class UserFavoriteMoviesTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_choose_favorite_movie()
    {
        $user = User::factory()->create([
            'name' => 'Antônio Marcos',
        ]);

        $movie = Movie::factory()->create([
            'name' => 'Thor',
            'rating' => 0,
        ]);

        /** @var TestResponse */
        $testResponse = $this->post("/api/favorite-movies", [
            'movie_id' => $movie->id,
        ]);
        
        /** @var array */
        $jsonResponse = $testResponse->json();

        $testResponse->assertCreated();

        $this->assertArrayHasKey('id', $jsonResponse);
        $this->assertArrayHasKey('user_id', $jsonResponse);
        $this->assertArrayHasKey('movie_id', $jsonResponse);
    
        $this->assertEquals(1, $jsonResponse['id']);
        $this->assertEquals(1, $jsonResponse['user_id']);
        $this->assertEquals(1, $jsonResponse['movie_id']);
    }

    public function test_user_can_delete_favorite_movie()
    {
        $favoriteMovie = FavoriteMovie::factory()->create();

        /** @var TestResponse */
        $testResponse = $this->delete("/api/favorite-movies/{$favoriteMovie->id}");

        $testResponse->assertOk();
    }
}
