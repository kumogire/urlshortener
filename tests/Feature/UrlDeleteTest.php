<?php

namespace Tests\Feature;

use App\Models\ShortenedUrl;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Tests\TestCase;

class UrlDeleteTest extends TestCase
{
    use RefreshDatabase;

    private $faker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_url_delete_endpoint_transaction()
    {
        $urlData =
            [
                'url' => 'https://'.Str::random(5).'.com',
                'shortcode' => Str::random(8),
            ];
        $shortenedurl = ShortenedUrl::create(
            $urlData
        );

        $this->json('delete', 'api/shortenedurl/delete/'.$shortenedurl->id.'/?token='.env("MIX_API_KEY"))
            ->assertNoContent();
        $this->assertDatabaseMissing('shortened_urls', $urlData);
    }
}
