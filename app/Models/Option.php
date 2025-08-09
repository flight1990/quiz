<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Option extends Model
{
    protected $fillable = [
        'text',
        'question_id',
        'is_correct',
        'is_other',
    ];

    protected $casts = [
        'is_correct' => 'boolean',
        'is_other' => 'boolean',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function answers(): BelongsToMany
    {
        return $this->belongsToMany(Answer::class);
    }
}
