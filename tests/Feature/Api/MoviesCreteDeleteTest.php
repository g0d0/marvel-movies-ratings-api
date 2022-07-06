<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class MoviesCreteDeleteTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_add_movies()
    {
        /** @var TestResponse */
        $testResponse = $this->post('/api/movies', [
            'name' => 'Thor'
        ]);

        $testResponse->assertStatus(Response::HTTP_CREATED);

        $testResponse->decodeResponseJson();
        $jsonResponse = $testResponse->json();
        $this->assertArrayHasKey('id', $jsonResponse);
        $this->assertArrayHasKey('name', $jsonResponse);
        $this->assertEquals(1, $jsonResponse['id']);
        $this->assertEquals('Thor', $jsonResponse['name']);
    }

    public function test_admin_can_edit_movies()
    {
        $this->post('/api/movies', [
            'name' => 'Thor'
        ]);

        /** @var TestResponse */
        $getTestResponse = $this->get('/api/movies');
        $getTestResponse->assertJsonCount(1);
        $addedMovie = $getTestResponse->json();

        /** @var TestResponse */
        $testResponse = $this->put('/api/movies-listasdf');

        $this->assertArrayHasKey('name', $addedMovie[0]);
        $this->assertEquals(1, $addedMovie[0]['id']);
        $this->assertEquals('Thor', $addedMovie[0]['name']);
    }

    public function test_admin_can_delete_movies()
    {
        /** @var TestResponse */
        $testResponse = $this->post('/api/movies', [
            'name' => 'Thor'
        ]);

        $testResponse->decodeResponseJson();
        $addedMovie = $testResponse->json();

        /** @var TestResponse */
        $testResponse = $this->delete("/api/movies/{$addedMovie['id']}");

        $testResponse->assertStatus(Response::HTTP_OK);
    }
}
