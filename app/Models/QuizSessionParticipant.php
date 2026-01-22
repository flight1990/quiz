<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuizSessionParticipant extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'quiz_session_id',
        'guest_user_id',
        'joined_at',
        'left_at',
    ];

    protected $casts = [
        'joined_at' => 'datetime',
        'left_at' => 'datetime',
    ];

    public function session(): BelongsTo
    {
        return $this->belongsTo(QuizSession::class, 'quiz_session_id');
    }

    public function guestUser(): BelongsTo
    {
        return $this->belongsTo(GuestUser::class, 'guest_user_id');
    }
}
