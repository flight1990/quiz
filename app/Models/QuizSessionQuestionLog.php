<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuizSessionQuestionLog extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'quiz_session_id',
        'question_id',
        'status',
        'datetime',
    ];

    protected $casts = [
        'datetime' => 'datetime',
    ];

    public function session(): BelongsTo
    {
        return $this->belongsTo(QuizSession::class, 'quiz_session_id');
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
