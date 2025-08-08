<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GuestUser extends Model
{
    protected $fillable = [
        'uuid',
        'name',
        'ip_address',
        'user_agent',
        'unit_id',
    ];

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    public function quizUsers(): HasMany
    {
        return $this->hasMany(QuizUser::class);
    }
}
