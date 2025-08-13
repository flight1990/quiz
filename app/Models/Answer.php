<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Answer extends Model
{
    protected $fillable = [
        'question_id',
        'guest_user_id',
        'other',
        'is_correct',
        'attempt_id',
    ];

    protected $casts = [
        'is_correct' => 'boolean'
    ];

    public function guestUser(): BelongsTo
    {
        return $this->belongsTo(GuestUser::class);
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }

    public function quizAttempt(): BelongsTo
    {
        return $this->belongsTo(QuizAttempt::class);
    }
}
