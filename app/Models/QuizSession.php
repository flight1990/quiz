<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuizSession extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'quiz_id',
        'current_question_id',
        'user_id',
        'created_at',
        'started_at',
        'finished_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
    ];

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function currentQuestion(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'current_question_id');
    }

    public function participants(): HasMany
    {
        return $this->hasMany(QuizSessionParticipant::class);
    }

    public function questionLogs(): HasMany
    {
        return $this->hasMany(QuizSessionQuestionLog::class);
    }
}
