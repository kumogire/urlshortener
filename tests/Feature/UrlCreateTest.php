<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Tests\TestCase;

class UrlCreateTest extends TestCase
{
    private $faker;
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_url_create_endpoint()
    {

        $payload = [
            'url' => 'https://'.Str::random(5).'.com',
        ];

        $this->json('post', '/api/shortenedurl/create?token='.env("MIX_API_KEY"), $payload)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure(
                [
                        'id',
                        'shortcode',
                        'url'
                ]
            );
        $this->assertDatabaseHas('shortened_urls', $payload);
    }
}
