<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Quiz extends Model
{
    use HasSlug;
    protected $fillable = [
        'title',
        'slug',
        'is_anonymous',
        'is_active',
    ];

    protected $casts = [
        'is_anonymous' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
