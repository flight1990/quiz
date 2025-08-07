<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    protected $fillable = [
        'text',
        'order',
        'is_multiple',
        'quiz_id',
    ];

    protected $casts = [
        'is_multiple' => 'boolean',
    ];

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }
}
