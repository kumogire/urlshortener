<?php

namespace Database\Factories;

use App\Models\ShortenedUrl;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShortenedUrl>
 */
class ShortenedUrlFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShortenedUrl::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'shortcode' => Str::random(8),
            'url' => 'https://'.Str::random(5).'.com',
        ];
    }
}
