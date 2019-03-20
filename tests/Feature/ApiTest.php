<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTest extends TestCase
{
    /**
     * A basic test.
     *
     * @return void
     */
    public function testHomepage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function api_is_working_correctly()
    {
        $response = $this->get(route('images.index'));
        $response->assertStatus(200);
        
        $response->assertJsonStructure([
            'data' => [
            ]
        ]);
    }
}
