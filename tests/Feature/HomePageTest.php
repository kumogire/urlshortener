<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_home_page_view_will_load()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/home');

        $response->assertStatus(200);

        $response->assertSeeText('URL Shortener');

        $response->assertDontSeeText('Archive');
    }
}
