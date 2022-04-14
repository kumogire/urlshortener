<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\ShortenedUrl;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_database_by_inserting_and_counting_records()
    {
        // Create a single App\Models\User instance...
        $shortenedurl = ShortenedUrl::factory()->create();
        $result = ShortenedUrl::all()->toArray();
        //$this->assertTrue($shortenedurl);
        $this->assertCount( 1, $result, 'There is one record in the database' );

        // Create three App\Models\User instances...
        $shortenedurl = ShortenedUrl::factory()->count(3)->create();
        $result = ShortenedUrl::all()->toArray();
        //$this->assertTrue($shortenedurl);
        $this->assertCount( 4, $result, 'There are four records in the database' );

    }
}
