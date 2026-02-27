<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Question extends Model
{
    protected $fillable = [
        'text',
        'description',
        'order',
        'quiz_id',
        'answer_type',
        'answer_timer',
        'is_multiple',
        'is_other',
        'type',
    ];

    protected $casts = [
        'is_multiple' => 'boolean',
        'is_other' => 'boolean',
    ];

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }

    public function options(): HasMany
    {
        return $this->hasMany(Option::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    public function media(): MorphToMany
    {
        return $this->morphToMany(Media::class, 'mediable');
    }
}
