<?php

namespace Tests\Feature\Api;

use App\Models\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class MoviesRatingsListTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_see_movies_when_no_one_vote()
    {
        Movie::factory()->create([
            'name' => 'Movie1',
            'rating' => 0,
        ]);

        Movie::factory()->create([
            'name' => 'Movie2',
            'rating' => 0,
        ]);

        /** @var TestResponse */
        $testResponse = $this->get('/api/movies-ratings');

        $testResponse->assertOk();
        $testResponse->decodeResponseJson();
        
        $this->assertEquals([
            [
                'id' => 1,
                'name' => 'Movie1',
                'rating' => 0,
            ],
            [
                'id' => 2,
                'name' => 'Movie2',
                'rating' => 0,
            ],
        ], $testResponse->json());
    }

    public function test_user_can_see_a_favorite_movie_on_movies_rating_list()
    {
        Movie::factory()->create([
            'name' => 'Movie1',
            'rating' => 0,
        ]);

        Movie::factory()->create([
            'name' => 'Movie2',
            'rating' => 47,
        ]);

        /** @var TestResponse */
        $testResponse = $this->get('/api/movies-ratings');

        $testResponse->assertOk();
        $testResponse->decodeResponseJson();
        
        $this->assertEquals([
            [
                'id' => 1,
                'name' => 'Movie1',
                'rating' => 0,
            ],
            [
                'id' => 2,
                'name' => 'Movie2',
                'rating' => 47,
            ],
        ], $testResponse->json());
    }
}
