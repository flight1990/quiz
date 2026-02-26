<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
