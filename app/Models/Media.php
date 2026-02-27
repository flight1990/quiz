<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Media extends Model
{
    protected $fillable = [
        'id',
        'uuid',
        'disk',
        'path',
        'original_name',
        'mime_type',
        'extension',
        'size',
    ];

    public function questions(): MorphToMany
    {
        return $this->morphedByMany(Question::class, 'mediable');
    }
}
