<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class UrlListTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_url_list_endpoint()
    {
        $this->json('get', '/api/shortenedurls?token='.env("MIX_API_KEY"))
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'data' => [
                        '*' => [
                            'created_at',
                            'id',
                            'shortcode',
                            'updated_at',
                            'url'
                        ]
                    ]
                ]
            );
    }
}
