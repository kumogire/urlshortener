<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ShortenedUrl
 *
 *  @property int $id
 *  @property string $url
 *  @property string $shortcode
 *  @method static Builder|ShortenedUrl whereId($value)
 *  @method static Builder|ShortenedUrl whereShortcode($value)
 *
 */


class ShortenedUrl extends Model
{
    use HasFactory;

    public $table = 'shortened_urls';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'url',
        'shortcode'
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
