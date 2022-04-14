<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\ShortenedUrlController;

class ShortenedUrlsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_if_there_are_existing_urls_in_the_database()
    {
        $returnedValue = ( new ShortenedUrlController )->index();

        $this->assertEmpty($returnedValue);
    }
}
